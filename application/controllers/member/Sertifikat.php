<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sertifikat extends CI_Controller{

  function print($id){
    $this->load->library('Pdf');
    $this->load->model(array('Antrian_dokumen_model','Antrian_dataset_model'));

    $detail = $this->Antrian_dokumen_model->select_detail($id);
    $data['dataset'] = $this->Antrian_dataset_model->select_detail($id);

    $file = new TCPDF('P','mm','A4', true, 'UTF-8');
    // var_dump($detail);
    $file->SetCreator(PDF_CREATOR);
    $file->SetTitle('SERTIFIKAT '.$detail[0]['judul']);
    $file->SetSubject('Patroli');
    $file->SetKeywords('laporan, patroli, sprin');

    $file->AddPage();

    // $file->SetFont("times", "", 12);
    $file->setCellHeightRatio(2);

    $html = '<table border="1">
    <tr>
    <td colspan="3">lskdhs</td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    </tr>
    </table>';

    $file->writeHTML($html);

    $file->Output('Laporan Hasil Patroli '.date('d-m-Y H:i:s').'.pdf',"I");
  }

}
