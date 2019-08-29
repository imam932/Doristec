<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian_dataset_model extends CI_Model
{
  var $table = "antrian_dataset";

  public function select_all()
  {
    $this->db->select('id_antrian_dokumen,judul,tahun,prodi,status');
    $this->db->from($this->table);
    $this->db->join('dokumen_user', 'dokumen_user.id_dokumen_user = antrian_dokumen.id_dokumen_user');
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

  public function select_detail($id)
  {
    $this->db->select('antrian_dataset.id_antrian_dataset,antrian_dataset.similarity_angka,antrian_dataset.similarity_text,dataset.judul,dataset.tahun,dataset.prodi,dataset.keyword,dataset.created_at');
    $this->db->from($this->table);
    $this->db->join('dataset', 'antrian_dataset.id_data = dataset.id_data');
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

  public function insert_batch($data)
  {
    $this->db->insert_batch($this->table, $data);
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
