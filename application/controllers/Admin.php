<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Admin extends CI_Controller {

        public function __construct()
	    {
            parent::__construct();
            $this->load->helper('url','form');
            $this->load->library('form_validation');
            $session_data = $this->session->userdata('logged in');
            if ($session_data['status']!='admin') {
                redirect('Welcome','refresh');
            }
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

        public function updatePassword($id)
        {
            $this->form_validation->set_rules('password','Password','trim|required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

            $this->load->model('Auth');
            $tampil['list_user']=$this->Auth->getUser($id);
            if($this->form_validation->run() == FALSE) {
                $this->load->view('admin/admin',$tampil);
            } else {
                //$data = array('upload_data' => $this->upload->data());
                $this->Auth->updatePassword($id);
                redirect('admin/index','refresh');
            }
        }

        public function updateBarang($id)
        {
            $this->form_validation->set_rules('nama_barang','Tools','trim|required');

            $this->load->model('Barang');
            $tampil['barang']=$this->Barang->getBarang($id);
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/updateBarang', $tampil);
            } else {
                $this->Barang->updateBarang($id);
                redirect('admin/tabel','refresh');
            }
        }

        public function deleteBarang($id)
        {
            $this->load->model('Barang');
            $this->Barang->deleteBarang($id);
            redirect('admin/tabel','refresh');

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

        public function request()
        {
            $session_data = $this->session->userdata('logged in');
            $data['username'] = $session_data['username'];
            $data['jabatan'] = $session_data['jabatan'];
            $this->load->model('Request');
            if($data['jabatan'] == 'Supervisor'){
                $data['request']=$this->Request->getrequestFromPengampu($data['username']);
            }else{
                $data['request']=$this->Request->getrequestAdmin();
            }
            $this->load->view('admin/request', $data);
        }

        public function prosesPinjam($id)
        {
            $this->load->model('Request');
            $this->Request->prosesrequest($id);
            redirect('admin/request','refresh');

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

        function detailRequest($id)
        {
            $this->load->model('Request');
            $tampil['request']=$this->Request->getrequestByID($id);
            $tampil['detail']=$this->Request->view_detailRequest($id);
            $this->load->view('admin/detailrequest', $tampil);
        }

        public function actionRequest()
        {
            $this->load->model('Request');
            $this->Request->actionRequest();
            redirect('Admin/request','refresh');
        }

        public function accRequest($id)
        {
            $this->load->model('Request');
            $this->Request->accRequest($id);
            redirect('Admin/request','refresh');
        }

        public function declineRequest($id)
        {
            $this->load->model('Request');
            $this->Request->declineRequest($id);
            redirect('Admin/request','refresh');
        }

        public function replace()
        {
            $session_data = $this->session->userdata('logged in');
            $data['username'] = $session_data['username'];
            $data['jabatan'] = $session_data['jabatan'];
            $this->load->model('Replace');
            if($data['jabatan'] == 'Supervisor'){
                $data['request']=$this->Replace->getreplaceFromPengampu($data['username']);
            }else{
                $data['request']=$this->Replace->getreplaceAdmin();
            }
            //$data['request']=$this->Replace->getreplaceFromDepartement($data['departement']);
            $this->load->view('admin/replace', $data);
        }

        function detailReplace($id)
        {
            $this->load->model('Replace');
            $tampil['detail']=$this->Replace->view_detailReplace($id);
            $this->load->view('admin/detailreplace', $tampil);
        }

        public function accReplace($id)
        {
            $this->load->model('Request');
            $this->Request->accReplace($id);
            redirect('Admin/replace','refresh');
        }

        public function declineReplace($id)
        {
            $this->load->model('Replace');
            $this->Replace->declineReplace($id);
            redirect('Admin/replace','refresh');
        }

        public function actionReplace()
        {
            $this->load->model('Replace');
            $this->Replace->actionReplace();
            redirect('Admin/replace','refresh');
        }

        public function history_request()
        {
            $session_data = $this->session->userdata('logged in');
            $data['departement'] = $session_data['departement'];
            $this->load->model('Request');
            $data['request']=$this->Request->getrequestHistory($data['departement']);
            $this->load->view('admin/history_request', $data);
        }

        public function history_replace()
        {
            $session_data = $this->session->userdata('logged in');
            $data['departement'] = $session_data['departement'];
            $this->load->model('Replace');
            $data['request']=$this->Replace->getreplaceHistory( $data['departement']);
            $this->load->view('admin/history_replace', $data);
        }

    }

    /* End of file Admin.php */

?>