<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
        $this->load->library('session');
    }

    public function index()
    {
        // Halaman Login
        $this->load->view('login');
    }

    public function aksi_login()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);

        // Validasi input
        if (empty($username) || empty($password)) {
            $this->session->set_flashdata('message_login_report', 'Username dan password harus diisi.');
            redirect('login');
        }

        // Ambil data pengguna dari database
        $user_data = $this->M_login->cek_admin($username);

        // Periksa apakah pengguna ditemukan dan kata sandi cocok
        if ($user_data && $password === $user_data->password) {
            $this->session->set_userdata('login', true);
            $this->session->set_userdata('username', $username);
            $this->session->set_userdata('status', 'login');
            redirect('admin/dashboard');
        
        } else {
            // Tampilkan pesan kesalahan jika login gagal
            $this->session->set_flashdata('message_login_report', 'Username atau password salah.');
            redirect('login');
        }
    }

}
