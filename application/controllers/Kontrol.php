<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontrol extends CI_Controller {

    public function index() {
        if (!$this->session->userdata('logged_in')) {
            redirect('Kontrol');
        }
        $data['username'] = $this->session->userdata('username');
        $this->load->model('User_Model');
        $data['orders'] = $this->User_Model->get_data_order_kontrol();

        $this->load->view('utama', $data);
    }

    public function update_order_status() {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
    
        // Panggil model untuk melakukan update status
        $this->load->model('User_Model');
        $this->User_Model->update_order_status($id, $status);
    
        // Kirim respons JSON untuk menampilkan pesan status
        $response = $status;
        echo json_encode($response);
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        redirect('Login_Controller');
    }

    public function pindah($page = '') {
        switch ($page) {
            case 'register':
                redirect('register');
                break;
            case 'home':
                redirect('Kontrol');
                break;
                
            case 'order':
                redirect('Order_Controller_Admin');
                break;
        }
    }

    public function search_kontrol() {
        if (!$this->session->userdata('logged_in')) {
            redirect('Kontrol');
        }
        // Tangkap data pencarian dari form
        $keyword = $this->input->get('q');
        $this->load->model('User_Model');

        // Panggil method pencarian dari model
        $orders = $this->User_Model->search_data_order_kontrol($keyword);
        $data['username'] = $this->session->userdata('username');

        // Kirim hasil pencarian ke view
        $data['orders'] = $orders;
        $this->load->view('utama', $data);
    }

    public function register_user() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
    
        // Memanggil model untuk menyimpan pengguna ke database
        $this->User_Model->insert_user($username, $password);
    
        // Redirect atau lakukan tindakan lain setelah pendaftaran berhasil
    }
    
    
    
}