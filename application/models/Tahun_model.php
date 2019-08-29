<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_model extends CI_Model{

  var $table = "tahun";

  public function select_all()
  {
    $this->db->order_by('tahun');
    $query = $this->db->get($this->table);

    if($query->num_rows() > 0)
    {
      return $query->result();
    }
    else
    {
      return array();
    }
  }

  public function select_by_id($id)
  {
    $this->db->where('id_tahun', $id);
    $query = $this->db->get($this->table);

    if($query->num_rows() == 1)
    {
      return $query->row();
    }
    else
    {
      return false;
    }
  }

  public function get_statusAktif()
  {
    $this->db->where('status', 1);
    $query = $this->db->get($this->table);

    if($query->num_rows() > 0)
    {
      return $query->first_row();
    }
    else
    {
      return false;
    }
  }

  public function insert()
  {
    $data = array(
      'tahun' => $this->input->post('tahun'),
      'status' => 0
    );

    $this->db->insert($this->table, $data);
  }

  public function update($data, $id)
  {
    $this->db->where('id_tahun', $id);
    $this->db->update($this->table, $data);
  }

  public function delete($id)
  {
    $this->db->where('id_tahun', $id);
    $this->db->delete($this->table);
  }

}
