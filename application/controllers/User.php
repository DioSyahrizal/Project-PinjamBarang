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
            $this->load->view('user/pinjam', $tampil);
        }

        public function pinjam()
        {
            $this->load->model('Pinjam');
            $this->form_validation->set_rules('jumlah','Jumlah','trim|required');
            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('user/pinjam');
            }else{
                $this->Pinjam->pinjamBarang();
                redirect('User/dashboard','refresh');
            }
        }

        public function dashboard()
        {
            if ($this->session->userdata('logged in')) {
                $session_data = $this->session->userdata('logged in');
                $data['id'] = $session_data['id'];
                $this->load->model('Pinjam');
                $tampil['tabel'] = $this->Pinjam->getPinjamByUser($data['id']);
                $this->load->view('user/dashboard', $tampil);
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
    }

    /* End of file User.php */


?>