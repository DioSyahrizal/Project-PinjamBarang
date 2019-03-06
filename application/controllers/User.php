<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends CI_Controller {

        public function __construct()
	    {
            parent::__construct();
            $this->load->helper('url','form');
            $this->load->library('form_validation');
        }

        public function index()
        {
            $this->load->model('barang');
		    $tampil['listbarang']=$this->barang->tampilDataBarang();
            $this->load->view('user/request', $tampil);
        }

        public function pinjam()
        {
            $this->load->model('Request');
            $this->form_validation->set_rules('jumlah','Jumlah','trim|required');
            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('user/request');
            }else{
                $this->Request->requestBarang();
                redirect('User/dashboard','refresh');
            }
        }

        public function dashboard()
        {
            if ($this->session->userdata('logged in')) {
                $session_data = $this->session->userdata('logged in');
                $data['name'] = $session_data['name'];
                $this->load->model('Request');
                $tampil['tabel'] = $this->Request->getrequestByUser($data['name']);
                $this->load->view('user/dashboard', $tampil);
            }
        }

        public function history()
        {
            if ($this->session->userdata('logged in')) {
                $session_data = $this->session->userdata('logged in');
                $data['id'] = $session_data['id'];
                $this->load->model('Request');
                $tampil['tabel'] = $this->Request->getHistoryByID($data['id']);
                $this->load->view('user/history', $tampil);
            }
        }

        public function data_server($id)
        {
            $this->load->library('Datatables');
            $this->datatables
                ->select('id_pinjam,admin_penerima,nama_peminjam,barang,jumlah,tgl_pinjam,tgl_kembali,status')
                ->from('peminjaman')
                ->where('id_user',$id);
                echo $this->datatables->generate();
        }

        function get_autocomplete(){
            $this->load->model('Barang');
            if (isset($_GET['term'])) {
                  $result = $this->Barang->search_Barang($_GET['term']);
                   if (count($result) > 0) {
                foreach ($result as $row)
                     $arr_result[] = array(
                        'id'	            => $row->code,
                        'nama_barang'	    => $row->nama_barang,
                        'store_location'	=> $row->store_location,
                        'clasification'	    => $row->clasification,
                        'value'             => $row->nama_barang
                    );
                     echo json_encode($arr_result);
                   }
            }
        }

    }

    /* End of file User.php */


?>