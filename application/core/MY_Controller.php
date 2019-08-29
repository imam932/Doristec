<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller
{
	protected $render = array();

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		$this->load->model('User_model');
		$this->render['user_baru'] = $this->User_model->get_newUsers();

		if(!$this->session->has_userdata('logged_inAdm'))
		{
			redirect('/','refresh');
		}
	}
}

class Member_Controller extends CI_Controller
{
	protected $render = array();

	public function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');

		if(!$this->session->has_userdata('logged_in'))
		{
			redirect('/','refresh');
		}

	}
}


/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */

?>
