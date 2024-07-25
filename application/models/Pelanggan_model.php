<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_model extends CI_model
{
    public function savepelanggan()
    {
        $data = array(
            'nama'          => $this->input->post('nama'),
            'alamat'        => $this->input->post('alamat'),
            'telp'          => $this->input->post('telp'),
        );
        $this->db->insert('pelanggan', $data);
    }

    public function updatepelanggan()
    {
        $data = array(
            'nama'          => $this->input->post('nama'),
            'alamat'        => $this->input->post('alamat'),
            'telp'          => $this->input->post('telp'),
        );

        $where = array(
            'id_pelanggan' => $this->input->post('id_pelanggan')
        );
        $this->db->update('pelanggan', $data, $where);
    }
}
