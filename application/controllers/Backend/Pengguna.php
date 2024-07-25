<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        is_logged_in();
        is_admin();
    }
    public function index()
    {
        $this->db->from('user');
        $this->db->order_by('nama', 'ASC');
        $user = $this->db->get()->result_array();

        $data = array(
            'title'     => "MiyoKasir / Pengguna",
            'user'      => $user,
        );
        $this->template->load('backend/template/_template', 'backend/pages/backendpengguna', $data);
    }

    public function Simpan()
    {
        $username = $this->input->post('username');

        $this->db->from('user');
        $this->db->where('username', $username);
        $cek = $this->db->get()->result_array();
        if ($cek <> NULL) {
            $this->session->set_flashdata('flash-error', ', username sudah digunakan!');
            redirect('Backend/Pengguna');
        } else {
            $this->Auth_model->save();
            $this->session->set_flashdata('flash-success', ' ditambahkan');
            redirect('Backend/Pengguna');
        }
    }

    public function Update()
    {
        $this->Auth_model->update();
        $this->session->set_flashdata('flash-success', ' diupdate');
        redirect('Backend/Pengguna');
    }

    public function Hapus($id)
    {
        $where = array('id_user' => $id);
        if ($where <> NULL) {

            $this->db->Delete('user', $where);
            $this->session->set_flashdata('flash-success', ' dihapus');
            redirect('Backend/Pengguna');
        } else {
            $this->session->set_flashdata('flash-error', ' dihapus');
            redirect('Backend/Pengguna');
        }
    }
}
