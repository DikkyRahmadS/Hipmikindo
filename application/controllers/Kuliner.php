<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuliner extends CI_Controller
{
  private $path = "";

  public function __construct()
  {
    parent::__construct();
    $this->path = FCPATH . "upload/";
    $this->load->library('pagination');
  }
  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   * 		http://example.com/index.php/welcome
   *	- or -
   * 		http://example.com/index.php/welcome/index
   *	- or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
   */

  public function tambahkuliner()
  {
    $result['profillama'] = $this->all_model->get_profil();
    $result['kuliner'] = $this->all_model->tampil_data_kabupaten();
    $this->load->view('tambah_kuliner', $result);
  }

  public function filter() {
    // Mengambil nilai filter dari permintaan GET
    $this->load->library('pagination');

    $search = $this->input->get('search', true);

    $config['base_url'] = base_url('home/filter');
    $config['total_rows'] = $this->kegiatan_model->count_data($search);
    $config['per_page'] = 6;
    $config['reuse_query_string'] = TRUE;

    $this->pagination->initialize($config);
    $start = $this->uri->segment(3);
    $data['infokegiatans'] = $this->kegiatan_model->get_all_post($config['per_page'], $start, $search);
    $data['menugaleri'] = $this->all_model->display_records_menugaleri();
    $data['profillama'] = $this->all_model->get_profil();
    $data['kegiatan'] = $this->kegiatan_model->display_records();
    // 
    $data['galeri'] = $this->all_model->display_records_galeri();
    $data['anggota'] =  $this->db->get_where('anggota', array('status' => 2))->result();
    $data['kabupaten'] = $this->all_model->tampil_data_kabupaten();
    $kabupatenId = $this->input->get('kabupaten_id');

    // Menampilkan data kuliner sesuai filter
    $data['kuliner'] = $this->all_model->getKulinerByKabupaten($kabupatenId);
    $data['kabupaten'] = $this->all_model->getKabupaten();

    // Menampilkan halaman galeri dengan hasil filter
    $this->load->view('galeri', $data);
}

  public function editkuliner()
  {
    $result['profillama'] = $this->all_model->get_profil();
    $result['kuliner'] = $this->all_model->tampil_data_kabupaten();
    $this->load->view('edit_kuliner', $result);
  }

  public function simpan()
{
  $foto_kuliner = $_FILES['foto_kuliner']['name'];
  $this->form_validation->set_rules('nama_kuliner', 'Nama Kuliner', 'required|min_length[1]');
  $this->form_validation->set_rules(
      'foto_kuliner',
      'Foto',
      'callback_validate_image'
  );
  
  if ($this->form_validation->run() == false) {
      $error = $this->upload->display_errors();
      setMsg("danger", $error);
      redirect('kuliner/tambahkuliner');
  } else {
      $config['upload_path']          = './fotokuliner/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 1024;
      $config['encrypt_name']         = true;
      $this->load->library('upload', $config);
  
      if (!$this->upload->do_upload('foto_kuliner')) {
          $error = $this->upload->display_errors();
          setMsg("danger", $error);
          redirect('kuliner/tambahkuliner');
      } else {
          $data = array('upload_data' => $this->upload->data());
          $filename = $data['upload_data']['file_name'];
          $data_update = array(
              'nama_kuliner' => $this->input->post('nama_kuliner'),
              'kabupaten_id' => $this->input->post('kabupaten_id'),
              'foto_kuliner' => $filename,
          );
          // var_dump($data_update);
          $simpan = $this->all_model->insert($data_update, 'kuliner');
  
          // Tambahkan var_dump() di sini untuk memeriksa nilai variabel atau ekspresi tertentu
          // var_dump($simpan);
  
          if ($simpan) {
              setMsg("success", "Berhasil Tambah Data Kuliner!");
              redirect('admin');
          }
      }
  }
  
}

public function validate_image($str)
{
    $allowed_mime_types = array('image/png', 'image/jpeg', 'image/jpg');
    $mime_type = $_FILES['foto_kuliner']['type'];

    if (!in_array($mime_type, $allowed_mime_types)) {
        $this->form_validation->set_message('validate_image', 'Foto Harus Berbentuk Gambar (jpg, png)');
        return false;
    }

    return true;
}

  public function hapus($id)
  {
    $hapus = $this->all_model->delete(array('kuliner_id' => $id), 'kuliner');
    if ($hapus) {
      setMsg("success", "Berhasil Hapus Data Kuliner!");
      redirect('admin');
    }
  }

  public function edit($id)
  {
    $data['profillama'] = $this->all_model->get_profil();
    $data['kuliner'] = $this->all_model->get_kuliner(array('kuliner_id' => $id), 'kuliner');
   
    $data['kabupaten'] = $this->all_model->tampil_data_kabupaten();
    $this->load->view('edit_kuliner', $data);
  }

  public function simpan_edit()
  {
    $kuliner_id = $this->input->post('kuliner_id');
    if (!empty($_FILES['foto_kuliner']['name'])) {

      $config['upload_path']          = getcwd() . '/fotokuliner/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 5024;
      $config['encrypt_name']         = true;
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('foto_kuliner')) {
        $error = $this->upload->display_errors();
        setMsg("danger", $error);
        redirect('kuliner/edit/' . $kuliner_id);
      } else {
        $data = array('upload_data' => $this->upload->data());
        $filename = $data['upload_data']['file_name'];
        $data_update = array(
          'nama_kuliner' => $this->input->post('nama_kuliner'),
          'kabupaten_id' => $this->input->post('kabupaten_id'),
          'foto_kuliner' => $filename,
        );
        $simpan = $this->all_model->update(array('kuliner_id' => $kuliner_id), $data_update, 'kuliner');
        if ($simpan) {
          setMsg("success", "Berhasil Edit Data Kuliner!");


          redirect('admin');
        }
      }
    } else {
      $data_update = array(
        'nama_kuliner' => $this->input->post('nama_kuliner'),
        'kabupaten_id' => $this->input->post('kabupaten_id'),
      );
      $simpan = $this->all_model->update(array('kuliner_id' => $kuliner_id), $data_update, 'kuliner');
      if ($simpan) {
        setMsg("success", "Berhasil Edit Data Kuliner!");
        redirect('admin');
      }
    }
  }

  
  
}
