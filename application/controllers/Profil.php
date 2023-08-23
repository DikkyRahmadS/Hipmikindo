<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
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
  public function index()
  {
    $data['profillama'] = $this->all_model->get_profil();
    $this->load->view('profil', $data);
  }

  public function edit($id)
  {
    $data['profillama'] = $this->all_model->get_profil();
    $data['profil'] = $this->all_model->get_profil(array('profil_id' => $id), 'profil');
    $this->load->view('edit_profil', $data);
  }

  public function simpan_edit()
  {
    $profil_id = $this->input->post('profil_id');
    $logo_aspenku = $this->input->post('logo_aspenku');
    $this->form_validation->set_rules('ket_umum', 'Nama', 'required');
    $this->form_validation->set_rules(
      'sejarah',
      'Sejarah',
      'required',
      array(
        'required'      => 'Jangan Kosong Pada Kolom %s.',
      )
    );

    $this->form_validation->set_rules(
      'visi_misi',
      'Visi Misi',
      'required',
      array(
        'required'      => 'Jangan Kosong Pada Kolom %s.',
      )
    );
    $this->form_validation->set_rules(
      'struktur',
      'Struktur',
      'required',
      array(
        'required'      => 'Jangan Kosong Pada Kolom %s.',
      )
    );
    $this->form_validation->set_rules(
      'cabang',
      'Cabang',
      'required',
      array(
        'required'      => 'Jangan Kosong Pada Kolom %s.',
      )
    );
    $this->form_validation->set_rules(
      'logo_aspenku',
      'Foto',
      'nullable|mime_in[logo_aspenku,image/png,image/jpg]|max_size[logo_aspenku,2]',
      array(
        'mime_in'      => 'Foto Harus Berbentuk Gambar(*jpg,png)',
        'max_size'      => 'Foto Harus Kurang dari 1 MB',
      )
    );
    $this->form_validation->set_rules(
      'nama_aspenku',
      'Nama Aspen',
      'required',
      array(
        'required'      => 'Jangan Kosong Pada Kolom %s.',
      )
    );
    $this->form_validation->set_rules(
      'singkatan_asosiasi',
      'Singkatan Asosiasi',
      'required',
      array(
        'required'      => 'Jangan Kosong Pada Kolom %s.',
      )
    );
    $this->form_validation->set_rules(
      'syarat_anggota',
      'Syarat Anggota',
      'required',
      array(
        'required'      => 'Jangan Kosong Pada Kolom %s.',
      )
    );

    if ($this->form_validation->run() != false) {
      if (!empty($_FILES['logo_aspenku']['name'])) {
        $config['upload_path']          = getcwd() . '/fotoprofil/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 5024;
        $config['encrypt_name']         = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('logo_aspenku')) {
          $erro = $this->upload->display_errors();
          setMsg("danger", $erro);
          redirect('profil/edit/' . $profil_id);
        } else {
          $data = array('upload_data' => $this->upload->data());
          $filename = $data['upload_data']['file_name'];
          $data_update = array(
            'ket_umum' => $this->input->post('ket_umum'),
            'sejarah' => $this->input->post('sejarah'),
            'visi_misi' => $this->input->post('visi_misi'),
            'struktur' => $this->input->post('struktur'),
            'proker' => $this->input->post('proker'),
            'cabang' => $this->input->post('cabang'),
            'nama_aspenku' => $this->input->post('nama_aspenku'),
            'singkatan_asosiasi' => $this->input->post('singkatan_asosiasi'),
            'alamat_aspenku' => $this->input->post('alamat_aspenku'),
            'syarat_anggota' => $this->input->post('syarat_anggota'),
            'logo_aspenku' => $filename,

          );
          $simpan = $this->all_model->update(array('profil_id' => $profil_id), $data_update, 'profil');
          if ($simpan) {
            setMsg('success', 'Berhasil Edit Data');

            redirect('profil/edit/' . $profil_id);
          }
        }
      } else {
        $data_update = array(
          'ket_umum' => $this->input->post('ket_umum'),
          'sejarah' => $this->input->post('sejarah'),
          'visi_misi' => $this->input->post('visi_misi'),
          'struktur' => $this->input->post('struktur'),
          'proker' => $this->input->post('proker'),
          'cabang' => $this->input->post('cabang'),
          'nama_aspenku' => $this->input->post('nama_aspenku'),
          'singkatan_asosiasi' => $this->input->post('singkatan_asosiasi'),
          'alamat_aspenku' => $this->input->post('alamat_aspenku'),
          'syarat_anggota' => $this->input->post('syarat_anggota'),
        );
        $data['profillama'] = $this->all_model->get_profil();
        $simpan = $this->all_model->update(array('profil_id' => $profil_id), $data_update, 'profil');
        if ($simpan) {
          setMsg('success', 'Berhasil Edit Data');

          redirect('profil/edit/' . $profil_id);
        }
      }
    } else {
      $data_update = array(
        'profil_id' => $this->input->post('profil_id'),
        'ket_umum' => $this->input->post('ket_umum'),
        'sejarah' => $this->input->post('sejarah'),
        'visi_misi' => $this->input->post('visi_misi'),
        'struktur' => $this->input->post('struktur'),
        'proker' => $this->input->post('proker'),
        'cabang' => $this->input->post('cabang'),
        'nama_aspenku' => $this->input->post('nama_aspenku'),
        'singkatan_asosiasi' => $this->input->post('singkatan_asosiasi'),
        'alamat_aspenku' => $this->input->post('alamat_aspenku'),
        'syarat_anggota' => $this->input->post('syarat_anggota'),
      );
      $data['profil'] = $data_update;
      $data['profillama'] = $this->all_model->get_profil();

      $this->load->view('edit_profil', $data);
    }
  }

  public function profilkabupaten($id_kabupaten)
  {
    $data['kabupaten'] = $this->all_model->get_kabupaten_by_id($id_kabupaten);
    $data['profillama'] = $this->all_model->get_profil();
    // var_dump();
    $this->load->view('profilkabupaten', $data);
  }
}
