<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
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
    $data['anggota'] = $this->all_model->tampil_data_anggota(array());
    $search = $this->input->get('search', true);
    $config['base_url'] = base_url('anggota/index');
    $config['total_rows'] = $this->anggota_model->count_data($search);
    $config['per_page'] = 2;
    $config['reuse_query_string'] = TRUE;

    $this->pagination->initialize($config);

    $start = $this->uri->segment(3);
    $data['anggotas'] = $this->anggota_model->get_all_post($config['per_page'], $start, $search);
    $data['profillama'] = $this->all_model->get_profil();
    $this->load->view('anggota', $data);
  }

  public function akunanggota()
  {
    check_session();

    $result['anggota'] = $this->all_model->tampil_data_anggota(array('user_id' => userdata()->user_id), 'anggota');
    $result['profillama'] = $this->all_model->get_profil();
    $this->load->view('akunanggota', $result);
  }

  public function editanggota($id)
  {
    $result['profillama'] = $this->all_model->get_profil();
    $result['anggota'] = $this->all_model->get_anggota(array('anggota_id' => $id), 'anggota');
    $this->load->view('editanggota', $result);
  }
  public function respon($id)
  {
    $data_update = array(
      'status' => $this->input->post('status'),

    );
    $simpan = $this->all_model->update(array('anggota_id' => $id), $data_update, 'anggota');
    if ($simpan) {
      setMsg('success', 'Berhasil Konfirmasi Data Anggota');
      redirect('admin');
    }
  }
  public function simpan_edit()
  {
    $anggota_id = $this->input->post('anggota_id');
    $logo_umkm = $this->input->post('logo_umkm');
    $this->form_validation->set_rules('nama_umkm', 'Nama', 'required');
    $this->form_validation->set_rules('email_umkm', 'Email Umkm', 'required');
    $this->form_validation->set_rules('owner', 'Owner', 'required');
    $this->form_validation->set_rules('alamat_umkm', 'Alamat Umkm', 'required');
    $this->form_validation->set_rules('nowa', 'No WA', 'required');
    $this->form_validation->set_rules('username_ig', 'Username IG', 'required');

    if ($this->form_validation->run() != false) {
      $config['upload_path']          = getcwd() . '/fotoanggota/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 5024;
      $config['encrypt_name']         = true;
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('list_menu')) {
        $data = array('upload_data' => $this->upload->data());
        $filename = $data['upload_data']['file_name'];
        $data_update = array(
          'list_menu' => $filename,
        );
        $simpan = $this->all_model->update(array('anggota_id' => $anggota_id), $data_update, 'anggota');
        if ($simpan) {
          setMsg('success', 'Berhasil Edit Data UMKM');
          
          redirect('anggota/editanggota/' . $anggota_id);
        }
      } else if ($this->upload->do_upload('halal_produk')) {
        $data = array('upload_data' => $this->upload->data());
        $filename = $data['upload_data']['file_name'];
        $data_update = array(
          'halal_produk' => $filename,
        );
        $simpan = $this->all_model->update(array('anggota_id' => $anggota_id), $data_update, 'anggota');
        if ($simpan) {
          setMsg('success', 'Berhasil Edit Data UMKM');

          redirect('anggota/editanggota/' . $anggota_id);
        }
      } else if ($this->upload->do_upload('tempat_dalam_umkm')) {
        $data = array('upload_data' => $this->upload->data());
        $filename = $data['upload_data']['file_name'];
        $data_update = array(
          'tempat_dalam_umkm' => $filename,
        );
        $simpan = $this->all_model->update(array('anggota_id' => $anggota_id), $data_update, 'anggota');
        if ($simpan) {
          setMsg('success', 'Berhasil Edit Data UMKM');

          redirect('anggota/editanggota/' . $anggota_id);
        }
      } else if (!$this->upload->do_upload('logo_umkm')) {
        $data_update = array(
          'user_id' => userdata()->user_id,
          'nama_umkm' => $this->input->post('nama_umkm'),
          'email_umkm' => $this->input->post('email_umkm'),
          'owner' => $this->input->post('owner'),
          'alamat_umkm' => $this->input->post('alamat_umkm'),
          'nowa' => $this->input->post('nowa'),
          'username_ig' => $this->input->post('username_ig'),
        );
        $data['profillama'] = $this->all_model->get_profil();
        $simpan = $this->all_model->update(array('anggota_id' => $anggota_id), $data_update, 'anggota');
        if ($simpan) {
          setMsg('success', 'Berhasil Edit Data UMKM');

          redirect('anggota/editanggota/' . $anggota_id);
        }
      } else {
        $data = array('upload_data' => $this->upload->data());
        $filename = $data['upload_data']['file_name'];
        $data_update = array(
          'user_id' => userdata()->user_id,
          'nama_umkm' => $this->input->post('nama_umkm'),
          'email_umkm' => $this->input->post('email_umkm'),
          'owner' => $this->input->post('owner'),
          'alamat_umkm' => $this->input->post('alamat_umkm'),
          'nowa' => $this->input->post('nowa'),
          'username_ig' => $this->input->post('username_ig'),
          'logo_umkm' => $filename,

        );
        $simpan = $this->all_model->update(array('anggota_id' => $anggota_id), $data_update, 'anggota');
        if ($simpan) {
          setMsg('success', 'Berhasil Edit Data UMKM');

          redirect('anggota/editanggota/' . $anggota_id);
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

  public function tambahanggota()
  {
    $result['profillama'] = $this->all_model->get_profil();
    $this->load->view('tambah_anggota', $result);
  }
  public function simpandatatambahanggota()
  {
    $this->form_validation->set_rules('nama_umkm', 'Nama UMKM', 'required|trim');
    $this->form_validation->set_rules('owner', 'Nama Owner', 'required|trim');
    $this->form_validation->set_rules('email_umkm', 'Email UMKM', 'required|trim');
    $this->form_validation->set_rules('alamat_umkm', 'Alamat UMKM', 'required|trim');
    $this->form_validation->set_rules('nowa', 'No Wa UMKM', 'required|trim');
    $this->form_validation->set_rules('username_ig', 'Instagram UMKM', 'required|trim');
    $this->form_validation->set_rules(
      'logo_umkm',
      'Foto',
      'nullable|mime_in[logo_umkm,image/png,image/jpg]|max_size[logo_umkm,2]',
      array(
        'mime_in'      => 'Foto Harus Berbentuk Gambar(*jpg,png)',
        'max_size'      => 'Foto Harus Kurang dari 1 MB',
      )
    );
    $this->form_validation->set_rules(
      'list_menu',
      'Foto',
      'nullable|mime_in[list_menu,image/png,image/jpg]|max_size[list_menu,2]',
      array(
        'mime_in'      => 'Foto Harus Berbentuk Gambar(*jpg,png)',
        'max_size'      => 'Foto Harus Kurang dari 1 MB',
      )
    );
    $this->form_validation->set_rules(
      'halal_produk',
      'Foto',
      'nullable|mime_in[halal_produk,image/png,image/jpg]|max_size[halal_produk,2]',
      array(
        'mime_in'      => 'Foto Harus Berbentuk Gambar(*jpg,png)',
        'max_size'      => 'Foto Harus Kurang dari 1 MB',
      )
    );
    $this->form_validation->set_rules(
      'tempat_dalam_umkm',
      'Foto',
      'nullable|mime_in[tempat_dalam_umkm,image/png,image/jpg]|max_size[tempat_dalam_umkm,2]',
      array(
        'mime_in'      => 'Foto Harus Berbentuk Gambar(*jpg,png)',
        'max_size'      => 'Foto Harus Kurang dari 1 MB',
      )
    );
    if ($this->form_validation->run() == false) {
      $data['profillama'] = $this->all_model->get_profil();
      $this->load->view('tambah_anggota', $data);
    } else {
      $config['upload_path']          = getcwd() . '/fotoanggota/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg';
      $config['max_size']             = 5024;;
      $config['encrypt_name']         = true;
      $this->load->library('upload', $config);
      $data = array('upload_data' => $this->upload->data());
      $halal_produk = $data['upload_data']['file_name'];
      if ($this->upload->do_upload('logo_umkm')) {
        $data = array('upload_data' => $this->upload->data());
        $logo_umkm = $data['upload_data']['file_name'];
        if ($this->upload->do_upload('list_menu')) {
          $data = array('upload_data' => $this->upload->data());
          $list_menu = $data['upload_data']['file_name'];
          // if ($this->upload->do_upload('halal_produk')) {
          //   $data = array('upload_data' => $this->upload->data());
          //   $halal_produk = $data['upload_data']['file_name'];
            if ($this->upload->do_upload('tempat_dalam_umkm')) {
              $data = array('upload_data' => $this->upload->data());
              $tempat_dalam_umkm = $data['upload_data']['file_name'];
              $data_update = array(
                'user_id' => userdata()->user_id,
                'nama_umkm' => $this->input->post('nama_umkm'),
                'owner' => $this->input->post('owner'),
                'email_umkm' => $this->input->post('email_umkm'),
                'alamat_umkm' => $this->input->post('alamat_umkm'),
                'nowa' => $this->input->post('nowa'),
                'username_ig' => $this->input->post('username_ig'),
                'logo_umkm'      => $logo_umkm,
                'list_menu'      => $list_menu,
                'halal_produk'      => $halal_produk,
                'tempat_dalam_umkm'      => $tempat_dalam_umkm,
              );
              $simpan = $this->db->insert('anggota', $data_update);
              if ($simpan) {
                setMsg("success", "Berhasil Daftar!");
                redirect('anggota/tambahanggota');
              }
            } else {
              setMsg("danger", "Gagal Daftar!");

              redirect('anggota/tambahanggota');
            }
          // } else {
          //   setMsg("danger", "Gagal Daftar!");

          //   redirect('anggota/tambahanggota');
          // }
        } else {
          setMsg("danger", "Gagal Daftar!");

          redirect('anggota/tambahanggota');
        }
      } else {
        redirect('anggota/tambahanggota');
      }
    }
  }

  public function detailanggota($id)
  {
    $result['profillama'] = $this->all_model->get_profil();
    $result['anggota'] = $this->all_model->get_anggota(array('anggota_id' => $id), 'anggota');
    $this->load->view('detail_anggota', $result); 
  }

  public function lihatanggota($id)
  {
    $detail = $this->all_model->get_detail_anggota($id);
    $result['detail'] = $detail;
    $data['anggota'] = $this->all_model->tampil_data_anggota(array());
    $result['profillama'] = $this->all_model->get_profil(); 
    $this->load->view('lihat_anggota', $result);
  }
  
  public function hapus($id)
  {
    $hapus = $this->all_model->delete(array('anggota_id' => $id), 'anggota');
    if ($hapus) {
      setMsg("success", "Berhasil Hapus Data Anggota!");
      redirect('anggota/akunanggota');
    }
  }
  public function simpan_edits()
  {
    $admins   = $this->all_model->get_admin(array('user.user_id' => userdata()->user_id));
    foreach ($admins as $rows) {
      $username = $rows->username;
      $password = $rows->password;
      $nama_lengkap = $rows->nama_lengkap;
      // $email = $rows->email;
     }
    $inputusername = $this->input->post('username');
    $inputpassword = password_hash($this->input->post('newpassword'), PASSWORD_DEFAULT);
    // $inputemail = $this->input->post('email');
    $inputnamalengkap = $this->input->post('nama_lengkap');

    $postusername = (!empty($inputusername)) ? $inputusername : $username;
    $postpassword = (!empty($inputpassword)) ? $inputpassword : $password;
    // $postemail = (!empty($inputemail)) ? $inputemail : $email;
    $postnamalengkap = (!empty($inputnamalengkap)) ? $inputnamalengkap : $nama_lengkap;
    $user_id = $this->input->post('user_id');
    $this->form_validation->set_rules('username', 'Username', 'trim|is_unique[user.username]', [
      'is_unique' => 'Username Telah Digunakan!'
    ]);
    // $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[user.email]', [
    //   'is_unique' => 'This email has already registered!'
    // ]);
    $this->form_validation->set_rules('password', 'Password', 'nullable|trim|min_length[3]', [
      'min_length' => 'Password too short!'
    ]);
    if ($this->form_validation->run() != false) {
      $data_update = array(
        'username' => $postusername,
        'nama_lengkap' => $postnamalengkap,
        'password' => $postpassword,
        // 'email' => $postemail,
      );
      $simpan = $this->all_model->update(array('user_id' => $user_id), $data_update, 'user');
      if ($simpan) {
        setMsg("success", "Berhasil Edit Data Akun!");
        redirect('anggota/akunanggota');
      }
    } else {
      $data['admins']   = $this->all_model->get_admin(array('user.user_id' => userdata()->user_id));
      $data['profil'] = $this->all_model->tampil_data_profil(array());
      $data['admin'] = $this->all_model->tampil_data_admin(array());
      $data['kuliner'] = $this->all_model->tampil_data_kuliner(array());
      $data['anggota'] = $this->all_model->tampil_data_anggota(array());
      $data['kegiatan'] = $this->all_model->tampil_data_kegiatan(array());
      $data['profillama'] = $this->all_model->get_profil();
      $this->load->view('akunanggota', $data);
    }
  }
}
