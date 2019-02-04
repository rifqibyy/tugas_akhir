<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{

    public function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function userValidate($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function addUser($table,$data)
    {
        $this->db->insert($table,$data);
    }

}