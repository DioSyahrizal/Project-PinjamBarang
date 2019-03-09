<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Superadmin extends CI_Controller {

        public function __construct()
	    {
            parent::__construct();
            $this->load->helper('url','form');
            $this->load->library('form_validation');
        }

        public function index()
        {
            $session_data = $this->session->userdata('logged in');
            if ($session_data && $session_data['status']!='user') {
                $this->load->model('Auth');
                $data['listadmin']=$this->Auth->getAllAdmin();
                $this->load->view('superadmin/menuadmin',$data);
            }else{
                redirect('Welcome','refresh');
            }
        }

        public function menuUser()
        {
            $session_data = $this->session->userdata('logged in');
            if ($session_data && $session_data['status']!='user') {
                $this->load->model('Auth');
                $data['listadmin']=$this->Auth->getAllUser();
                $this->load->view('superadmin/menuuser',$data);
            }else{
                redirect('Welcome','refresh');
            }
        }

        public function request()
        {
            $this->load->model('Request');
            $data['request']=$this->Request->getrequestAll();
            $this->load->view('superadmin/request', $data);
        }

        function detailRequest($id)
        {
            $this->load->model('Request');
            $tampil['detail']=$this->Request->view_detailRequest($id);
            $this->load->view('superadmin/detailrequest', $tampil);
        }

        function deleteRequest($id)
        {
            $this->load->model('Request');
            $this->Request->deleteRequest($id);
            redirect('Superadmin/request','refresh');

        }

        public function replace()
        {
            $this->load->model('Replace');
            $data['request']=$this->Replace->getreplaceAll();
            $this->load->view('superadmin/replace', $data);
        }

        function detailReplace($id)
        {
            $this->load->model('Replace');
            $tampil['detail']=$this->Replace->view_detailReplace($id);
            $this->load->view('superadmin/detailreplace', $tampil);
        }

        function deleteReplace($id)
        {
            $this->load->model('Replace');
            $this->Replace->deleteReplace($id);
            redirect('Superadmin/replace','refresh');

        }


    }

    /* End of file Superadmin.php */

?>