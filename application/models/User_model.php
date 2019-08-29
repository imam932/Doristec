<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{

  var $table = "users";

  public function __construct()
  {
    parent::__construct();
  }

  public function login_admin($data)
	{
		$condition = "email = '" . $data['email'] . "' AND password = '" . $data['password'] . "'";

		$this->db->from($this->table);
		$this->db->where($condition); //kondisi login sesuai dengan data di database
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() == 1)
		{
			return $query->result_array();
		}
		else
		{
			return FALSE;
		}
	}

  public function get_allmhs()
  {
    $this->db->where('level', 'Mahasiswa');
    $query = $this->db->get($this->table);

    if($query->num_rows() > 0)
    {
      return $query->result_array();
    }
    else
    {
      return array();
    }
  }

  public function get_newUsers()
  {
    $this->db->where('level', 'Dosen');
    $this->db->where('status', 0);
    $query = $this->db->get($this->table);

    if($query->num_rows() > 0)
    {
      return $query->result_array();
    }
    else
    {
      return array();
    }
  }
  public function get_Panitia()
  {
    $this->db->where('level', 'Dosen');
    $this->db->where('status', 1);
    $query = $this->db->get($this->table);

    if($query->num_rows() > 0)
    {
      return $query->result_array();
    }
    else
    {
      return array();
    }
  }

  public function select_by_field($field, $value)
  {
    $this->db->where($field, $value);
    $this->db->where('level', 'Mahasiswa');
    $query = $this->db->get($this->table);

    if($query->num_rows() > 0)
    {
      return $query->result_array();
    }
    else
    {
      return array();
    }
  }

  public function select_by_id($id)
  {
    $this->db->where('id_user', $id);
    $query = $this->db->get($this->table);

    if($query->num_rows() == 1)
    {
      return $query->result_array();
    }
    else
    {
      return false;
    }
  }

  public function update_verifikasi($id){
    $data = array('status' => 1);

    $this->db->where('id_user', $id);
    $this->db->update($this->table,$data);
  }

  public function insert()
  {
    $data['id_user']       = random_string('alnum', 8) . date('dmY') . random_string('alnum', 8). rand(1, 99000);
    $data['nama']          = $this->input->post('nama');
    $data['email']         = $this->input->post('email');
    $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
    $data['alamat']        = $this->input->post('alamat');
    $data['nohp']          = $this->input->post('nohp');
    $data['prodi']         = $this->input->post('prodi');
    $data['password']      = md5($this->input->post('password'));
    $data['level']         = $this->input->post('akses');

    $this->db->insert($this->table, $data);
  }

  public function update($data, $id)
  {
    $this->db->where('id_user', $id);
    $this->db->update($this->table, $data);
  }

  public function delete($id)
  {
    $this->db->where('id_user', $id);

    if($this->db->delete($this->table))
    {
        return true;
    }else {
      return false;
    }
  }
}
