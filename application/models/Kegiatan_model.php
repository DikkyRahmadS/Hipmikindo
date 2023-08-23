<?php

class kegiatan_model extends CI_Model
{

  function display_records()
  {
    $query = $this->db->order_by('kegiatan_id', 'DESC')->limit(3)->get("kegiatan");
    return $query->result();
  }
  public function count_data($search = null)
  {
    

      if ($search != null) {
          $this->db->like('p.judul_kegiatan', $search);
      }

      $this->db->from('kegiatan p');
      return $this->db->get()->num_rows();
  }
  public function get_all_post($limit, $start, $search = null)
    {
      

        if ($search != null) {
            $this->db->like('p.judul_kegiatan', $search);
        }

        $this->db->order_by('kegiatan_id', 'DESC');
        $query = $this->db->get('kegiatan p', $limit, $start)->result();
        return $query;
    }

  public function get_kegiatan_count()
  {
    $query = $this->db->order_by('kegiatan_id','DESC' )->limit(1)->get("kegiatan");
    return $query->num_rows();
  }

  public function get_kegiatan($limit = null, $offset = null)
  {
    if (!$limit && $offset) {
      $query = $this->db
        ->order_by('kegiatan_id','DESC' )->limit(1)->get("kegiatan");
    } else {
      $query =  $this->db
      ->order_by('kegiatan_id','DESC' )->limit(1)->get("kegiatan");
    }
    return $query->result();
  }
}
