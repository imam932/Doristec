<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun extends Admin_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Tahun_model');
  }

  function index()
  {
    //load data
    $data['tahun'] = $this->Tahun_model->select_all();
    // success message
    $data['message'] = $this->session->flashdata('message');

    //load page
    $this->render['content'] = $this->load->view('admin/tahun/index', $data, TRUE);

    //load template
    $this->render['desc']		= "Tahun";
    $this->render['breadcrumb'] = array('Dashboard', 'Tahun');

    $this->load->view('admin/template', $this->render);
  }

  public function store()
  {
    //form validation
    $this->form_validation->set_rules('tahun', 'Tahun', 'trim|required|xss_clean');

    if($this->form_validation->run())
    {
      $this->Tahun_model->insert();

      $this->session->set_flashdata('message', 'Success ! Tahun berhasil tambah');
      redirect('admin/Tahun', 'refresh');
    }
    else
    {
      $this->index();
    }
  }

  public function delete($id)
  {
    $this->Tahun_model->delete($id);
    $this->session->set_flashdata('message', 'Success ! Tahun berhasil delete');
    redirect('admin/Tahun', 'refresh');
  }

  public function edit($id)
  {
    //form validation
    $this->form_validation->set_rules('tahun', 'Tahun', 'trim|required|xss_clean');

    if($this->form_validation->run())
    {
      $data['tahun'] = $this->input->post('tahun');
      $this->Tahun_model->update($data, $id);

      $this->session->set_flashdata('message', 'Success ! Tahun berhasil edit');
      redirect('admin/Tahun', 'refresh');
    }
    else
    {
      $this->index();
    }
  }

  function publish($id, $bool)
	{
		$data['status'] = $bool;
		$this->Tahun_model->update($data, $id);
		redirect('admin/Tahun', 'refresh');
	}
}
