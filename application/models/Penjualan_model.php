<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_model extends CI_model
{


    public function savekeranjang()
    {
        $this->db->from('produk')->where('id_produk', $this->input->post('id_produk'));
        $harga = $this->db->get()->row()->harga;
        $this->db->from('produk')->where('id_produk', $this->input->post('id_produk'));
        $stoklama = $this->db->get()->row()->stok;
        $stokbaru = $stoklama - $this->input->post('jumlah');
        $subtotal = $this->input->post('jumlah') * $harga;
        $data = array(
            'kode_penjualan'   => $this->input->post('kode_penjualan'),
            'id_produk'          => $this->input->post('id_produk'),
            'jumlah'          => $this->input->post('jumlah'),
            'sub_total'         => $subtotal
        );
        if ($stoklama >= $this->input->post('jumlah')) {
            $this->db->insert('detail_penjualan', $data);
            $data2 = array(
                'stok' => $stokbaru,
            );
            $where = array(
                'id_produk' => $this->input->post('id_produk')
            );
            $this->db->update('produk', $data2, $where);
        } else {
        }
    }

    public function bayar()
    {
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('Y-m');
        $this->db->from('penjualan');
        $this->db->where("DATE_FORMAT(tanggal, '%Y-%m') = '$tanggal'", null, false);
        $jumlah = $this->db->count_all_results();
        $nota = date('ymd') . $jumlah + 1;

        $this->db->from('temp a');
        $this->db->join('produk b', 'a.id_produk=b.id_produk', 'left');
        $this->db->where('a.id_user', $this->session->userdata('id_user'));
        $this->db->where('a.id_pelanggan', $this->input->post('id_pelanggan'));
        $temp = $this->db->get()->result_array();
        $total = 0;
        foreach ($temp as $as) {
            if ($as['stok'] < $as['jumlah']) {
                $this->session->set_flashdata('flash-success', ' totlo produk');
                redirect($_SERVER["HTTP_REFERER"]);
            }
            $total = $total + $as['jumlah'] * $as['harga'];
            $data = array(
                'kode_penjualan'    => $nota,
                'id_produk'         => $as['id_produk'],
                'jumlah'            => $as['jumlah'],
                'sub_total'         => $as['jumlah'] * $as['harga']
            );
            $this->db->insert('detail_penjualan', $data);
        }

        $data2 = array('stok' => $as['stok'] - $as['jumlah']);
        $where = array('id_produk' => $as['id_produk']);
        $this->db->update('produk', $data2, $where);

        $where = array(
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'id_user'       => $this->session->userdata('id_user')
        );
        $this->db->delete('temp', $where);

        $data = array(
            'kode_penjualan'    => $nota,
            'id_pelanggan'      => $this->input->post('id_pelanggan'),
            'total_harga'       => $total,
            'tanggal'           => date('Y-m-d'),
        );
        $this->db->insert('penjualan', $data);
    }
}
