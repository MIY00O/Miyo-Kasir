<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penjualan_model');
        is_logged_in();
    }
    public function index()
    {
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('y-m-d');
        $this->db->select('*');
        $this->db->from('penjualan a')->order_by('a.tanggal', 'DESC')->where('a.tanggal', $tanggal);
        $this->db->join('pelanggan b', 'a.id_pelanggan = b.id_pelanggan', 'left');
        $penjualan = $this->db->get()->result_array();

        $this->db->from('pelanggan');
        $this->db->order_by('nama', 'ASC');
        $pelanggan = $this->db->get()->result_array();

        $data = array(
            'title'     => "MiyoKasir / Penjualan",
            'penjualan' => $penjualan,
            'pelanggan' => $pelanggan,
        );
        $this->template->load('backend/template/_template', 'backend/pages/backendpenjualan', $data);
    }

    public function transaksi($id_pelanggan)
    {
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('Y-m');
        $this->db->from('penjualan');
        $this->db->where("DATE_FORMAT(tanggal, '%Y-%m') = '$tanggal'", null, false);
        $jumlah = $this->db->count_all_results();
        $nota = date('ymd') . $jumlah + 1;

        $this->db->from('produk')->where('stok >', 0)->order_by('nama', 'ASC');
        $produk = $this->db->get()->result_array();

        $this->db->from('pelanggan')->where('id_pelanggan', $id_pelanggan);
        $nama_pelanggan = $this->db->get()->row()->nama;

        $this->db->from('detail_penjualan a');
        $this->db->join('produk b', 'a.id_produk=b.id_produk', 'left');
        $this->db->where('a.kode_penjualan', $nota);
        $detail = $this->db->get()->result_array();

        $this->db->from('temp a');
        $this->db->join('produk b', 'a.id_produk=b.id_produk', 'left');
        $this->db->where('a.id_user', $this->session->userdata('id_user'));
        $this->db->where('a.id_pelanggan', $id_pelanggan);
        $temp = $this->db->get()->result_array();

        $data = array(
            'title'             => "MiyoKasir / Penjualan / Transaksi Penjualan",
            'nota'              => $nota,
            'produk'            => $produk,
            'id_pelanggan'      => $id_pelanggan,
            'nama_pelanggan'    => $nama_pelanggan,
            'detail'            => $detail,
            'temp'            => $temp,
        );
        $this->template->load('backend/template/_template', 'backend/pages/backendpenjualantransaksi', $data);
    }

    public function addtemp()
    {
        $this->db->from('produk')->where('id_produk', $this->input->post('id_produk'));
        $stoklama = $this->db->get()->row()->stok;

        $this->db->from('temp');
        $this->db->where('id_produk', $this->input->post('id_produk'));
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->where('id_pelanggan', $this->input->post('id_pelanggan'));
        $cek = $this->db->get()->result_array();
        if ($stoklama > $this->input->post('jumlah') and $cek == NULL) {
            $data = array(
                'id_pelanggan'      => $this->input->post('id_pelanggan'),
                'id_user'           => $this->session->userdata('id_user'),
                'id_produk'         => $this->input->post('id_produk'),
                'jumlah'            => $this->input->post('jumlah'),
            );
            $this->db->insert('temp', $data);
            $this->session->set_flashdata('flash-success', ' Berhasil menambahkan produk');
        } elseif ($stoklama < $this->input->post('jumlah')) {
            $this->session->set_flashdata('flash-error', ', produk yang dipilih tidak mencukupi!');
        } elseif ($cek <> NULL) {
            $this->session->set_flashdata('flash-error', ', produk sudah dipilih!');
        } else {
        }
        redirect($_SERVER["HTTP_REFERER"]);
    }

    public function tambahkeranjang()
    {
        $this->Penjualan_model->savekeranjang();
        redirect($_SERVER["HTTP_REFERER"]);
    }

    public function Hapus($id_temp)
    {
        $where = array('id_temp' => $id_temp);
        if ($where <> NULL) {

            $this->db->delete('temp', $where);
            $this->session->set_flashdata('flash-success', ' menghapus produk');
            redirect($_SERVER["HTTP_REFERER"]);
        } else {
            $this->session->set_flashdata('flash-error', ' menghapus produk');
            redirect($_SERVER["HTTP_REFERER"]);
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
        $this->Penjualan_model->bayar();
        redirect('backend/penjualan/invoice/' . $nota);
    }

    public function invoice($kode_penjualan)
    {
        $this->db->select('*');
        $this->db->from('penjualan a')->order_by('a.tanggal', 'DESC')->where('a.kode_penjualan', $kode_penjualan);
        $this->db->join('pelanggan b', 'a.id_pelanggan = b.id_pelanggan', 'left');
        $penjualan = $this->db->get()->row();

        $this->db->from('detail_penjualan a');
        $this->db->join('produk b', 'a.id_produk=b.id_produk', 'left');
        $this->db->where('a.kode_penjualan', $kode_penjualan);
        $detail = $this->db->get()->result_array();

        $data = array(
            'title'             => "MiyoKasir | Transaksi Penjualan",
            'nota'              => $kode_penjualan,
            'penjualan'         => $penjualan,
            'detail'            => $detail,
        );
        $this->template->load('backend/template/_template', 'backend/pages/backendinvoice', $data);
    }
}
