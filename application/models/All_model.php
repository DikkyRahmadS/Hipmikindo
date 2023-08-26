<?php

class All_model extends CI_Model
{
  private $_table = "kabupaten";
  public function tampil_data_admin($where = array())
  {
    $this->db->from('admin');
    $this->db->where($where);
    return $this->db->get()->result();
  }
  public function tampil_data_profil($where = array())
  {
    $this->db->from('profil');
    $this->db->where($where);
    return $this->db->get()->result();
  }
  public function get_where($table, $where, $object = false)
  {
    $query = $this->db->get_where($table, $where);

    if ($query->num_rows() <= 1 && $object == false) {
      return $query->row();
    } else {
      return $query->result();
    }
  }
  public function join2table()
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->join('admin', 'admin.user_id = user.user_id');
    $query = $this->db->get();
    return $query;
  }

  public function getKulinerByKabupaten($kabupatenId)
  {
    if ($kabupatenId) {
      $this->db->where('kabupaten_id', $kabupatenId);
    }
    return $this->db->get('kuliner')->result();
  }

  public function tampil_data_kabupaten($where = array())
  {
    $this->db->from('kabupaten');
    $this->db->where($where);
    return $this->db->get()->result();
  }

  public function tampil_data_kuliner($where = array())
  {
    $this->db->select('kuliner.*, kabupaten.*');
    $this->db->from('kuliner');
    $this->db->join('kabupaten', 'kabupaten.id_kabupaten = kuliner.kabupaten_id', 'inner');
    $this->db->where($where);
    return $this->db->get()->result();
  }

  public function tampil_data_anggota($where = array())
  {
    $this->db->from('anggota');
    $this->db->where($where);
    return $this->db->get()->result();
  }

  public function tampil_data_kegiatan($where = array())
  {
    $this->db->from('kegiatan');
    $this->db->where($where);
    return $this->db->get()->result();
  }

  public function insert($data, $table)
  {
    return $this->db->insert($table, $data);
  }

  public function delete($where, $table)
  {
    $this->db->where($where);
    return $this->db->delete($table);
  }

  public function update($where, $data, $table)
  {
    $this->db->where($where);
    return $this->db->update($table, $data);
  }

  public function get_kuliner($where = array())
  {
    $this->db->from('kuliner');
    $this->db->where($where);
    return $this->db->get()->result();
  }

  public function get_kuliner_by_kabupaten($kabupatenId, $limit, $offset)
  {
    $this->db->select('*');
    $this->db->from('kuliner');
    $this->db->where('kabupaten_id', $kabupatenId);
    $this->db->limit($limit, $offset);
    $query = $this->db->get();
    return $query->result();
  }

  public function count_kuliner_by_kabupaten($kabupatenId)
  {
    $this->db->from('kuliner');
    $this->db->where('kabupaten_id', $kabupatenId);
    return $this->db->count_all_results();
  }

  public function get_all_kuliner($kabupatenId)
{
    if ($kabupatenId) {
        $this->db->where('kabupaten_id', $kabupatenId);
    }
    return $this->db->get('kuliner')->result();
}

public function getKabupaten() {
        // Logika untuk mengambil data kabupaten dari sumber yang sesuai
        // Misalnya, melakukan query ke tabel kabupaten di database
        $query = $this->db->get('kabupaten');
        return $query->result();
    }

	public function get_user_token($email,$token)
	{
		$this->db->where('email', $email);
		$this->db->where('token', $token);
		$query = $this->db->get('user_token');
		return $query->result();
	}

  function display_records()
  {
    $query = $this->db->order_by('kuliner_id', 'DESC')->get("kuliner");
    return $query->result();
  }

  public function get_kegiatan($where = array())
  {
    $this->db->from('kegiatan');
    $this->db->where($where);
    return $this->db->get()->result();
  }

  function display_records_galeri()
  {
    $query = $this->db->order_by('kegiatan_id', 'DESC')->limit(4)->get("kegiatan");
    return $query->result();
  }

  public function get_profil($where = array())
  {
    $this->db->from('profil');
    $this->db->where($where);
    return $this->db->get()->result();
  }
  public function get_anggota($where = array())
  {
    $this->db->from('anggota');
    $this->db->where($where);
    return $this->db->get()->result();
  }
  

  function display_records_menugaleri()
  {
    $query = $this->db->order_by('kegiatan_id', 'DESC')->limit(12)->get("kegiatan");
    return $query->result();
  }

  public function get_detail($id = NULL)
  {
    $query = $this->db->get_where('kegiatan', array('kegiatan_id' => $id))->row();
    return $query;
  }

  public function get_detail_anggota($id = NULL)
  {
    $query = $this->db->get_where('anggota', array('anggota_id' => $id))->row();
    return $query;
  }

  function display_records_infokegiatan()
  {
    $query = $this->db->order_by('kegiatan_id', 'DESC')->limit(6)->get("kegiatan");
    return $query->result();
  }

  function display_records_recentkegiatan()
  {
    $query = $this->db->order_by('kegiatan_id', 'DESC')->limit(3)->get("kegiatan");
    return $query->result();
  }
  public function get_admin($where)
  {
    $this->db->from('admin');
    $this->db->join('user', 'user.user_id = admin.user_id', 'LEFT');
    $this->db->where($where);
    return $this->db->get()->result();
  }
  public function update_admin($where, $data)
  {
    $this->db->from('admin');
    $this->db->join('user', 'user.user_id = admin.user_id', 'LEFT');
    $this->db->where($where);
    $this->db->set($data);
    return $this->db->update('user');
  }

  public function get_kabupaten($id)
  {
    $query = $this->db->get_where('kabupaten', array('id_kabupaten' => $id));
    return $query->row();
  }

  public function get_kabupaten_by_id($id)
  {
      return $this->db->get_where($this->_table, ["id_kabupaten" => $id])->row();
  }

  public function get_all_kabupaten()
  {
      return $this->db->get($this->_table)->result();
  }
  
 public function get_user_by_email($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('user');

        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    
    public function insert_user($data) {
        // Assuming 'user' is the name of your user table
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }

    public function insert_user_token($data) {
        // Assuming 'user_token' is the name of your user token table
        $this->db->insert('user_token', $data);
    }
}
// zahro ilbatul
