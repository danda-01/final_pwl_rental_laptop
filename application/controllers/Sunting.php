<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sunting extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_produk");
        $this->load->library('form_validation');
    }
    

    public function index() {
        echo "hello";
        $data["products"] = $this->M_produk->getAll();
        $this->load->view("admin/product/edit_form", $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/products');
       
        $product = $this->M_produk;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Produk berhasil disimpan');
            redirect('admin/products');
        }

        $data["product"] = $product->getById($id);
        if (!$data["product"]) show_404();
        
        $this->load->view("admin/product/edit_form", $data);
    }
}
