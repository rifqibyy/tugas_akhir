<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function __CONSTRUCT(){
        parent::__CONSTRUCT();
        $this->load->model("Users_model");

    }
    
    public function index()
    {
        $this->load->view('welcome_message');
    }

    public function login()
    {
        $this->load->view('login_view');
    }

    public function loginValidation()
    {
    	$user_id = $this->input->post('user_id');
		$password = $this->input->post('password');
		$where = array(
			'user_id' => $user_id,
			'password' => md5($password)
            );

        $cek = $this->Users_model->cek_login("tbl_users",$where)->num_rows();
        $data = $this->Users_model->cek_login("tbl_users", $where)->result_array();

        // var_dump($data);
        // die();

		if($cek > 0){

			$data_session = array(
                'user_id' => $user_id,
                'role_id' => $data['0']['role_id'],
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

            redirect(base_url("home"));

		}else{
			return false;
		}
	}

	function signout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
    }
    
    function cekId(){

        $user_id = $this->input->post('user_id');
        $where = array(
            'user_id' => $user_id
        );
        $rowCek = $this->Users_model->cek_login("tbl_users", $where)->num_rows();
        $rows = $this->Users_model->cek_login("tbl_users", $where)->result_array();
        
        if($rowCek == 0){

            $datas = array(
                'error' => 'true',
                'msg' => 'User ID salah atau belum didaftarkan!', 
            );

        } else {
            $datas = array(
                'error' => 'false',
                'user_id' => $rows['0']['user_id'],
                'role_id' => $rows['0']['role_id'],
                'password' => $rows['0']['password'],
                'msg' => '',
            );

        }
    
        echo json_encode($datas);

    }
    
    function userValidation()
    {

        $user_id = $this->input->post('user_id');
        $role_id = $this->input->post('role_id');
        $password = md5($this->input->post('password'));

        $table = 'tbl_users';
        $data = array(
            'password' => $password
        );
        $where = array(
            'user_id' => $user_id
        );

        if($role_id == '2') { 
            $tables = 'tbl_mahasiswa';  
            $datas = array('nim' => $user_id);
        } else { 
            $tables = 'tbl_relasi'; 
            $datas = array('user_id' => $user_id);
        }

        $this->Users_model->userValidate($table,$data,$where);
        $this->Users_model->addUser($tables,$datas);

        $datas = array(
            'error' => 'false',
            'msg' => 'User Already Active!'
        );

        echo json_encode($datas);

    }

    function addUserMhs()
    {
        $userMhs = $this->input->post("user_id");
        $data = array(
            "user_id" => $userMhs,
            "role_id" => "2"
        );
        $this->Users_model->addUser("tbl_users",$data);
    }
}