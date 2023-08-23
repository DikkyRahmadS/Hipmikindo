<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/PHPMailer/src/PHPMailer.php';
require_once APPPATH . 'third_party/PHPMailer/src/SMTP.php';
require_once APPPATH . 'third_party/PHPMailer/src/Exception.php';
class Home extends CI_Controller
{
	private $path = "";

	public function __construct()
	{
		parent::__construct();
		$this->path = FCPATH . "upload/";
		$this->load->library('pagination');
		$this->load->model('All_model');
		$this->load->library('form_validation');
		$this->load->library('email');
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
		$result['kegiatan'] = $this->kegiatan_model->display_records();
		$result['kuliner'] = $this->all_model->display_records();
		$result['galeri'] = $this->all_model->display_records_galeri();
		$result['profillama'] = $this->all_model->get_profil();
		$result['anggota'] =  $this->db->get_where('anggota', array('status' => 2))->result();
		$this->load->view('home', $result);
	}

	public function profil()
	{
		$result['profillama'] = $this->all_model->get_profil();
		$this->load->view('profil', $result);
	}

	public function berita()
	{
		$result['profillama'] = $this->all_model->get_profil();
		$this->load->view('berita', $result);
	}

	public function profilkabupaten($id_kabupaten)
	{
		$data['kabupaten'] = $this->all_model->get_kabupaten_by_id($id_kabupaten);
		$data['profillama'] = $this->all_model->get_profil();
		// var_dump();
		$this->load->view('profilkabupaten', $data);
	}

	public function galeri()
	{
		$this->load->library('pagination');

		$search = $this->input->get('search', true);

		$config['base_url'] = base_url('home/galeri');
		$config['total_rows'] = $this->kegiatan_model->count_data($search);
		$config['per_page'] = 6;
		$config['reuse_query_string'] = TRUE;

		$this->pagination->initialize($config);

		$start = $this->uri->segment(3);
		$result['infokegiatans'] = $this->kegiatan_model->get_all_post($config['per_page'], $start, $search);
		$result['menugaleri'] = $this->all_model->display_records_menugaleri();
		$result['profillama'] = $this->all_model->get_profil();
		$result['kegiatan'] = $this->kegiatan_model->display_records();
		// 
		$result['galeri'] = $this->all_model->display_records_galeri();
		$result['profillama'] = $this->all_model->get_profil();
		$result['anggota'] =  $this->db->get_where('anggota', array('status' => 2))->result();
		$result['kabupaten'] = $this->all_model->tampil_data_kabupaten();


		$filterKabupatenId = $this->input->get('filterKabupatenId', true);
		$result['kuliner'] = $this->all_model->get_all_kuliner($filterKabupatenId);

		$filterKabupaten = $this->input->get('filterKabupaten');
		$kabupatenId = '';

		if ($filterKabupaten) {
			// Mendapatkan kabupaten_id berdasarkan nama kabupaten yang dipilih
			$kabupatenId = $this->all_model->get_kabupaten_id($filterKabupaten);
		}

		if ($kabupatenId) {
			$result['kuliner'] = $this->all_model->get_kuliner_by_kabupaten($kabupatenId, $config['per_page']);
			$config['total_rows'] = $this->all_model->count_kuliner_by_kabupaten($kabupatenId);
		} else {
			$result['kuliner'] = $this->all_model->display_records();
		}
		// $filterKabupatenId = $this->input->get('filterKabupatenId');
		$this->load->view('galeri', $result);
	}

	public function kegiatan()
	{
		$this->load->library('pagination');

		$search = $this->input->get('search', true);

		$config['base_url'] = base_url('home/kegiatan');
		$config['total_rows'] = $this->kegiatan_model->count_data($search);
		$config['per_page'] = 6;
		$config['reuse_query_string'] = TRUE;

		$this->pagination->initialize($config);

		$start = $this->uri->segment(3);
		$result['infokegiatans'] = $this->kegiatan_model->get_all_post($config['per_page'], $start, $search);
		$result['menugaleri'] = $this->all_model->display_records_menugaleri();
		$result['profillama'] = $this->all_model->get_profil();
		$result['kegiatan'] = $this->kegiatan_model->display_records();
		// 
		$result['galeri'] = $this->all_model->display_records_galeri();
		$result['profillama'] = $this->all_model->get_profil();
		$result['anggota'] =  $this->db->get_where('anggota', array('status' => 2))->result();
		$result['kabupaten'] = $this->all_model->tampil_data_kabupaten();


		$filterKabupatenId = $this->input->get('filterKabupatenId', true);
		$result['kuliner'] = $this->all_model->get_all_kuliner($filterKabupatenId);

		$filterKabupaten = $this->input->get('filterKabupaten');
		$kabupatenId = '';

		if ($filterKabupaten) {
			// Mendapatkan kabupaten_id berdasarkan nama kabupaten yang dipilih
			$kabupatenId = $this->all_model->get_kabupaten_id($filterKabupaten);
		}

		if ($kabupatenId) {
			$result['kuliner'] = $this->all_model->get_kuliner_by_kabupaten($kabupatenId, $config['per_page']);
			$config['total_rows'] = $this->all_model->count_kuliner_by_kabupaten($kabupatenId);
		} else {
			$result['kuliner'] = $this->all_model->display_records();
		}
		// $filterKabupatenId = $this->input->get('filterKabupatenId');
		$this->load->view('kegiatan', $result);
	}



	public function anggota()
	{
		$result['profillama'] = $this->all_model->get_profil();

		$this->load->view('anggota', $result);
	}

	public function daftaranggota()
	{
		$data['profillama'] = $this->all_model->get_profil();
		$data['kabupaten'] = $this->all_model->tampil_data_kabupaten();
		$kabupatenId = $this->input->get('kabupaten_id');
		$data['kuliner'] = $this->all_model->getKulinerByKabupaten($kabupatenId);
		$data['kabupaten'] = $this->all_model->getKabupaten();
		$this->load->view('daftar', $data);
	}
	public function simpandatadaftaranggota()
	{
		$this->form_validation->set_rules('nama_umkm', 'Nama UMKM', 'required|trim');
		$this->form_validation->set_rules('owner', 'Nama Owner', 'required|trim');
		$this->form_validation->set_rules('email_umkm', 'Email UMKM', 'required|trim');
		$this->form_validation->set_rules('alamat_umkm', 'Alamat UMKM', 'required|trim');
		$this->form_validation->set_rules('nowa', 'No Wa UMKM', 'required|trim');
		$this->form_validation->set_rules('username_ig', 'Instagram UMKM', 'required|trim');
		$this->form_validation->set_rules('kabupaten_id', 'Kabupaten', 'required|trim');
		$this->form_validation->set_rules('kategori', 'Pilih Kategori', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['profillama'] = $this->all_model->get_profil();
			$this->load->view('daftar', $data);
		} else {
			$config['upload_path']   = getcwd() . '/fotoanggota/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']      = 5024;
			$config['encrypt_name']  = true;
			$this->load->library('upload', $config);

			// Upload Logo UMKM
			if ($this->upload->do_upload('logo_umkm')) {
				$upload_data = $this->upload->data();
				$logo_umkm = $upload_data['file_name'];

				// Upload List Menu
				if ($this->upload->do_upload('list_menu')) {
					$upload_data = $this->upload->data();
					$list_menu = $upload_data['file_name'];

					// Upload Halal Produk
					if ($this->upload->do_upload('halal_produk')) {
						$upload_data = $this->upload->data();
						$halal_produk = $upload_data['file_name'];

						// Upload Tempat dalam UMKM
						if ($this->upload->do_upload('tempat_dalam_umkm')) {
							$upload_data = $this->upload->data();
							$tempat_dalam_umkm = $upload_data['file_name'];

							// Data yang akan disimpan
							$data = array(
								'user_id' => 21,
								'status' => 0,
								'nama_umkm'         => $this->input->post('nama_umkm'),
								'owner'             => $this->input->post('owner'),
								'email_umkm'        => $this->input->post('email_umkm'),
								'alamat_umkm'       => $this->input->post('alamat_umkm'),
								'nowa'              => $this->input->post('nowa'),
								'username_ig'       => $this->input->post('username_ig'),
								'kabupaten_id'      => $this->input->post('kabupaten_id'),
								'kategori'          => $this->input->post('kategori'),
								'logo_umkm'         => $logo_umkm,
								'list_menu'         => $list_menu,
								'halal_produk'      => $halal_produk,
								'tempat_dalam_umkm' => $tempat_dalam_umkm,
							);

							// Simpan data ke database
							if ($this->db->insert('anggota', $data)) {
								setMsg("success", "Berhasil Daftar!");
								redirect(base_url('home/daftaranggota'));
							} else {
								$query = $this->db->last_query();
								$error_message = "Gagal menyimpan data. Query: " . $query;
								setMsg("danger", $error_message);
								redirect(base_url('home/daftaranggota'));
							}
						} else {
							$query = $this->db->last_query();
							$error_message = "Gagal mengupload Tempat dalam UMKM: " . $this->upload->display_errors();
							setMsg("danger", $error_message);
							redirect(base_url('home/daftaranggota'));
						}
					} else {
						$query = $this->db->last_query();
						$error_message = "Gagal mengupload Halal Produk: " . $this->upload->display_errors();
						setMsg("danger", $error_message);
						redirect(base_url('home/daftaranggota'));
					}
				} else {
					$query = $this->db->last_query();
					$error_message = "Gagal mengupload List Menu: " . $this->upload->display_errors();
					setMsg("danger", $error_message);
					redirect(base_url('home/daftaranggota'));
				}
			} else {
				$query = $this->db->last_query();
				$error_message = "Gagal mengupload Logo UMKM: " . $this->upload->display_errors();
				setMsg("danger", $error_message);
				redirect(base_url('home/daftaranggota'));
			}
		}
	}



	public function login()
	{
		$result['profillama'] = $this->all_model->get_profil();
		if (userdata()) redirect('home');

		$data['title'] = "Sign In";

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['profillama'] = $this->all_model->get_profil();
			$this->load->view('login', $data);
		} else {
			$data['profillama'] = $this->all_model->get_profil();

			$input = $this->input->post(null, true);
			$user = $input['username'];
			$pass = $input['password'];

			$getUser = $this->db->get_where('user', ['username' => $user])->row_array();
			if ($getUser) {
				if ($getUser['is_active'] == 1) {
					if (password_verify($pass, $getUser['password'])) {
						$this->session->set_userdata('user_session', $getUser['user_id']);
						if ($getUser['level'] == 1) {
							redirect('home');
						} else {
							redirect('home');
						}
					} else {
						setMsg("danger", "Wrong Password!");
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
					redirect('login ');
				}
			} else {
				setMsg("danger", "Username not registered");
			}
			$data['profillama'] = $this->all_model->get_profil();
			$this->load->view('login', $data);
		}
	}

	public function loginadmin()
	{
		$result['profillama'] = $this->all_model->get_profil();
		if (userdata()) redirect('home');

		$data['title'] = "Sign In";

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['profillama'] = $this->all_model->get_profil();
			$this->load->view('login_admin', $data);
		} else {
			$data['profillama'] = $this->all_model->get_profil();

			$input = $this->input->post(null, true);
			$user = $input['username'];
			$pass = $input['password'];

			$getUser = $this->all_model->get_where('anggota', ['username_anggota' => $user]);
			if ($getUser) {
				if (password_verify($pass, $getUser->password_anggota)) {
					$this->session->set_userdata('user_session', $getUser->anggota_id);
					if ($getUser->role == "member") {
						redirect('post');
					} else {
						$data['profillama'] = $this->all_model->get_profil();
						$this->load->view('login_admin', $data);
					}
				} else {
					setMsg("danger", "Wrong Password!");
				}
			} else {
				setMsg("danger", "Username not registered");
			}
			$data['profillama'] = $this->all_model->get_profil();
			$this->load->view('login_admin', $data);
		}
	}

	public function akunadmin()
	{
		$result['profillama'] = $this->all_model->get_profil();
		$this->load->view('akunadmin', $result);
	}

	public function akunanggota()
	{
		$result['profillama'] = $this->all_model->get_profil();
		$this->load->view('akunanggota', $result);
	}

	public function daftarakun()
	{
		$result['profillama'] = $this->all_model->get_profil();
		$this->load->view('daftarakun', $result);
	}
	public function registration()
	{
		$this->form_validation->set_rules('nama_lengkap', 'Name', 'required|trim');
		$this->form_validation->set_rules('dpc', 'dpc', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'This email has already been registered!'
		]);
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
			'is_unique' => 'This username has already been taken!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
			'min_length' => 'Password too short!'
		]);

		if ($this->form_validation->run() == false) {
			$result['profillama'] = $this->all_model->get_profil();
			$this->load->view('daftarakun', $result);
		} else {
			$data = [
				'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'dpc' => htmlspecialchars($this->input->post('dpc', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'level' => 1,
				'is_active' => 1, // Set 'is_active' to 1 to indicate an active account
				'date_created' => time()
			];

			$user_id = $this->All_model->insert_user($data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulations! Your account has been created and activated.</div>');
			redirect('login');
		}
	}

	private function _sendEmail($token, $type, $email)
	{
		// Load email library (already loaded in the constructor)
		// $this->load->library('email');

		$this->email->clear();

		// Your email configuration remains unchanged

		if ($type == 'verify') {
			// Use $this->email instead of $mail
			$this->email->subject('Account Verification');
			$this->email->message('Click this link to verify your account : <a href="' . base_url() . 'home/verify?email=' . $email . '&token=' . urlencode($token) . '">Activate</a>');
		} else if ($type == 'forgot') {
			// Use $this->email instead of $mail
			$this->email->subject('Reset Password');
			$this->email->message('Click this link to reset your password : <a href="' . base_url() . 'home/resetpassword?email=' . $email . '&token=' . urlencode($token) . '">Reset Password</a>');
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger(); // Print any email sending errors for debugging
			return false;
		}
	}


	public function lupa_password()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == false) {
			$result['profillama'] = $this->all_model->get_profil();
			$this->load->view('lupa_password', $result);
		} else {
			$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
			$user = $this->All_model->get_user_by_email($email);

			if ($user) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->All_model->insert_user_token($user_token);
				$this->_sendEmail($token, 'forgot', $email);

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please check your email to reset your password!</div>');
				redirect('home/lupa_password');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered or activated!</div>');
				redirect('home/lupa_password');
			}
		}
	}
	public function resetPassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->All_model->get_user_by_email($email);

		if ($user) {
			$user_token = $this->All_model->get_user_token($email, $token);

			if ($user_token) {
				// Check if token has expired (e.g., within 24 hours)
				if (time() - $user_token['date_created'] < 86400) {
					$this->session->set_userdata('reset_email', $email);
					$this->changePassword();
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Token has expired.</div>');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
			redirect('login');
		}
	}

	public function changePassword()
	{
		if (!$this->session->userdata('reset_email')) {
			redirect('login');
		}

		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

		if ($this->form_validation->run() == false) {
			$result['profillama'] = $this->all_model->get_profil();
			$this->load->view('changePassword', $result);
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->unset_userdata('reset_email');

			$this->db->delete('user_token', ['email' => $email]);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed! Please login.</div>');
			redirect('login');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('user_session');
		redirect('home');
	}

	public function banyuasin()
	{
		$data['banyuasin'] = $this->all_model->get_all_kabupaten();
		$data['galeri'] = $this->all_model->display_records_galeri();
		$data['profillama'] = $this->all_model->get_profil();
		$data['anggota'] =  $this->db->get_where('anggota', array('status' => 2))->result();
		$data['kabupaten'] = $this->all_model->tampil_data_kabupaten();
		$data['profillama'] = $this->all_model->get_profil();


		$filterKabupatenId = $this->input->get('filterKabupatenId', true);
		$data['kuliner'] = $this->all_model->get_all_kuliner($filterKabupatenId);

		$filterKabupaten = $this->input->get('filterKabupaten');
		$kabupatenId = '';

		if ($filterKabupaten) {
			// Mendapatkan kabupaten_id berdasarkan nama kabupaten yang dipilih
			$kabupatenId = $this->all_model->get_kabupaten_id($filterKabupaten);
		}

		if ($kabupatenId) {
			$data['kuliner'] = $this->all_model->get_kuliner_by_kabupaten($kabupatenId, $config['per_page']);
			$config['total_rows'] = $this->all_model->count_kuliner_by_kabupaten($kabupatenId);
		} else {
			$data['kuliner'] = $this->all_model->display_records();
		}
		// var_dump($data);
		$this->load->view('kabupaten/banyuasin', $data);
	}

	public function empatlawang()
	{
		$data['banyuasin'] = $this->all_model->get_all_kabupaten();
		$data['galeri'] = $this->all_model->display_records_galeri();
		$data['profillama'] = $this->all_model->get_profil();
		$data['anggota'] =  $this->db->get_where('anggota', array('status' => 2))->result();
		$data['kabupaten'] = $this->all_model->tampil_data_kabupaten();
		$data['profillama'] = $this->all_model->get_profil();


		$filterKabupatenId = $this->input->get('filterKabupatenId', true);
		$data['kuliner'] = $this->all_model->get_all_kuliner($filterKabupatenId);

		$filterKabupaten = $this->input->get('filterKabupaten');
		$kabupatenId = '';

		if ($filterKabupaten) {
			// Mendapatkan kabupaten_id berdasarkan nama kabupaten yang dipilih
			$kabupatenId = $this->all_model->get_kabupaten_id($filterKabupaten);
		}

		if ($kabupatenId) {
			$data['kuliner'] = $this->all_model->get_kuliner_by_kabupaten($kabupatenId, $config['per_page']);
			$config['total_rows'] = $this->all_model->count_kuliner_by_kabupaten($kabupatenId);
		} else {
			$data['kuliner'] = $this->all_model->display_records();
		}
		// var_dump($data);
		$this->load->view('kabupaten/empatlawang', $data);
	}

	public function lahat()
	{
		$data['banyuasin'] = $this->all_model->get_all_kabupaten();
		$data['galeri'] = $this->all_model->display_records_galeri();
		$data['profillama'] = $this->all_model->get_profil();
		$data['anggota'] =  $this->db->get_where('anggota', array('status' => 2))->result();
		$data['kabupaten'] = $this->all_model->tampil_data_kabupaten();
		$data['profillama'] = $this->all_model->get_profil();


		$filterKabupatenId = $this->input->get('filterKabupatenId', true);
		$data['kuliner'] = $this->all_model->get_all_kuliner($filterKabupatenId);

		$filterKabupaten = $this->input->get('filterKabupaten');
		$kabupatenId = '';

		if ($filterKabupaten) {
			// Mendapatkan kabupaten_id berdasarkan nama kabupaten yang dipilih
			$kabupatenId = $this->all_model->get_kabupaten_id($filterKabupaten);
		}

		if ($kabupatenId) {
			$data['kuliner'] = $this->all_model->get_kuliner_by_kabupaten($kabupatenId, $config['per_page']);
			$config['total_rows'] = $this->all_model->count_kuliner_by_kabupaten($kabupatenId);
		} else {
			$data['kuliner'] = $this->all_model->display_records();
		}
		// var_dump($data);
		$this->load->view('kabupaten/lahat', $data);
	}

	public function muaraenim()
	{
		$data['banyuasin'] = $this->all_model->get_all_kabupaten();
		$data['galeri'] = $this->all_model->display_records_galeri();
		$data['profillama'] = $this->all_model->get_profil();
		$data['anggota'] =  $this->db->get_where('anggota', array('status' => 2))->result();
		$data['kabupaten'] = $this->all_model->tampil_data_kabupaten();
		$data['profillama'] = $this->all_model->get_profil();


		$filterKabupatenId = $this->input->get('filterKabupatenId', true);
		$data['kuliner'] = $this->all_model->get_all_kuliner($filterKabupatenId);

		$filterKabupaten = $this->input->get('filterKabupaten');
		$kabupatenId = '';

		if ($filterKabupaten) {
			// Mendapatkan kabupaten_id berdasarkan nama kabupaten yang dipilih
			$kabupatenId = $this->all_model->get_kabupaten_id($filterKabupaten);
		}

		if ($kabupatenId) {
			$data['kuliner'] = $this->all_model->get_kuliner_by_kabupaten($kabupatenId, $config['per_page']);
			$config['total_rows'] = $this->all_model->count_kuliner_by_kabupaten($kabupatenId);
		} else {
			$data['kuliner'] = $this->all_model->display_records();
		}
		// var_dump($data);
		$this->load->view('kabupaten/muaraenim', $data);
	}

	public function musibanyuasin()
	{
		$data['banyuasin'] = $this->all_model->get_all_kabupaten();
		$data['galeri'] = $this->all_model->display_records_galeri();
		$data['profillama'] = $this->all_model->get_profil();
		$data['anggota'] =  $this->db->get_where('anggota', array('status' => 2))->result();
		$data['kabupaten'] = $this->all_model->tampil_data_kabupaten();
		$data['profillama'] = $this->all_model->get_profil();


		$filterKabupatenId = $this->input->get('filterKabupatenId', true);
		$data['kuliner'] = $this->all_model->get_all_kuliner($filterKabupatenId);

		$filterKabupaten = $this->input->get('filterKabupaten');
		$kabupatenId = '';

		if ($filterKabupaten) {
			// Mendapatkan kabupaten_id berdasarkan nama kabupaten yang dipilih
			$kabupatenId = $this->all_model->get_kabupaten_id($filterKabupaten);
		}

		if ($kabupatenId) {
			$data['kuliner'] = $this->all_model->get_kuliner_by_kabupaten($kabupatenId, $config['per_page']);
			$config['total_rows'] = $this->all_model->count_kuliner_by_kabupaten($kabupatenId);
		} else {
			$data['kuliner'] = $this->all_model->display_records();
		}
		// var_dump($data);
		$this->load->view('kabupaten/musibanyuasin', $data);
	}

	public function musirawas()
	{
		$data['banyuasin'] = $this->all_model->get_all_kabupaten();
		$data['galeri'] = $this->all_model->display_records_galeri();
		$data['profillama'] = $this->all_model->get_profil();
		$data['anggota'] =  $this->db->get_where('anggota', array('status' => 2))->result();
		$data['kabupaten'] = $this->all_model->tampil_data_kabupaten();
		$data['profillama'] = $this->all_model->get_profil();


		$filterKabupatenId = $this->input->get('filterKabupatenId', true);
		$data['kuliner'] = $this->all_model->get_all_kuliner($filterKabupatenId);

		$filterKabupaten = $this->input->get('filterKabupaten');
		$kabupatenId = '';

		if ($filterKabupaten) {
			// Mendapatkan kabupaten_id berdasarkan nama kabupaten yang dipilih
			$kabupatenId = $this->all_model->get_kabupaten_id($filterKabupaten);
		}

		if ($kabupatenId) {
			$data['kuliner'] = $this->all_model->get_kuliner_by_kabupaten($kabupatenId, $config['per_page']);
			$config['total_rows'] = $this->all_model->count_kuliner_by_kabupaten($kabupatenId);
		} else {
			$data['kuliner'] = $this->all_model->display_records();
		}
		// var_dump($data);
		$this->load->view('kabupaten/musirawas', $data);
	}

	public function musirawasutara()
	{
		$data['banyuasin'] = $this->all_model->get_all_kabupaten();
		$data['galeri'] = $this->all_model->display_records_galeri();
		$data['profillama'] = $this->all_model->get_profil();
		$data['anggota'] =  $this->db->get_where('anggota', array('status' => 2))->result();
		$data['kabupaten'] = $this->all_model->tampil_data_kabupaten();
		$data['profillama'] = $this->all_model->get_profil();


		$filterKabupatenId = $this->input->get('filterKabupatenId', true);
		$data['kuliner'] = $this->all_model->get_all_kuliner($filterKabupatenId);

		$filterKabupaten = $this->input->get('filterKabupaten');
		$kabupatenId = '';

		if ($filterKabupaten) {
			// Mendapatkan kabupaten_id berdasarkan nama kabupaten yang dipilih
			$kabupatenId = $this->all_model->get_kabupaten_id($filterKabupaten);
		}

		if ($kabupatenId) {
			$data['kuliner'] = $this->all_model->get_kuliner_by_kabupaten($kabupatenId, $config['per_page']);
			$config['total_rows'] = $this->all_model->count_kuliner_by_kabupaten($kabupatenId);
		} else {
			$data['kuliner'] = $this->all_model->display_records();
		}
		// var_dump($data);
		$this->load->view('kabupaten/musirawasutara', $data);
	}

	public function oganilir()
	{
		$data['banyuasin'] = $this->all_model->get_all_kabupaten();
		$data['galeri'] = $this->all_model->display_records_galeri();
		$data['profillama'] = $this->all_model->get_profil();
		$data['anggota'] =  $this->db->get_where('anggota', array('status' => 2))->result();
		$data['kabupaten'] = $this->all_model->tampil_data_kabupaten();
		$data['profillama'] = $this->all_model->get_profil();


		$filterKabupatenId = $this->input->get('filterKabupatenId', true);
		$data['kuliner'] = $this->all_model->get_all_kuliner($filterKabupatenId);

		$filterKabupaten = $this->input->get('filterKabupaten');
		$kabupatenId = '';

		if ($filterKabupaten) {
			// Mendapatkan kabupaten_id berdasarkan nama kabupaten yang dipilih
			$kabupatenId = $this->all_model->get_kabupaten_id($filterKabupaten);
		}

		if ($kabupatenId) {
			$data['kuliner'] = $this->all_model->get_kuliner_by_kabupaten($kabupatenId, $config['per_page']);
			$config['total_rows'] = $this->all_model->count_kuliner_by_kabupaten($kabupatenId);
		} else {
			$data['kuliner'] = $this->all_model->display_records();
		}
		// var_dump($data);
		$this->load->view('kabupaten/oganilir', $data);
	}
	public function ogankomeringilir()
	{
		$data['banyuasin'] = $this->all_model->get_all_kabupaten();
		$data['galeri'] = $this->all_model->display_records_galeri();
		$data['profillama'] = $this->all_model->get_profil();
		$data['anggota'] =  $this->db->get_where('anggota', array('status' => 2))->result();
		$data['kabupaten'] = $this->all_model->tampil_data_kabupaten();
		$data['profillama'] = $this->all_model->get_profil();


		$filterKabupatenId = $this->input->get('filterKabupatenId', true);
		$data['kuliner'] = $this->all_model->get_all_kuliner($filterKabupatenId);

		$filterKabupaten = $this->input->get('filterKabupaten');
		$kabupatenId = '';

		if ($filterKabupaten) {
			// Mendapatkan kabupaten_id berdasarkan nama kabupaten yang dipilih
			$kabupatenId = $this->all_model->get_kabupaten_id($filterKabupaten);
		}

		if ($kabupatenId) {
			$data['kuliner'] = $this->all_model->get_kuliner_by_kabupaten($kabupatenId, $config['per_page']);
			$config['total_rows'] = $this->all_model->count_kuliner_by_kabupaten($kabupatenId);
		} else {
			$data['kuliner'] = $this->all_model->display_records();
		}
		// var_dump($data);
		$this->load->view('kabupaten/ogankomeringilir', $data);
	}

	public function ogankomeringulu()
	{
		$data['banyuasin'] = $this->all_model->get_all_kabupaten();
		$data['galeri'] = $this->all_model->display_records_galeri();
		$data['profillama'] = $this->all_model->get_profil();
		$data['anggota'] =  $this->db->get_where('anggota', array('status' => 2))->result();
		$data['kabupaten'] = $this->all_model->tampil_data_kabupaten();
		$data['profillama'] = $this->all_model->get_profil();


		$filterKabupatenId = $this->input->get('filterKabupatenId', true);
		$data['kuliner'] = $this->all_model->get_all_kuliner($filterKabupatenId);

		$filterKabupaten = $this->input->get('filterKabupaten');
		$kabupatenId = '';

		if ($filterKabupaten) {
			// Mendapatkan kabupaten_id berdasarkan nama kabupaten yang dipilih
			$kabupatenId = $this->all_model->get_kabupaten_id($filterKabupaten);
		}

		if ($kabupatenId) {
			$data['kuliner'] = $this->all_model->get_kuliner_by_kabupaten($kabupatenId, $config['per_page']);
			$config['total_rows'] = $this->all_model->count_kuliner_by_kabupaten($kabupatenId);
		} else {
			$data['kuliner'] = $this->all_model->display_records();
		}
		// var_dump($data);
		$this->load->view('kabupaten/ogankomeringulu', $data);
	}

	public function ogankomeringuluselatan()
	{
		$data['banyuasin'] = $this->all_model->get_all_kabupaten();
		$data['galeri'] = $this->all_model->display_records_galeri();
		$data['profillama'] = $this->all_model->get_profil();
		$data['anggota'] =  $this->db->get_where('anggota', array('status' => 2))->result();
		$data['kabupaten'] = $this->all_model->tampil_data_kabupaten();
		$data['profillama'] = $this->all_model->get_profil();


		$filterKabupatenId = $this->input->get('filterKabupatenId', true);
		$data['kuliner'] = $this->all_model->get_all_kuliner($filterKabupatenId);

		$filterKabupaten = $this->input->get('filterKabupaten');
		$kabupatenId = '';

		if ($filterKabupaten) {
			// Mendapatkan kabupaten_id berdasarkan nama kabupaten yang dipilih
			$kabupatenId = $this->all_model->get_kabupaten_id($filterKabupaten);
		}

		if ($kabupatenId) {
			$data['kuliner'] = $this->all_model->get_kuliner_by_kabupaten($kabupatenId, $config['per_page']);
			$config['total_rows'] = $this->all_model->count_kuliner_by_kabupaten($kabupatenId);
		} else {
			$data['kuliner'] = $this->all_model->display_records();
		}
		// var_dump($data);
		$this->load->view('kabupaten/ogankomeringuluselatan', $data);
	}

	public function ogankomeringulutimur()
	{
		$data['banyuasin'] = $this->all_model->get_all_kabupaten();
		$data['galeri'] = $this->all_model->display_records_galeri();
		$data['profillama'] = $this->all_model->get_profil();
		$data['anggota'] =  $this->db->get_where('anggota', array('status' => 2))->result();
		$data['kabupaten'] = $this->all_model->tampil_data_kabupaten();
		$data['profillama'] = $this->all_model->get_profil();


		$filterKabupatenId = $this->input->get('filterKabupatenId', true);
		$data['kuliner'] = $this->all_model->get_all_kuliner($filterKabupatenId);

		$filterKabupaten = $this->input->get('filterKabupaten');
		$kabupatenId = '';

		if ($filterKabupaten) {
			// Mendapatkan kabupaten_id berdasarkan nama kabupaten yang dipilih
			$kabupatenId = $this->all_model->get_kabupaten_id($filterKabupaten);
		}

		if ($kabupatenId) {
			$data['kuliner'] = $this->all_model->get_kuliner_by_kabupaten($kabupatenId, $config['per_page']);
			$config['total_rows'] = $this->all_model->count_kuliner_by_kabupaten($kabupatenId);
		} else {
			$data['kuliner'] = $this->all_model->display_records();
		}
		// var_dump($data);
		$this->load->view('kabupaten/ogankomeringulutimur', $data);
	}
	public function penukalabablematangilir()
	{
		$data['banyuasin'] = $this->all_model->get_all_kabupaten();
		$data['galeri'] = $this->all_model->display_records_galeri();
		$data['profillama'] = $this->all_model->get_profil();
		$data['anggota'] =  $this->db->get_where('anggota', array('status' => 2))->result();
		$data['kabupaten'] = $this->all_model->tampil_data_kabupaten();
		$data['profillama'] = $this->all_model->get_profil();


		$filterKabupatenId = $this->input->get('filterKabupatenId', true);
		$data['kuliner'] = $this->all_model->get_all_kuliner($filterKabupatenId);

		$filterKabupaten = $this->input->get('filterKabupaten');
		$kabupatenId = '';

		if ($filterKabupaten) {
			// Mendapatkan kabupaten_id berdasarkan nama kabupaten yang dipilih
			$kabupatenId = $this->all_model->get_kabupaten_id($filterKabupaten);
		}

		if ($kabupatenId) {
			$data['kuliner'] = $this->all_model->get_kuliner_by_kabupaten($kabupatenId, $config['per_page']);
			$config['total_rows'] = $this->all_model->count_kuliner_by_kabupaten($kabupatenId);
		} else {
			$data['kuliner'] = $this->all_model->display_records();
		}
		// var_dump($data);
		$this->load->view('kabupaten/penukalabablematangilir', $data);
	}

	public function lubuklinggau()
	{
		$data['banyuasin'] = $this->all_model->get_all_kabupaten();
		$data['galeri'] = $this->all_model->display_records_galeri();
		$data['profillama'] = $this->all_model->get_profil();
		$data['anggota'] =  $this->db->get_where('anggota', array('status' => 2))->result();
		$data['kabupaten'] = $this->all_model->tampil_data_kabupaten();
		$data['profillama'] = $this->all_model->get_profil();


		$filterKabupatenId = $this->input->get('filterKabupatenId', true);
		$data['kuliner'] = $this->all_model->get_all_kuliner($filterKabupatenId);

		$filterKabupaten = $this->input->get('filterKabupaten');
		$kabupatenId = '';

		if ($filterKabupaten) {
			// Mendapatkan kabupaten_id berdasarkan nama kabupaten yang dipilih
			$kabupatenId = $this->all_model->get_kabupaten_id($filterKabupaten);
		}

		if ($kabupatenId) {
			$data['kuliner'] = $this->all_model->get_kuliner_by_kabupaten($kabupatenId, $config['per_page']);
			$config['total_rows'] = $this->all_model->count_kuliner_by_kabupaten($kabupatenId);
		} else {
			$data['kuliner'] = $this->all_model->display_records();
		}
		// var_dump($data);
		$this->load->view('kabupaten/lubuklinggau', $data);
	}

	public function pagaralam()
	{
		$data['banyuasin'] = $this->all_model->get_all_kabupaten();
		$data['galeri'] = $this->all_model->display_records_galeri();
		$data['profillama'] = $this->all_model->get_profil();
		$data['anggota'] =  $this->db->get_where('anggota', array('status' => 2))->result();
		$data['kabupaten'] = $this->all_model->tampil_data_kabupaten();
		$data['profillama'] = $this->all_model->get_profil();


		$filterKabupatenId = $this->input->get('filterKabupatenId', true);
		$data['kuliner'] = $this->all_model->get_all_kuliner($filterKabupatenId);

		$filterKabupaten = $this->input->get('filterKabupaten');
		$kabupatenId = '';

		if ($filterKabupaten) {
			// Mendapatkan kabupaten_id berdasarkan nama kabupaten yang dipilih
			$kabupatenId = $this->all_model->get_kabupaten_id($filterKabupaten);
		}

		if ($kabupatenId) {
			$data['kuliner'] = $this->all_model->get_kuliner_by_kabupaten($kabupatenId, $config['per_page']);
			$config['total_rows'] = $this->all_model->count_kuliner_by_kabupaten($kabupatenId);
		} else {
			$data['kuliner'] = $this->all_model->display_records();
		}
		// var_dump($data);
		$this->load->view('kabupaten/pagaralam', $data);
	}

	public function palembang()
	{
		$data['banyuasin'] = $this->all_model->get_all_kabupaten();
		$data['galeri'] = $this->all_model->display_records_galeri();
		$data['profillama'] = $this->all_model->get_profil();
		$data['anggota'] =  $this->db->get_where('anggota', array('status' => 2))->result();
		$data['kabupaten'] = $this->all_model->tampil_data_kabupaten();
		$data['profillama'] = $this->all_model->get_profil();


		$filterKabupatenId = $this->input->get('filterKabupatenId', true);
		$data['kuliner'] = $this->all_model->get_all_kuliner($filterKabupatenId);

		$filterKabupaten = $this->input->get('filterKabupaten');
		$kabupatenId = '';

		if ($filterKabupaten) {
			// Mendapatkan kabupaten_id berdasarkan nama kabupaten yang dipilih
			$kabupatenId = $this->all_model->get_kabupaten_id($filterKabupaten);
		}

		if ($kabupatenId) {
			$data['kuliner'] = $this->all_model->get_kuliner_by_kabupaten($kabupatenId, $config['per_page']);
			$config['total_rows'] = $this->all_model->count_kuliner_by_kabupaten($kabupatenId);
		} else {
			$data['kuliner'] = $this->all_model->display_records();
		}
		// var_dump($data);
		$this->load->view('kabupaten/palembang', $data);
	}

	public function prabumulih()
	{
		$data['banyuasin'] = $this->all_model->get_all_kabupaten();
		$data['galeri'] = $this->all_model->display_records_galeri();
		$data['profillama'] = $this->all_model->get_profil();
		$data['anggota'] =  $this->db->get_where('anggota', array('status' => 2))->result();
		$data['kabupaten'] = $this->all_model->tampil_data_kabupaten();
		$data['profillama'] = $this->all_model->get_profil();


		$filterKabupatenId = $this->input->get('filterKabupatenId', true);
		$data['kuliner'] = $this->all_model->get_all_kuliner($filterKabupatenId);

		$filterKabupaten = $this->input->get('filterKabupaten');
		$kabupatenId = '';

		if ($filterKabupaten) {
			// Mendapatkan kabupaten_id berdasarkan nama kabupaten yang dipilih
			$kabupatenId = $this->all_model->get_kabupaten_id($filterKabupaten);
		}

		if ($kabupatenId) {
			$data['kuliner'] = $this->all_model->get_kuliner_by_kabupaten($kabupatenId, $config['per_page']);
			$config['total_rows'] = $this->all_model->count_kuliner_by_kabupaten($kabupatenId);
		} else {
			$data['kuliner'] = $this->all_model->display_records();
		}
		// var_dump($data);
		$this->load->view('kabupaten/prabumulih', $data);
	}
}
