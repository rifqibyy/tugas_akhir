<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->load->helper('form');
        $this->load->model('mahasiswa_model');
    }

    public function index()
    {
        echo "Ini Page Mahasiswa";
    }

    public function profile()
    {
        $id = $this->input->get("user_id");
        $result = $this->mahasiswa_model->getDataMhs("tbl_mahasiswa",array('nim' => $id))->result_array();
        
        $data = array(
            'profile' => array(
                'nim' => $result[0]['nim'],
                'nama' => $result[0]['nama'],
                'jurusan_id' => $result[0]['jurusan_id'],
                'tmp_lahir' => $result[0]['tmp_lahir'],
                'tgl_lahir' => $result[0]['tgl_lahir'],
                'jenis_kelamin' => $result[0]['jenis_kelamin'],
                'agama' => $result[0]['agama'],
                'alamat' => $result[0]['alamat'],
                'telp' => $result[0]['telp'],
                'email' => $result[0]['email'],
                'img' => $result[0]['img']
            )
        );
        $this->load->view('mahasiswa/profile_mhs',$data);
    }

    public function updateProfile(){

        $config['upload_path']          = '././assets/img';
        $config['allowed_types']        = '|jpg|png|jpeg';
        $config['file_name']            = "$_POST[nim]";
        // $config['max_size']             = 100;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('img'))
        {
                $data = array(
                    'nama' => $_POST['nama'], 
                    'jurusan_id' => $_POST['jurusan'], 
                    'tmp_lahir' => $_POST['tmp_lahir'], 
                    'tgl_lahir' => $_POST['tgl_lahir'], 
                    'jenis_kelamin' => $_POST['jenis_kelamin'], 
                    'agama' => $_POST['agama'], 
                    'alamat' => $_POST['alamat'], 
                    'telp' => $_POST['telp'], 
                    'email' => $_POST['email']
                );

        }
        else
        {
                $datas = array('upload_data' => $this->upload->data());
                $data = array(
                    'nama' => $_POST['nama'],
                    'jurusan_id' => $_POST['jurusan'],
                    'tmp_lahir' => $_POST['tmp_lahir'],
                    'tgl_lahir' => $_POST['tgl_lahir'],
                    'jenis_kelamin' => $_POST['jenis_kelamin'],
                    'agama' => $_POST['agama'],
                    'alamat' => $_POST['alamat'],
                    'telp' => $_POST['telp'],
                    'email' => $_POST['email'],
                    'img' => $datas['upload_data']['file_name']
                );
        }

        $this->mahasiswa_model->updateMahasiswa('tbl_mahasiswa',$data,array('nim' => "$_POST[nim]"));
      
    }
}