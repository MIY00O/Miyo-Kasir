<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suara extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        is_admin();
        $this->load->model('Suara_model');
    }
    public function index()
    {
        $this->db->from('suara');
        $this->db->order_by('nama_tps_10', 'ASC');
        $suara = $this->db->get()->result_array();

        $this->db->from('suara');
        $this->db->select('sum(total_suara_10) as total_suara_10');
        $totalSuara = $this->db->get()->row()->total_suara_10;
        if ($totalSuara == NULL) {
            $totalSuara = 0;
        }

        $this->db->from('suara');
        $this->db->select('sum(total_suara_sah_10) as total_suara_sah_10');
        $totalSuaraSah = $this->db->get()->row()->total_suara_sah_10;
        if ($totalSuaraSah == NULL) {
            $totalSuaraSah = 0;
        }

        $this->db->from('suara');
        $this->db->select('sum(total_suara_tidak_sah_10) as total_suara_tidak_sah_10');
        $totalSuaraTidakSah = $this->db->get()->row()->total_suara_tidak_sah_10;
        if ($totalSuaraTidakSah == NULL) {
            $totalSuaraTidakSah = 0;
        }

        $this->db->from('suara');
        $this->db->select('sum(suara_no1_10) as suara_no1_10');
        $suaraNo1 = $this->db->get()->row()->suara_no1_10;
        if ($suaraNo1 == NULL) {
            $suaraNo1 = 0;
        }

        $this->db->from('suara');
        $this->db->select('sum(suara_no2_10) as suara_no2_10');
        $suaraNo2 = $this->db->get()->row()->suara_no2_10;
        if ($suaraNo2 == NULL) {
            $suaraNo2 = 0;
        }

        $this->db->from('suara');
        $this->db->select('sum(suara_no3_10) as suara_no3_10');
        $suaraNo3 = $this->db->get()->row()->suara_no3_10;
        if ($suaraNo3 == NULL) {
            $suaraNo3 = 0;
        }

        $data = array(
            'suara' => $suara,
            'totalSuara' => $totalSuara,
            'totalSuaraSah' => $totalSuaraSah,
            'totalSuaraTidakSah' => $totalSuaraTidakSah,
            'suaraNo1' => $suaraNo1,
            'suaraNo2' => $suaraNo2,
            'suaraNo3' => $suaraNo3,
            'title'      => "MiyoKasir / Pengguna",
        );
        $this->template->load('backend/template/_template', 'backend/pages/suara', $data);
    }

    public function simpan()
    {
        if ($this->input->post('total_suara_10') !=  $this->input->post('total_suara_sah_10') + $this->input->post('total_suara_tidak_sah_10') and $this->input->post('total_suara_sah_10') !=  $this->input->post('suara_no1_10') + $this->input->post('suara_no2_10') + $this->input->post('suara_no3_10')) {
            $this->session->set_flashdata('flash-error', ', total suara dan total suara sah tidak sama');
            redirect('backend/Suara');
        } elseif ($this->input->post('total_suara_10') !=  $this->input->post('total_suara_sah_10') + $this->input->post('total_suara_tidak_sah_10')) {
            $this->session->set_flashdata('flash-error', ', total suara tidak sama');
            redirect('backend/Suara');
        } elseif ($this->input->post('total_suara_sah_10') !=  $this->input->post('suara_no1_10') + $this->input->post('suara_no2_10') + $this->input->post('suara_no3_10')) {
            $this->session->set_flashdata('flash-error', ', total suara sah Tidak Sama');
            redirect('backend/Suara');
        } else {
            $this->Suara_model->save();
            $this->session->set_flashdata('flash-success', ' menambahkan suara');
            redirect('backend/Suara');
        }
    }
}
