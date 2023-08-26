<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	private $path = "";

	public function __construct()
	{
		parent::__construct();
		$this->path = FCPATH . "upload/";
		$this->load->library('pagination');
		check_role([2]);
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
		$data['admins']   = $this->all_model->get_admin(array('user.user_id' => userdata()->user_id));
		$data['profil'] = $this->all_model->tampil_data_profil(array());
		$data['admin'] = $this->all_model->tampil_data_admin(array());
		$data['kuliner'] = $this->all_model->tampil_data_kuliner(array());
		$data['anggota'] = $this->all_model->tampil_data_anggota(array());
		$data['kegiatan'] = $this->all_model->tampil_data_kegiatan(array());
		$data['profillama'] = $this->all_model->get_profil();

		$this->load->view('akunadmin', $data);
	}

	public function tambahadmin()
	{

		$result['profillama'] = $this->all_model->get_profil();
		$this->load->view('tambah_admin', $result);
	}
	public function simpandatatambahadmin()
	{
		$this->form_validation->set_rules('username_admin', 'Username', 'required|trim|is_unique[user.username]', [
			'is_unique' => 'Username ini sudah digunakan'
		]);
		$this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required|trim');
		$this->form_validation->set_rules('nohp', 'No HP', 'required|trim');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
		$this->form_validation->set_rules('email_admin', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'email ini sudah digunakan'
		]);
		$this->form_validation->set_rules('password_admin', 'Password', 'required|trim|min_length[3]', [
			'min_length' => 'Password too short!'
		]);

		if ($this->form_validation->run() == false) {
			$result['profillama'] = $this->all_model->get_profil();
			$this->load->view('tambah_admin', $result);
		} else {
			$email = $this->input->post('email_admin', true);

			$data = [
				'nama_lengkap' => htmlspecialchars($this->input->post('nama_admin', true)),
				'username' => htmlspecialchars($this->input->post('username_admin', true)),
				'email' => htmlspecialchars($email),
				'password' => password_hash($this->input->post('password_admin'), PASSWORD_DEFAULT),
				'level' => 2,
				'is_active' => 0,
				'date_created' => time()
			];

			// siapkan token
			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email' => $email,
				'token' => $token,
				'date_created' => time()
			];

			$this->db->insert('user', $data);
			$this->db->insert('user_token', $user_token);
			$query = $this->db->query("SELECT * FROM user ORDER BY user_id DESC LIMIT 1");
			$result = $query->result();

			$dataadmin = [
				'user_id' => $result[0]->user_id,
				'username_admin' => htmlspecialchars($this->input->post('username_admin', true)),
				'nama_admin' => htmlspecialchars($this->input->post('nama_admin', true)),
				'nohp' => htmlspecialchars($this->input->post('nohp', true)),
				'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
				'password_admin' => htmlspecialchars($this->input->post('password_admin', true)),
				'email_admin' => htmlspecialchars($email),
				'password_admin' => password_hash($this->input->post('password_admin'), PASSWORD_DEFAULT),
			];
			$this->db->insert('admin', $dataadmin);

			$this->_sendEmail($token, 'verify');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please activate your account</div>');
			redirect('admin/tambahadmin');
		}
	}
	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'dikkyrahmads@gmail.com',
			'smtp_pass' => 'hgfymalhzbcbgyvy',
			'smtp_port' => 465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
		];

		$this->email->initialize($config);

		$this->email->from('dikkyrahmads@gmail.com', 'Admin Aspenku');
		$this->email->to($this->input->post('email_admin'));

		if ($type == 'verify') {
			$this->email->subject('Account Verification');
			$this->email->message('Click this link to verify you account : <a href="' . base_url() . 'home/verify?email=' . $this->input->post('email_admin') . '&token=' . urlencode($token) . '">Activate</a>');
		} else if ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Click this link to reset your password : <a href="' . base_url() . 'home/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
		}

		if ($this->email->send()) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun Admin Berhasil Ditambah</div>');
			redirect('admin/tambahadmin');
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function hapus($id)
	{
		$hapus = $this->all_model->delete(array('user_id' => $id), 'user');
		if ($hapus) {
			setMsg("success", "Berhasil Hapus Data Admin!");
			redirect('admin');
		}
	}

	public function hapusanggota($id)
	{
		$hapus = $this->all_model->delete(array('anggota_id' => $id), 'anggota');
		if ($hapus) {
			setMsg("success", "Berhasil Hapus Data Anggota!");
			redirect('admin');
		}
	}

	public function simpan_edit()
	{
		$admins   = $this->all_model->get_admin(array('user.user_id' => userdata()->user_id));
		foreach ($admins as $rows) {
			$username = $rows->username;
			$password = $rows->password;
			$nama_lengkap = $rows->nama_lengkap;
			// $email = $rows->email;
			$nohp = $rows->nohp;
			$jabatan = $rows->jabatan;
		}
		$inputusername = $this->input->post('username');
		$inputpassword = password_hash($this->input->post('newpassword'), PASSWORD_DEFAULT);
		// $inputemail = $this->input->post('email');
		$inputnamalengkap = $this->input->post('nama_lengkap');
		$inputnohp = $this->input->post('nohp');
		$inputjabatan = $this->input->post('jabatan');

		$postusername = (!empty($inputusername)) ? $inputusername : $username;
		$postpassword = (!empty($inputpassword)) ? $inputpassword : $password;
		// $postemail = (!empty($inputemail)) ? $inputemail : $email;
		$postnamalengkap = (!empty($inputnamalengkap)) ? $inputnamalengkap : $nama_lengkap;
		$postnohp = (!empty($inputnohp)) ? $inputnohp : $nohp;
		$postjabatan = (!empty($inputjabatan)) ? $inputjabatan : $jabatan;
		$admin_id = $this->input->post('admin_id');
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
			$data_updates = array(
				'nohp' => $postnohp,
				'jabatan' => $postjabatan,
			);

			$simpan = $this->all_model->update(array('admin_id' => $admin_id), $data_updates, 'admin');
			$simpan = $this->all_model->update_admin(array('user_id' => $user_id), $data_update, 'kegiatan');

			if ($simpan) {
				setMsg("success", "Berhasil Edit Data Akun");
				redirect('admin');
			}
		} else {
			$data['admins']   = $this->all_model->get_admin(array('user.user_id' => userdata()->user_id));
			$data['profil'] = $this->all_model->tampil_data_profil(array());
			$data['admin'] = $this->all_model->tampil_data_admin(array());
			$data['kuliner'] = $this->all_model->tampil_data_kuliner(array());
			$data['anggota'] = $this->all_model->tampil_data_anggota(array());
			$data['kegiatan'] = $this->all_model->tampil_data_kegiatan(array());
			$data['profillama'] = $this->all_model->get_profil();
			$this->load->view('akunadmin', $data);
		}
	}
}
