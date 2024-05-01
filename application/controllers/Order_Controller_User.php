<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_Controller_User extends CI_Controller {

    public function index() {
        if (!$this->session->userdata('logged_in')) {
            redirect('Order_Controller_User');
        }
        $data['username'] = $this->session->userdata('username');
        $this->load->model('User_Model');
        $this->load->view('Order_View_User');
    }
    public function insert_order() {
        $this->load->model('User_Model');
        $nama_barang = $this->input->post('nama_barang');
        $jumlah = $this->input->post('jumlah');
        $nama_customer = $this->input->post('nama_customer');
        $tgl_order = $this->input->post('tgl_order');
        $ordering = $this->input->post('ordering');
        $tgl_closing = $this->input->post('tgl_closing');

        $data = array(
            'nama_barang' => $nama_barang,
            'jumlah' => $jumlah,
            'nama_customer' => $nama_customer,
            'tgl_order' => $tgl_order,
            'ordering' => $ordering,
            'tgl_closing' => $tgl_closing
        );
        
        $this->User_Model->insert_data($data);
        redirect('User_Controller');
    }
    public function pindah($page = '') {
        switch ($page) {
            case 'user':
                redirect('User_Controller');
                break;
            case 'order':
                    redirect('Order_Controller_User');
                    break;
        }
    }

}