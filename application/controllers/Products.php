<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_produk");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["products"] = $this->M_produk->getAll();
        $this->load->view("admin/product/list", $data);
    }


    

    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        
        if ($this->M_produk->delete($id)) {
            $this->session->set_flashdata('success', 'Produk berhasil dihapus');
            redirect('admin/products');
        }
    }
}
