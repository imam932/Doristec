<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends Admin_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model('Dokumen_user_model');
  }

	public function sudahUploadD3()
	{
		// load data
		$data['view'] = $this->Dokumen_user_model->get_all('dokumen_user.prodi', 'D3 Manajemen Informatika');

		$data['desc'] = "Telah mengumpulkan dokumen";
		$this->render['content'] = $this->load->view('admin/mahasiswa/sudahupload_d3', $data, TRUE);

		$this->load->view('admin/template', $this->render);
	}

	public function sudahUploadD4()
	{
		// load data
		$data['view'] = $this->Dokumen_user_model->get_all('dokumen_user.prodi', 'D4 Teknik Informatika');

		$data['desc'] = "Telah mengumpulkan dokumen";
		$this->render['content'] = $this->load->view('admin/mahasiswa/sudahupload_d3', $data, TRUE);

		$this->load->view('admin/template', $this->render);
	}

	function laporanPenelitian()
  {
		$this->load->model(array('Antrian_dokumen_model','Tahun_model'));

		$tahun = $this->Tahun_model->get_statusAktif();
    $data['view']  = $this->Antrian_dokumen_model->get_allPenelitianMhs($tahun->tahun);

		$data['desc'] = "Laporan Penelitian Mahasiswa";
		$this->render['content'] = $this->load->view('admin/laporanpenelitian/laporan', $data, TRUE);

		$this->load->view('admin/template', $this->render);
  }

	public function detail($id)
	{
		$this->load->model(array('Antrian_dokumen_model','Antrian_dataset_model'));

		$data['detail'] = $this->Antrian_dokumen_model->select_detail($id);
		$data['dataset'] = $this->Antrian_dataset_model->select_detail($id);

		$data['desc'] = "Laporan Hasil Deteksi";
		$this->render['content'] = $this->load->view('admin/laporanpenelitian/detailhasil', $data, TRUE);

		$this->load->view('admin/template', $this->render);
	}
}
/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
?>
