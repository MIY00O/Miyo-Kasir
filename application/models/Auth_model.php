<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_model
{
    public function save()
    {
        $data = array(
            'username'  => $this->input->post('username'),
            'password'  => md5($this->input->post('password')),
            'nama'      => $this->input->post('nama'),
            'level'     => $this->input->post('level'),
        );
        $this->db->insert('user', $data);
    }

    public function update()
    {
        $data = array(
            'nama'      => $this->input->post('nama'),
            'username'      => $this->input->post('username'),
            'level'     => $this->input->post('level'),
        );

        $where = array(
            'id_user' => $this->input->post('id_user')
        );
        $this->db->update('user', $data, $where);
    }
}
