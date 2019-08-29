<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tesdokumen extends Member_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('Dokumen_user_model','Antrian_dokumen_model','Dataset_model','Antrian_dataset_model'));
  }

  function index()
  {
    $data['view']  = $this->Antrian_dokumen_model->get_all('dokumen_user.id_user',$this->session->userdata('logged_in')['id_user']);
    $data['content'] = $this->load->view('member/tesdokumen/index', $data, TRUE);

		$data['desc'] = "Uji Dokumen anda disini";

		$this->load->view('member/template', $data);
  }

  function ujiPlagiasi()
  {
    $data['uji']  = $this->Dokumen_user_model->get_all('dokumen_user.id_user',$this->session->userdata('logged_in')['id_user']);
    $data['content'] = $this->load->view('member/tesdokumen/ujiplagiasi', $data, TRUE);

		$data['desc'] = "Uji Dokumen baru";

		$this->load->view('member/template', $data);
  }

  public function detail($id)
  {
    $data['detail'] = $this->Antrian_dokumen_model->select_detail($id);
    $data['dataset'] = $this->Antrian_dataset_model->select_detail($id);

    $data['content'] = $this->load->view('member/tesdokumen/detailhasil', $data, TRUE);

    $data['desc'] = "Laporan Hasil Deteksi";

    // var_dump($data['dataset']);
    $this->load->view('member/template', $data);
  }

  // public function deleteUjiDoc($id)
  // {
  //   $this->Antrian_dokumen_model->delete($id);
  //   $this->session->set_flashdata('message', 'Success ! User has been deleted');
  //   redirect('tes-plagiasi', 'refresh');
  // }

  public function prosesFilter()
  {
    if ($this->input->post('submit')) {
      $data_uji = array();
      $id = $this->input->post('id_dokumen_user');

      $result = $this->Dokumen_user_model->select_by_id($id);
      $data['dokumenuji'] = $result;

      $result_keyword = explode(",",$result[0]['keyword']); //ambil keywoard

      for ($i=0; $i < count($result_keyword) ; $i++) {
        $dataset = $this->Dataset_model->dataset_by_tags($result_keyword[$i]); //pilih dataset sesuai keyword
        // if (count($dataset) > 1) {
          foreach ($dataset as $key) {
            $data_uji[] = $key;
          }
        // }else {
        //   foreach ($dataset as $key) {
        //     $data_uji[] = $key;
        //   }
        // }
      }

      $data['datauji'] = array_unique($data_uji, SORT_REGULAR); //convert ke array of string
      $data['content'] = $this->load->view('member/tesdokumen/datauji', $data, TRUE);

  		$data['desc'] = "Data Terpilih";

  		$this->load->view('member/template', $data);
    }else {
      redirect('tes-plagiasi/uji');
    }
  }

  public function executeCheker()
  {
    if ($this->input->post('submit')) {

      $data1['id_dokumen_user'] = $this->input->post('id_dokumen_user');
      $data1['id_user']         = $this->session->userdata('logged_in')['id_user'];
      $data1['created_at']      = date('Y-m-d H:i:s');
      $data1['status']          = 1;

      $id_data = $this->input->post('id_data');

      $id = $this->Antrian_dokumen_model->insert($data1);

      $data            = array();
      $path = './assets/python/setup.py';

      foreach ($id_data as $value) {
        array_push($data, array(
          'id_data' => $value,
          'id_antrian_dokumen' => $id,
          'created_at' => date('Y-m-d H:i:s')
        ));
      }

      $this->Antrian_dataset_model->insert_batch($data);

      $output = passthru("python ".$path." ".$data1['id_dokumen_user']." ".$id); //array [0] = $path, array [1] = id_dokumen_user, array [2] = $value (data yg di uji)

      redirect('tes-plagiasi');
    }else {
      redirect('tes-plagiasi/uji');
    }
  }

  function sertifikat($id){
    $this->load->library('Pdf');

    $detail = $this->Antrian_dokumen_model->select_detail_wuser($id);
    $dataset = $this->Antrian_dataset_model->select_detail($id);

    $totalplagiasi = 0;
    foreach ($dataset as $value) {
      $totalplagiasi += $value['similarity_angka'];
    }

    $file = new TCPDF('P','mm','A4', true, 'UTF-8');
    // var_dump($detail);
    $file->SetCreator(PDF_CREATOR);
    $file->SetTitle('SERTIFIKAT '.$detail[0]['judul']);

    $file->AddPage();

    // $file->SetFont("times", "", 12);
    $file->setCellHeightRatio(1.5);

    $html = '<table border="0">
    <tr>
    <td colspan="3" align="center"><h1>Sertifikat nama sistem</h1><hr></td>
    </tr>
    <tr>
    <td colspan="3" align="center"><p>Untuk mensertifikasi</p>
    <br></td>
    </tr>
    <tr>
    <td colspan="3" align="center"><h4>"'.$detail[0]['judul'].' ('.$detail[0]['tahun'].')"</h4>
    <br>
    <br>
    <br>
    <br>
    </td>
    </tr>
    <tr>
    <td colspan="3" align="center"><p>dari</p></td>
    </tr>
    <tr>
    <td colspan="3" align="center"><h4>'.$detail[0]['nama'].'</h4>
    <br>
    <br>
    <br>
    </td>
    </tr>
    <tr>
    <td colspan="3" align="center" style="padding: 0 35px;"><p>berdasarkan hasil dari tes dengan nilai '.round($totalplagiasi).'% literatur ditemukan plagiarisme menggunakan metode <i>longest cummon subsequence</i></p>
    <br></td>
    </tr>
    <tr>
    <td colspan="3" align="center"><p>untuk hasil lengkapnya dapat di akses melalui link berikut</p></td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    </tr>
    </table>';

    $file->writeHTML($html);

    $file->Output('Sertifikat '.date('d-m-Y H:i:s').'.pdf',"I");
  }
}
