<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends Admin_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('User_model'));
  }

  function index()
  {
    $id = $this->session->userdata('logged_inAdm')['id_user'];
    // load data
    $data['user']  = $this->User_model->select_by_id($id);
    // error handling
    if (!empty($this->session->flashdata('message')))
    {
      $data['message'] = $this->session->flashdata('message');
    }
    else if (!empty($this->session->flashdata('error')))
    {
      $data['error'] = $this->session->flashdata('error');
    }
    // load template
    $data['title']          = "Profil";
    $data['desc']		        = "Lihat Profil Lengkap";
    $data['breadcrumb']     = array('Dashboard', 'Setting');
    // load page
    $this->render['content'] = $this->load->view('admin/profile', $data, TRUE);

    $this->load->view('admin/template', $this->render);
  }

  public function resetPassword($id)
  {
    $this->form_validation->set_rules('old_password', 'Old Password', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('password2', 'Confirm Password', 'required');

    if(!$this->form_validation->run())
    {
      $this->session->set_flashdata('error', validation_errors());
    }
    else
    {
      $auth = $this->User_model->select_by_id($id);
      $old_password = md5($this->input->post('old_password'));
      $data['password'] = md5($this->input->post('password'));
      $password2 = md5($this->input->post('password2'));

      $message = array();
      // var_dump($auth[0]['password']);
      if($old_password == $auth[0]['password'])
      {
        if($data['password'] == $password2)
        {
          $this->User_model->update($data, $id);
          $this->session->set_flashdata('message', 'Success ! Your password has been reseted');
          $this->session->unset_userdata('logged_inAdm');
      		redirect('/','refresh');
        }
        else
        {
          $this->session->set_flashdata('error', 'Confirmation password invalid');
        }
      }
      else
      {
        $this->session->set_flashdata('error', 'Your old password invalid');
      }
    }
    redirect('admin/Profile');
  }

  public function editProfile($id)
  {
    if ($this->input->server('REQUEST_METHOD') == 'POST')
    {
      //form validation
      $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
      $this->form_validation->set_rules('email', 'Email', 'trim|required');
      $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
      $this->form_validation->set_rules('nohp', 'Nomor HP', 'trim|required|xss_clean|numeric');
      $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

	    if(!$this->form_validation->run())
	    {
	      $this->session->set_flashdata('error', validation_errors());
				redirect('admin/setting/editProfile/' . $id, 'refresh');
	    }
      else
      {
        $data['nama']          = $this->input->post('nama');
        $data['email']         = $this->input->post('email');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['alamat']        = $this->input->post('alamat');
        $data['nohp']          = $this->input->post('nohp');

        $this->User_model->update($data, $id);
        $this->session->set_flashdata('message', 'Success ! User has been edited');
        redirect('admin/setting', 'refresh');
      }
    }
    //error handling
    $data = array();
    if(!empty($this->session->flashdata('error')))
    {
      $data['error'] = $this->session->flashdata('error');
    }
    // load data
    $data['user'] = $this->User_model->select_by_id($id);
    // load template
    $data['title']          = "Profil";
    $data['desc']		        = "Edit profil";
    $data['breadcrumb']     = array('Dashboard', 'Profil', 'Edit');
    // load page
    $this->render['content']        = $this->load->view('admin/profile_edit', $data, TRUE);

    $this->load->view('admin/template', $this->render);
  }
}
