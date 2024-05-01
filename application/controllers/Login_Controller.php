<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_Model');
    }

    public function index() {
        // Jika sudah login, arahkan ke halaman utama
        if ($this->session->userdata('logged_in')) {
            redirect('Kontrol');
        }

        // Validasi form
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Tampilkan halaman login
            $this->load->view('login_form');
        } else {
            // Proses login
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->load->model('User_Model');
            $login_result = $this->User_Model->login($username, $password);
            if ($this->User_Model->login($username, $password)) {
                // Jika login berhasil, set session dan arahkan ke halaman utama
                $user_type = $login_result['user_type'];
                $this->session->set_userdata('logged_in', TRUE);
                $this->session->set_userdata('username', $username);
                if ($user_type == 'admin') {
                    // Jika admin, arahkan ke controller Kontrol
                    redirect('Kontrol');
                } elseif ($user_type == 'user') {
                    // Jika user, arahkan ke controller User
                    redirect('User_Controller');
                }
            } else {
                // Jika login gagal, tampilkan pesan error
                $this->session->set_flashdata('message', 'Username or password is incorrect');
                redirect('Login_Controller');
            }
        }
    }

}
