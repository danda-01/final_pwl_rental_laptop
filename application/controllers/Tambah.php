<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_produk");
        $this->load->library('form_validation');
    }
    

    public function index() {
        echo "hello";
        $data["products"] = $this->M_produk->getAll();
        $this->load->view("admin/product/new_form", $data);
    }

    public function add()
    {
    $product = $this->M_produk;
    $validation = $this->form_validation;
    $validation->set_rules($product->rules());

    if ($validation->run()) {
        $product->save();
        $this->session->set_flashdata('success', 'Produk berhasil disimpan');
        redirect('admin/products');
    } else {
        $this->load->view("admin/product/new_form");
    }
    }
}
