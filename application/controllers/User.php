<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends CI_Controller {

        public function __construct()
	    {
            parent::__construct();
            $this->load->helper('url','form');
            $this->load->library('form_validation');
            $session_data = $this->session->userdata('logged in');
            if ($session_data['status']!='user') {
                redirect('Welcome','refresh');
            }
        }

        public function index()
        {
            $this->load->model('barang');
		    $tampil['listbarang']=$this->barang->tampilDataBarang();
            $this->load->view('user/request', $tampil);
        }



        public function dashboard_Request()
        {
            if ($this->session->userdata('logged in')) {
                $session_data = $this->session->userdata('logged in');
                $data['name'] = $session_data['name'];
                $this->load->model('Request');
                $tampil['tabel'] = $this->Request->getrequestByUser($data['name']);
                $this->load->view('user/dashboard_request', $tampil);
            }
        }

        public function dashboard_Replace()
        {
            if ($this->session->userdata('logged in')) {
                $session_data = $this->session->userdata('logged in');
                $data['name'] = $session_data['name'];
                $this->load->model('Replace');
                $tampil['tabel'] = $this->Replace->getreplaceByUser($data['name']);
                $this->load->view('user/dashboard_replace', $tampil);
            }
        }

        public function history_request()
        {
            if ($this->session->userdata('logged in')) {
                $session_data = $this->session->userdata('logged in');
                $data['name'] = $session_data['name'];
                $this->load->model('Request');
                $tampil['tabel'] = $this->Request->getHistoryRequest($data['name']);
                $this->load->view('user/history_request', $tampil);
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

        function addRequest()
        {
            //===========Tambah table request========================
            $this->load->model('Request');
            $data_order = array('tanggal_request'   => $this->input->post('tanggal_request'),
                                'requester'         => $this->input->post('requester'),
                                'departement'       => $this->input->post('departement'),
                                'upvote'            => 0,
                                'downvote'          => 0,
                                'status'            => 'Proses',
                                'pilih_supervisor'  => 0,
                                'pilih_engineer'    => 0,
                                'pilih_operational' => 0,
                                'pengampu'          => $this->input->post('manager')
                            );
            $id_request = $this->Request->add_Request($data_order);
            //===========Tambah table detail request========================
            if ($cart = $this->cart->contents())
			{
				foreach ($cart as $item)
					{
						$data_detail = array('id_request'           => $id_request,
                                            'barang'                => $item['name'],
                                            'qty'                   => $item['qty'],
                                            'store_location'        => $item['location']);
						$proses = $this->Request->add_DetailRequest($data_detail);
					}
			}
            //-------------------------Hapus shopping cart--------------------------
            $this->cart->destroy();
            redirect('User/dashboard_Request','refresh');

        }

        function detailRequest($id)
        {
            $this->load->model('Request');
            $tampil['detail']=$this->Request->view_detailRequest($id);
            $this->load->view('user/detailRequest', $tampil);
        }

        public function replace()
        {
            $this->load->model('barang');
		    $tampil['listbarang']=$this->barang->tampilDataBarang();
            $this->load->view('user/replace', $tampil);
        }

        public function addReplace()
        {
            //===========Tambah table replace========================
            $this->load->model('Replace');
            $data_order = array('tanggal_replace'   => $this->input->post('tanggal_request'),
                                'replacer'          => $this->input->post('requester'),
                                'departement'       => $this->input->post('departement'),
                                'upvote'            => 0,
                                'downvote'          => 0,
                                'status'            => 'Proses',
                                'pilih_supervisor'  => 0,
                                'pilih_engineer'    => 0,
                                'pengampu'          => $this->input->post('manager')
                            );
            $id_replace = $this->Replace->add_Replace($data_order);
            //===========Tambah table detail replace========================
            if ($cart = $this->cart->contents())
			{
				foreach ($cart as $item)
					{
						$data_detail = array('id_replace'           => $id_replace,
                                            'barang'                => $item['name'],
                                            'qty'                   => $item['qty'],
                                            'store_location'        => $item['location']);
						$proses = $this->Replace->add_DetailReplace($data_detail);
					}
			}
            //-------------------------Hapus shopping cart--------------------------
            $this->cart->destroy();
            redirect('User/dashboard_Replace','refresh');

        }

        function detailReplace($id)
        {
            $this->load->model('Replace');
            $tampil['detail']=$this->Replace->view_detailReplace($id);
            $this->load->view('user/detailReplace', $tampil);
        }

        public function history_replace()
        {
            if ($this->session->userdata('logged in')) {
                $session_data = $this->session->userdata('logged in');
                $data['name'] = $session_data['name'];
                $this->load->model('Replace');
                $tampil['tabel'] = $this->Replace->getHistoryReplace($data['name']);
                $this->load->view('user/history_replace', $tampil);
            }
        }

    }

    /* End of file User.php */


?>