<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('Y-m-d');
        $this->db->select('sum(total_harga) as total');
        $this->db->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m-%d')", $tanggal);
        $hari_ini = $this->db->get()->row()->total;
        if ($hari_ini == NULL) {
            $hari_ini = 0;
        }

        $this->db->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m-%d')", $tanggal);
        $transaksi_hari_ini = $this->db->count_all_results();
        if ($transaksi_hari_ini == NULL) {
            $transaksi_hari_ini = 0;
        }

        $produk = $this->db->from('produk')->count_all_results();
        if ($produk == NULL) {
            $produk = 0;
        }

        $tanggal = date('Y-m');
        $this->db->select('sum(total_harga) as total');
        $this->db->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal);
        $bulan_ini = $this->db->get()->row()->total;
        if ($bulan_ini == NULL) {
            $bulan_ini = 0;
        }

        $this->db->select('p.id_produk, p.nama, p.harga, SUM(dp.jumlah) as total_terjual');
        $this->db->from('produk p');
        $this->db->join('detail_penjualan dp', 'p.id_produk = dp.id_produk', 'left');
        $this->db->group_by('p.id_produk');
        $this->db->order_by('total_terjual', 'desc');
        $this->db->limit(5);
        $produk_terlaris = $this->db->get()->result_array();


        $data = array(
            'title'     => "MiyoKasir / Dashboard ",
            'hari_ini'  => $hari_ini,
            'bulan_ini'  => $bulan_ini,
            'transaksi_hari_ini'  => $transaksi_hari_ini,
            'produk'  => $produk,
            'produk_terlaris'  => $produk_terlaris,
        );
        $this->template->load('backend/template/_template', 'backend/backendhome', $data);
    }


    public function Login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $this->db->from('user')->where('username', $username);
        $user = $this->db->get()->row();
        if ($user == NULL) {
            redirect('Home');
        } else if ($user->password == $password) {
            $data = [
                'id_user'       => $user->id_user,
                'username'      => $user->username,
                'nama'          => $user->nama,
                'level'         => $user->level,
            ];
            $b = $this->session->set_userdata($data);

            redirect('Home');
        } else {
            redirect('Home');
        }
    }

    public function Logout()
    {
        $id = $this->session->userdata('id_user');

        $this->db->where('id_user', $id);
        $this->session->sess_destroy();
        redirect('Home');
    }
}
