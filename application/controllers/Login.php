<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function process_login()
	{
		$this->load->model('User_model');

		// form validation
		$this->form_validation->set_rules('email', 'Email', 'required|alpha_dash|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() != TRUE)
		{
			$data = array( // data dari form login
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password'))
			);

			$result = $this->User_model->login_admin($data);
			if($result != FALSE) //kondisi jika login berhasil
			{
				$session_data = array(
					'id_user' => $result[0]['id_user'],
					'nama' 		=> $result[0]['nama'],
					'level' 	=> $result[0]['level'],
					'email' 	=> $result[0]['email'],
					'prodi'		=> $result[0]['prodi']
				);

				if ($result[0]['level'] == 'Mahasiswa') {
					$this->session->set_userdata('logged_in', $session_data);
					redirect('dokumen','refresh');
				}else if ($result[0]['level'] == 'Dosen' && $result[0]['status'] == 1){
					$this->session->set_userdata('logged_inAdm', $session_data);
					redirect('admin','refresh');
				}else {
					$message['invalid_user'] = 'User tidak terdaftar';
					$this->session->set_flashdata('error_message', $message);
					redirect('/','refresh');
				}
			}
			else
			{ //apabila form masih dalam keadaan kosong
				$message = array();

				if(form_error('email') != "")
				{
					$message['email'] = form_error('email');
				}
				if(form_error('password') != "")
				{
					$message['password'] = form_error('password');
				}

				$this->session->set_flashdata('error_message', $message);
				redirect('/','refresh');
			}
		}

	}

	// proses logout dari SI
	public function process_logoutAdm()
	{
		$this->session->unset_userdata('logged_inAdm');
		redirect('/','refresh');
	}
	public function process_logout()
	{
		$this->session->unset_userdata('logged_in');
		redirect('/','refresh');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/member/Login.php */
?>
