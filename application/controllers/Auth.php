<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        if (userdata()) redirect('dashboard');

        $data['title'] = "Sign In";

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/sign-in', $data);
        } else {
            $input = $this->input->post(null, true);
            $user = $input['username'];
            $pass = $input['password'];

            $getUser = $this->main->get_where('users', ['username' => $user]);
            if ($getUser) {
                if (password_verify($pass, $getUser->password)) {
                    $this->session->set_userdata('user_session', $getUser->user_id);
                    if ($getUser->role == "member") {
                        redirect('post');
                    } else {
                        redirect('dashboard');
                    }
                } else {
                    setMsg("danger", "Wrong Password!");
                }
            } else {
                setMsg("danger", "Username not registered");
            }
            redirect("signin");
        }
    }
    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'WPU User Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
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

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please activate your account</div>');
            redirect('auth');
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

        $this->email->from('dikkyrahmads@gmail.com', 'Admin');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
    public function signup()
    {
        if (userdata()) redirect('dashboard');

        $data['title'] = "Sign Up";

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/sign-up', $data);
        } else {
            $input = $this->input->post(null, true);

            unset($input['password2']);
            $input['password'] = password_hash($input['password'], PASSWORD_DEFAULT);
            $input['role'] = 'member';

            $this->main->insert('users', $input);
            setMsg('success', 'Sign up success, now you can sign in.');
            redirect('signin');
        }
    }

    public function signout()
    {
        $this->session->unset_userdata('user_session');
        redirect('signin');
    }
}
