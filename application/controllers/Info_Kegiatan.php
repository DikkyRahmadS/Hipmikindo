<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info_kegiatan extends CI_Controller
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
  public function index()
  {
    $result['infokegiatan'] = $this->all_model->display_records_infokegiatan();
    $search = $this->input->get('search', true);

    $config['base_url'] = base_url('info_kegiatan/index');
    $config['total_rows'] = $this->kegiatan_model->count_data($search);
    $config['per_page'] = 6;
    $config['reuse_query_string'] = TRUE;

    $this->pagination->initialize($config);

    $start = $this->uri->segment(3);
    $result['infokegiatans'] = $this->kegiatan_model->get_all_post($config['per_page'], $start, $search);
    $result['profillama'] = $this->all_model->get_profil();
    $this->load->view('info_kegiatan', $result);
  }

  public function detail_info()
  {
    $result['recentkegiatan'] = $this->all_model->display_records_recentkegiatan();
    $result['profillama'] = $this->all_model->get_profil();
    $this->load->view('detail_info_kegiatan', $result);
  }

  public function detail($id)
  {
    $detail = $this->all_model->get_detail($id);
    $result['recentkegiatan'] = $this->all_model->display_records_recentkegiatan();
    $result['detail'] = $detail;
    $result['profillama'] = $this->all_model->get_profil();
    $this->load->view('detail_info_kegiatan', $result);
  }

  public function tambahinfokegiatan()
  {
    $result['profillama'] = $this->all_model->get_profil();
    $this->load->view('tambah_info_kegiatan', $result);
  }

  public function editinfokegiatan()
  {
    $result['profillama'] = $this->all_model->get_profil();
    $this->load->view('edit_info_kegiatan', $result);
  }


  public function simpan()
  {
    $this->form_validation->set_rules(
      'judul_kegiatan',
      'Judul',
      'required',
      array(
        'required'      => 'Jangan Kosong Pada Kolom %s.',
      )
    );

    $this->form_validation->set_rules(
      'foto_kegiatan',
      'Foto',
      'nullable|mime_in[foto_kegiatan,image/png,image/jpg]|max_size[foto_kegiatan,2]',
      array(
        'mime_in'      => 'Foto Harus Berbentuk Gambar(*jpg,png)',
        'max_size'      => 'Foto Harus Kurang dari 1 MB',
      )
    );
    if ($this->form_validation->run() != false) {
      $config['upload_path']          = getcwd() . '/fotokegiatan/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 5024;;
      $config['encrypt_name']         = true;
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('foto_kegiatan')) {
        $erro = $this->upload->display_errors();
        setMsg("danger", $erro);
        redirect('info_kegiatan/tambahinfokegiatan');
      } else {
        $data = array('upload_data' => $this->upload->data());
        $filename = $data['upload_data']['file_name'];
        $data_update = array(
          'judul_kegiatan' => $this->input->post('judul_kegiatan'),
          'tgl_kegiatan' => $this->input->post('tgl_kegiatan'),
          'ket_kegiatan' => $this->input->post('ket_kegiatan'),
          'foto_kegiatan'      => $filename,
        );
        $simpan = $this->all_model->insert($data_update, 'kegiatan');
        if ($simpan) {
          setMsg("success", "Berhasil Tambah Data Info Kegiatan!");
          redirect('admin');
        }
      }
    } else {
      $data_update = array(
        'judul_kegiatan' => $this->input->post('judul_kegiatan'),
        'tgl_kegiatan' => $this->input->post('tgl_kegiatan'),
        'ket_kegiatan' => $this->input->post('ket_kegiatan'),
        'foto_kegiatan' => $this->input->post('old_img'),
      );
      $data['kegiatans'] = $data_update;
      $data['profillama'] = $this->all_model->get_profil();
      $this->load->view('tambah_info_kegiatan', $data);
    }
  }

  public function hapus($id)
  {
    $hapus = $this->all_model->delete(array('kegiatan_id' => $id), 'kegiatan');
    if ($hapus) {
      setMsg("success", "Berhasil Hapus Data Info Kegiatan!");
      redirect('admin');
    }
  }

  public function edit($id)
  {
    $data['profillama'] = $this->all_model->get_profil();
    $data['kegiatan'] = $this->all_model->get_kegiatan(array('kegiatan_id' => $id), 'kegiatan');
    $this->load->view('edit_info_kegiatan', $data);
  }

  public function simpan_edit()
  {
    $kegiatan_id = $this->input->post('kegiatan_id');
    $this->form_validation->set_rules(
      'judul_kegiatan',
      'Judul',
      'required',
      array(
        'required'      => 'Jangan Kosong Pada Kolom %s.',
      )
    );

    $this->form_validation->set_rules(
      'foto_kegiatan',
      'Foto',
      'nullable|mime_in[foto_kegiatan,image/png,image/jpg]|max_size[foto_kegiatan,2]',
      array(
        'mime_in'      => 'Foto Harus Berbentuk Gambar(*jpg,png)',
        'max_size'      => 'Foto Harus Kurang dari 1 MB',
      )
    );
    if ($this->form_validation->run() != false) {
      if (!empty($_FILES['foto_kegiatan']['name'])) {

        $config['upload_path']          = getcwd() . '/fotokegiatan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 5024;
        $config['encrypt_name']         = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto_kegiatan')) {
          $error = array('error' => $this->upload->display_errors());
          $erro = $this->upload->display_errors();
          setMsg("danger", $erro);
          redirect('info_kegiatan/edit/' . $kegiatan_id);
        } else {
          $data = array('upload_data' => $this->upload->data());
          $filename = $data['upload_data']['file_name'];
          $data_update = array(
            'judul_kegiatan' => $this->input->post('judul_kegiatan'),
            'tgl_kegiatan' => $this->input->post('tgl_kegiatan'),
            'ket_kegiatan' => $this->input->post('ket_kegiatan'),
            'foto_kegiatan'      => $filename,
          );
          $simpan = $this->all_model->update(array('kegiatan_id' => $kegiatan_id), $data_update, 'kegiatan');
          if ($simpan) {
            setMsg("success", "Berhasil Edit Data Info Kegiatan!");
            redirect('admin');
          }
        }
      } else {
        $data_update = array(
          'judul_kegiatan' => $this->input->post('judul_kegiatan'),
          'tgl_kegiatan' => $this->input->post('tgl_kegiatan'),
          'ket_kegiatan' => $this->input->post('ket_kegiatan'),
          'foto_kegiatan'      => $this->input->post('old_img'),
        );
        $simpan = $this->all_model->update(array('kegiatan_id' => $kegiatan_id), $data_update, 'kegiatan');
        if ($simpan) {
          setMsg("success", "Berhasil Edit Data Info Kegiatan!");
          redirect('admin');
        }
      }
    } else {
      $data_update = array(
        'judul_kegiatan' => $this->input->post('judul_kegiatan'),
        'tgl_kegiatan' => $this->input->post('tgl_kegiatan'),
        'ket_kegiatan' => $this->input->post('ket_kegiatan'),
        'foto_kegiatan' => $this->input->post('old_img'),
      );
      $data['kegiatan'] = $this->all_model->get_kegiatan(array('kegiatan_id' => $kegiatan_id), 'kegiatan');
      $data['kegiatans'] = $data_update;
      $data['profillama'] = $this->all_model->get_profil();
      $this->load->view('edit_info_kegiatan', $data);
    }
  }
}
