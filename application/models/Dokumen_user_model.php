<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumen_user_model extends CI_Model
{
  var $table = "dokumen_user";

  public function select_all()
  {
    $this->db->order_by("created_at", "DESC");
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

  public function get_all($field, $value)
  {
    $this->db->from($this->table);
    $this->db->join('users', 'dokumen_user.id_user = users.id_user');
    $this->db->where($field, $value);
    $query = $this->db->get();

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
    $this->db->where('id_dokumen_user', $id);

    $query = $this->db->get($this->table);

    if ($query->num_rows() == 1)
    {
      return $query->result_array();
    }
    else
    {
      return false;
    }
  }

  public function insert($data)
  {
    $this->db->insert($this->table, $data);
  }

  public function update($data, $id)
  {
    $this->db->where('id_dokumen_user', $id);
    $this->db->update($this->table, $data);
  }

  public function delete($id)
  {
    $this->db->where('id_dokumen_user', $id);
    $this->db->delete($this->table);
  }
}
/* End of file Dataset_model.php */
/* Location: ./application/models/Dataset_model.php */
?>
