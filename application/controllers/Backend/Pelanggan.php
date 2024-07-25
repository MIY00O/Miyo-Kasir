<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelanggan_model');
        is_logged_in();
    }
    public function index()
    {
        $this->db->from('pelanggan');
        $this->db->order_by('nama', 'ASC');
        $pelanggan = $this->db->get()->result_array();

        $data = array(
            'title'     => "MiyoKasir / Pelanggan",
            'pelanggan'      => $pelanggan,
        );
        $this->template->load('backend/template/_template', 'backend/pages/backendpelanggan', $data);
    }

    public function Simpan()
    {
        $telp = $this->input->post('telp');

        $this->db->from('pelanggan');
        $this->db->where('telp', $telp);
        $cek = $this->db->get()->result_array();
        if ($cek <> NULL) {
            $this->session->set_flashdata('flash-error', ', no telepon sudah digunakan!');
            redirect('Backend/Pelanggan');
        } else {
            $this->Pelanggan_model->savepelanggan();
            $this->session->set_flashdata('flash-success', ' menyimpan data pelanggan');
            redirect('Backend/Pelanggan');
        }
    }

    public function Update()
    {
        $this->Pelanggan_model->Updatepelanggan();
        $this->session->set_flashdata('flash-success', ' mengupdate data pelanggan');
        redirect('Backend/Pelanggan');
    }


    public function Hapus($id)
    {
        $where = array('id_pelanggan' => $id);
        if ($where <> NULL) {

            $this->db->Delete('pelanggan', $where);
            $this->session->set_flashdata('flash-success', ' dihapus');
            redirect('Backend/Pelanggan');
        } else {

            $this->session->set_flashdata('flash-error', ' dihapus');
            redirect('Backend/Pelanggan');
        }
    }
}
