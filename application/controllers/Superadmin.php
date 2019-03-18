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
                $this->load->model('barang');
                $data['countBarang']=$this->barang->countBarang();
                $data['countRequest']=$this->barang->countRequest();
                $data['countReplace']=$this->barang->countReplace();
                $data['countAdmin']=$this->barang->countAdmin();
                $this->load->view('superadmin/dashboard',$data);
            }else{
                redirect('Welcome','refresh');
            }
        }

        public function menuAdmin()
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

        public function tabel()
        {
            $this->load->model('barang');
		    $tampil['review']=$this->barang->tampilDataBarang();
            $this->load->view('superadmin/tables',$tampil);

        }

        public function updateBarang($id)
        {
            $this->form_validation->set_rules('nama_barang','Tools','trim|required');

            $this->load->model('Barang');
            $tampil['barang']=$this->Barang->getBarang($id);
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('superadmin/updateBarang', $tampil);
            } else {
                $this->Barang->updateBarang($id);
                redirect('superadmin/tabel','refresh');
            }
        }

        public function deleteBarang($id)
        {
            $this->load->model('Barang');
            $this->Barang->deleteBarang($id);
            redirect('Superadmin/tabel','refresh');
        }

        public function update($id)
        {
            $this->form_validation->set_rules('name','Name','trim|required');

            $this->load->model('Auth');
            $tampil['list_user']=$this->Auth->getUser($id);
            if($this->form_validation->run() == FALSE) {
                $this->load->view('superadmin/admin',$tampil);
            } else {
                //$data = array('upload_data' => $this->upload->data());
                $this->Auth->updateUser($id);
                redirect('Superadmin/index','refresh');

            }
        }

        public function updatePassword($id)
        {
            $this->form_validation->set_rules('password','Password','trim|required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

            $this->load->model('Auth');
            $tampil['list_user']=$this->Auth->getUser($id);
            if($this->form_validation->run() == FALSE) {
                $this->load->view('superadmin/admin',$tampil);
            } else {
                //$data = array('upload_data' => $this->upload->data());
                $this->Auth->updatePassword($id);
                redirect('Superadmin/index','refresh');
            }
        }

        public function deleteUser($id)
        {
            $this->load->model('Auth');
            $this->Auth->deleteUser($id);
            redirect('Superadmin/tabel','refresh');
        }


    }

    /* End of file Superadmin.php */

?>