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
            $session_data = $this->session->userdata('logged in');
            if ($session_data && $session_data['status']=='admin') {
                $this->load->model('barang');
                $data['count']=$this->barang->countBarang();
                $this->load->view('admin/index',$data);
            }else{
                redirect('Welcome','refresh');
            }

        }

        public function update($id)
        {
            $this->form_validation->set_rules('name','Name','trim|required');

            $this->load->model('Auth');
            $tampil['list_user']=$this->Auth->getUser($id);
            if($this->form_validation->run() == FALSE) {
                $this->load->view('admin/admin',$tampil);
            } else {
                //$data = array('upload_data' => $this->upload->data());
                $this->Auth->updateUser($id);
                $sess_array = array (
                    'id'=>$this->input->post('id'),
                    'username'=>$this->input->post('username'),
                    'name'=>$this->input->post('name'),
                    'status'=>$this->input->post('status'),
                );
                $this->session->unset_userdata('logged in');
                $this->session->set_userdata('logged in', $sess_array );
                redirect('admin/index','refresh');

            }
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

        public function pinjam()
        {
            $this->load->model('Pinjam');
            $data['pinjam']=$this->Pinjam->getPinjamAll();
            $this->load->view('admin/pinjam', $data);

        }

        public function detailPinjam($id)
        {
            $this->load->model('Pinjam');
            $data['pinjam']=$this->Pinjam->getPinjamByID($id);
            $this->load->view('admin/detailpinjam', $data);
        }

        public function prosesPinjam($id)
        {
            $this->load->model('Pinjam');
            $this->Pinjam->prosesPinjam($id);
            redirect('admin/index','refresh');

        }

        public function data_server()
        {
            $this->load->library('Datatables');
            $this->datatables
                ->select('code,nama_barang,store_location,clasification')
                ->from('barang');
                echo $this->datatables->generate();
        }

        public function data_pinjam()
        {
            $this->load->library('Datatables');
            $this->datatables
                ->select('id_pinjam,admin_penerima,nama_peminjam,barang,jumlah,tgl_pinjam,tgl_kembali,status')
                ->from('peminjaman');
                echo $this->datatables->generate();
        }


    }

    /* End of file Admin.php */

?>