<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suara_model extends CI_model
{
    public function save()
    {
        $data = array(
            'nama_tps_10'  => $this->input->post('nama_tps_10'),
            'total_suara_10'  => $this->input->post('total_suara_10'),
            'total_suara_sah_10'  => $this->input->post('total_suara_sah_10'),
            'total_suara_tidak_sah_10'  => $this->input->post('total_suara_tidak_sah_10'),
            'suara_no1_10'  => $this->input->post('suara_no1_10'),
            'suara_no2_10'  => $this->input->post('suara_no2_10'),
            'suara_no3_10'  => $this->input->post('suara_no3_10'),
        );

        $this->db->insert('suara', $data);
    }
}
