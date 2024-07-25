<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_model
{
    public function saveproduk()
    {
        $data = array(
            'kode_produk'   => $this->input->post('kode_produk'),
            'nama'          => $this->input->post('nama'),
            'stok'          => $this->input->post('stok'),
            'harga'         => $this->input->post('harga'),
        );
        $this->db->insert('produk', $data);
    }

    public function updateproduk()
    {
        $data = array(
            'kode_produk'   => $this->input->post('kode_produk'),
            'nama'          => $this->input->post('nama'),
            'stok'          => $this->input->post('stok'),
            'harga'         => $this->input->post('harga'),
        );

        $where = array(
            'id_produk' => $this->input->post('id_produk')
        );
        $this->db->update('produk', $data, $where);
    }
}
