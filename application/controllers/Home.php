<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function index()
	{
		$data['error_message'] = $this->session->flashdata('error_message');

		$this->load->view("home", $data);
	}

}
