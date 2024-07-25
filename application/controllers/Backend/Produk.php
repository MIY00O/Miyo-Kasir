<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
        is_logged_in();
        $this->ip_address    = $_SERVER['REMOTE_ADDR'];
        $this->datetime         = date("Y-m-d H:i:s");
    }
    public function index()
    {
        $this->db->from('produk');
        $produk = $this->db->get()->result_array();

        $data = array(
            'title'     => "MiyoKasir / Produk",
            'produk'    => $produk,
        );
        $this->template->load('backend/template/_template', 'backend/pages/backendproduk', $data);
    }

    public function Simpan()
    {
        $kode_produk = $this->input->post('kode_produk');

        $this->db->from('produk');
        $this->db->where('kode_produk', $kode_produk);
        $cek = $this->db->get()->result_array();
        if ($cek <> NULL) {
            $this->session->set_flashdata('flash-error', ', kode produk sudah digunakan!');
            redirect('backend/Produk');
        } else {
            $this->Produk_model->saveproduk();
            $this->session->set_flashdata('flash-success', ' menambahkan produk');
            redirect('backend/Produk');
        }
    }

    public function Update()
    {
        $this->Produk_model->updateproduk();
        $this->session->set_flashdata('flash-success', ' mengupdate produk');
        redirect('backend/Produk');
    }

    public function Hapus($id)
    {
        $where = array('id_produk' => $id);
        if ($where <> NULL) {

            $this->db->Delete('produk', $where);
            $this->session->set_flashdata('flash-success', ' menghapus produk');
            redirect('backend/Produk');
        } else {
            $this->session->set_flashdata('flash-success', ' menghapus produk');
            redirect('backend/Produk');
        }
    }
}
