<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Login extends CI_Controller {

        public function __construct()
	    {
            parent::__construct();
        //	$this->load->model('pegawai_model');
            $this->load->helper('url','form');
            $this->load->library('form_validation');
        }

        //sign up
        public function daftar()
        {
            $this->load->model('Auth');
            $data['manager']=$this->Auth->getManager();
            $this->load->view('daftar', $data);

        }

        public function createUser()
        {
            $this->form_validation->set_rules('username','Username','trim|required');
            $this->form_validation->set_rules('password','Password','trim|required');

            $this->load->model('Auth');
            if($this->form_validation->run() == FALSE) {
                $this->load->view('daftar');
            } else {
                $this->Auth->insertUser();
                redirect('Login/login','refresh');

            }
        }

        public function login()
        {
            $this->load->view('login');
        }

        public function cekLogin()
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_cekDB');
            if ($this->form_validation->run()==FALSE) {
                $this->load->view('login');
            }else{
                redirect('Welcome','refresh');
            }
        }

        public function cekDB($password)
        {
            $this->load->model('Auth');
            $username = $this->input->post('username');
            $result = $this->Auth->login($username,$password);
            if ($result) {
                $sess_array = array();
                foreach ($result as $row) {
                    $sess_array = array (
                        'id'=>$row->id,
                        'username'=>$row->username,
                        'name'=>$row->name,
                        'status'=>$row->status,
                        'departement'=>$row->departement,
                        'jabatan'=>$row->jabatan,
                        'manager'=>$row->manager
                    );
                    $this->session->set_userdata('logged in', $sess_array );
                }
                return true;
            }else{
                $this->form_validation->set_message('cekDB',"Login gagal Username Password tak valid");
                return false;
            }
        }

        public function logout(){
            $this->session->unset_userdata('logged in');
            $this->session->sess_destroy();
            redirect('Welcome','refresh');
        }

    }

    /* End of file Login.php */

?>