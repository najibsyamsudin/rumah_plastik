<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model {
    public function get_data_order_kontrol() {
        return $this->db->get('data_order')->result_array();
    }

    public function get_data_order_user() {
        return $this->db->get('data_order')->result_array();
    }

    public function get_data_order_order() {
        return $this->db->get('data_order')->result_array();
    }

    public function login($username, $password) {
       // Query untuk mencari admin berdasarkan username dan password
        $query_admin = $this->db->get_where('users', array('username' => $username, 'password' => $password));

        // Query untuk mencari user berdasarkan username dan password
        $query_user = $this->db->get_where('users_baru', array('username' => $username, 'password' => $password));

        // Jika ditemukan admin
        if ($query_admin->num_rows() > 0) {
            return array('status' => true, 'user_type' => 'admin');
        } 
        // Jika ditemukan user
        elseif ($query_user->num_rows() > 0) {
            return array('status' => true, 'user_type' => 'user');
        } 
        // Jika tidak ditemukan user
        else {
            return array('status' => false);
        }
    }

    public function update_order_status($id, $status) {
        $data = array('aksi' => $status);
        $this->db->where('id', $id);
        $this->db->update('data_order', $data);
    }

    public function search_data_order_kontrol($keyword) {
        $this->db->select('*');
        $this->db->from('data_order');
        $this->db->like('nama_barang', $keyword);
        $this->db->or_like('jumlah', $keyword);
        $this->db->or_like('nama_customer', $keyword);
        $this->db->or_like('tgl_order', $keyword);
        $this->db->or_like('ordering', $keyword);
        $this->db->or_like('aksi', $keyword);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function search_data_order_user($keyword) {
        $this->db->select('*');
        $this->db->from('data_order');
        $this->db->like('nama_barang', $keyword);
        $this->db->or_like('jumlah', $keyword);
        $this->db->or_like('nama_customer', $keyword);
        $this->db->or_like('tgl_order', $keyword);
        $this->db->or_like('ordering', $keyword);
        $this->db->or_like('aksi', $keyword);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_user($username, $password) {
        $data = array(
            'username' => $username,
            'password' => md5($password) // Mengenkripsi password menggunakan MD5
        );
        $this->db->insert('users', $data);
    }

    public function insert_data($data) {
        $this->db->insert('data_order', $data);
        if(empty($data['nama_barang'])) {
            return false;
        }
       
    }
    
}