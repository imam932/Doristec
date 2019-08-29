<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	public function index()
	{
		$this->load->model(array('Dokumen_user_model','User_model','Antrian_dokumen_model','Tahun_model'));

		// load data
    $data['viewd3'] = $this->Dokumen_user_model->get_all('dokumen_user.prodi', 'D3 Manajemen Informatika');
		$data['viewd4'] = $this->Dokumen_user_model->get_all('dokumen_user.prodi', 'D4 Teknik Informatika');
		$data['viewusr']= $this->User_model->get_allmhs();
		$data['viewpanitia'] = $this->User_model->get_Panitia();

		$tahun = $this->Tahun_model->get_statusAktif();
    $data['viewpenelitian']  = $this->Antrian_dokumen_model->get_allPenelitianMhs($tahun->tahun); //penelitian siswa berdasarkan tahun aktif

		$data['desc'] = "Static Overview";
		$this->render['content'] = $this->load->view('admin/index', $data, TRUE);


		$this->load->view('admin/template', $this->render);
	}
}
/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
?>
