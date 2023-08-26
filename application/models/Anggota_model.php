<?php

class anggota_model extends CI_Model
{

  function display_records()
  {
    $query = $this->db->order_by('anggota_id', 'DESC')->limit(2)->get("anggota");
    return $query->result();
  }
  public function count_data($search = null)
  {
    

      if ($search != null) {
          $this->db->like('p.nama_umkm', $search);
      }
      $this->db->where('status', 2);
      $this->db->from('anggota p');
      return $this->db->get()->num_rows();
  }
  public function get_all_post($limit, $start, $search = null)
  {
      $where = array(); // Mendefinisikan variabel $where
  
      $this->db->select('anggota.*, kabupaten.*');
      $this->db->from('anggota');
      $this->db->join('kabupaten', 'kabupaten.id_kabupaten = anggota.kabupaten_id', 'inner');
  
      // Menambahkan kondisi WHERE
      if ($search != null) {
          $this->db->like('anggota.nama_umkm', $search);
      }
  
      // Menggunakan variabel $where
      $this->db->where($where);
			$this->db->where('anggota.status =',2);
  
      $this->db->order_by('anggota.anggota_id', 'DESC');
      $this->db->limit($limit, $start);
      $query = $this->db->get()->result();
      return $query;
  }
  

  public function get_anggota_count()
  {
    $query = $this->db->order_by('anggota_id','DESC' )->limit(1)->get("anggota");
    return $query->num_rows();
  }

  public function get_anggota($limit = null, $offset = null)
  {
    if (!$limit && $offset) {
      $query = $this->db
        ->order_by('anggota_id','DESC' )->limit(1)->get("anggota");
    } else {
      $query =  $this->db
      ->order_by('anggota_id','DESC' )->limit(1)->get("anggota");
    }
    return $query->result();
  }
}
