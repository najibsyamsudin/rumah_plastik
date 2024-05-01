<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Controller extends CI_Controller {

    public function index() {
        if (!$this->session->userdata('logged_in')) {
            redirect('User');
        }
        $data['username'] = $this->session->userdata('username');
        $this->load->model('User_Model');
        $data['orders'] = $this->User_Model->get_data_order_user();

        $this->load->view('user', $data);
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        redirect('Login_Controller');
    }

    public function pindah($page = '') {
        switch ($page) {
            case 'user':
                redirect('User');
                break;
            case 'order':
                    redirect('Order_Controller_User');
                    break;
        }
    }

    public function search_user() {
        if (!$this->session->userdata('logged_in')) {
            redirect('User');
        }
        // Tangkap data pencarian dari form
        $keyword = $this->input->get('q');

        $this->load->model('User_Model');
        // Panggil method pencarian dari model
        $orders = $this->User_Model->search_data_order_user($keyword);
        $data['username'] = $this->session->userdata('username');

        // Kirim hasil pencarian ke view
        $data['orders'] = $orders;
        $this->load->view('user', $data);
    }
    
}