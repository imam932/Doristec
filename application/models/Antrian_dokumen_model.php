<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian_dokumen_model extends CI_Model
{
  var $table = "antrian_dokumen";

  public function select_all()
  {
    $this->db->select('id_antrian_dokumen,judul,tahun,prodi,status,antrian_dokumen.created_at');
    $this->db->from($this->table);
    $this->db->join('dokumen_user', 'dokumen_user.id_dokumen_user = antrian_dokumen.id_dokumen_user');
    $this->db->order_by("antrian_dokumen.created_at", "DESC");
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

  public function get_all($field, $value)
  {
    $this->db->from($this->table);
    $this->db->join('dokumen_user', 'dokumen_user.id_dokumen_user = antrian_dokumen.id_dokumen_user');
    $this->db->order_by("antrian_dokumen.created_at", "DESC");
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
  public function get_allPenelitianMhs($tahun)
  {
    $this->db->join('dokumen_user', 'dokumen_user.id_dokumen_user = antrian_dokumen.id_dokumen_user');
    $this->db->order_by("antrian_dokumen.created_at", "DESC");
    $this->db->like('antrian_dokumen.created_at', $tahun);

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

  public function select_detail($id)
  {
    $this->db->from($this->table);
    $this->db->join('dokumen_user', 'dokumen_user.id_dokumen_user = antrian_dokumen.id_dokumen_user');
    $this->db->where('id_antrian_dokumen', $id);
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
  public function select_detail_wuser($id)
  {
    $this->db->from($this->table);
    $this->db->join('dokumen_user', 'dokumen_user.id_dokumen_user = antrian_dokumen.id_dokumen_user');
    $this->db->join('users', 'users.id_user = antrian_dokumen.id_user');
    $this->db->where('id_antrian_dokumen', $id);
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

  // public function select_by_id($id)
  // {
  //   $this->db->where('id_dokumen_user', $id);
  //
  //   $query = $this->db->get($this->table);
  //
  //   if ($query->num_rows() == 1)
  //   {
  //     return $query->result_array();
  //   }
  //   else
  //   {
  //     return false;
  //   }
  // }

  public function insert($data)
  {
    $this->db->insert($this->table, $data);
    $insertId = $this->db->insert_id();
    return $insertId;
  }

  public function update($data, $id)
  {
    $this->db->where('id_antrian_dokumen', $id);
    $this->db->update($this->table, $data);
  }

  public function delete($id)
  {
    $this->db->where('id_antrian_dokumen', $id);
    $this->db->delete($this->table);
  }
}

/* End of file Dataset_model.php */
/* Location: ./application/models/Dataset_model.php */

?>
