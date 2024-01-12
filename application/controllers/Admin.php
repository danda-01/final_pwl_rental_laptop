<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        
        // Periksa apakah pengguna sudah login, jika belum, arahkan ke halaman login
        if (!$this->session->userdata('login')) {
			redirect('login');
		}
		
    }

    public function index()
    {
        // Halaman Pengelolaan Admin
        $this->load->view('admin/dashboard');
    }

    public function logout()
    {
        // Logout: Hapus semua data sesi dan arahkan ke halaman login
        $this->session->sess_destroy();
        redirect('login');
    }
}
