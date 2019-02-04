<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->load->helper('form');
        if(isset($_SESSION['status']) != 'login') redirect('login');
    }

    public function index()
    {
        $this->load->view('templates/home');
    }

}