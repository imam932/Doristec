<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('User_model'));
  }

  public function register()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
    $this->form_validation->set_rules('nohp', 'Nomor HP', 'trim|required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

    if ($this->form_validation->run() !== FALSE) {
      $email_exist = $this->User_model->select_by_field('email', $this->input->post('email'));
      if ($email_exist) {
        $message['eror_email'] = 'Email sudah terdaftar';
        $this->session->set_flashdata('error_message', $message);
          redirect('/');
      }else {
        $this->session->set_flashdata('success_message', 'Pendaftaran Berhasil, Sekarang Anda bisa Masuk');
        $this->User_model->insert();
        redirect('/');
      }
    }else {
      $message['pesan_eror'] = 'Pendaftaran Gagal, Coba lagi';
      $this->session->set_flashdata('error_message', $message);
      redirect('/');
    }
  }

}
