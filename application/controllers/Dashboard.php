<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Pastikan hanya pengguna yang sudah login yang dapat mengakses dashboard
        $this->load->library('session');
        
        if (!$this->session->userdata('login')) {
            redirect('login');
        }
    }

    public function index() {
        // Load halaman dashboard
        $this->load->view('admin/dashboard');
    }
}
