<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Admin extends CI_Controller {

        public function __construct()
	    {
            parent::__construct();
            $this->load->helper('url','form');
            $this->load->library('form_validation');
        }

        public function index()
        {
            $this->load->model('barang');
            $data['count']=$this->barang->countBarang();
            $this->load->view('admin/index',$data);
        }

        public function tabel()
        {
            $this->load->model('barang');
		    $tampil['review']=$this->barang->tampilDataBarang();
            $this->load->view('admin/tables',$tampil);

        }

        public function isibarang()
        {
            $this->load->view('admin/isibarang');

        }

        public function tambahbarang()
        {
            $this->load->model('barang');
            $this->form_validation->set_rules('nama_barang','Nama Barang','trim|required');
            $this->form_validation->set_rules('store_location', 'Store Location', 'trim|required');
            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('admin/isibarang');

            }else{
                $this->barang->insertBarang();
                $this->load->view('admin/tables');
            }
        }

        public function data_server()
        {
            $this->load->library('Datatables');
            $this->datatables
                ->select('code,nama_barang,store_location,clasification')
                ->from('barang');
                echo $this->datatables->generate();
        }


    }

    /* End of file Admin.php */

?>