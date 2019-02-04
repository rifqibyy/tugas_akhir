<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->load->helper('form');
    }

    public function index()
    {
        $this->load->view('admin/admin_home_view');
    }

    public function dataMahasiswa()
    {
        $this->load->view('admin/admin_datamhs_view');
    }

    public function product()
    {
        echo "ini page product";
    }
}