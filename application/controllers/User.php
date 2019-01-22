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

    }

    /* End of file User.php */


?>