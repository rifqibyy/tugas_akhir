<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{

    public function getDataMhs($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function updateMahasiswa($table,$data,$where)
    {
        $this->db->update($table, $data, $where);
    }

}
