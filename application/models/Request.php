<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Request extends CI_Model {

        function requestBarang()
        {
            $data = array(
                'id_request'=>$this->input->post('id_request'),
                'id_user'=>$this->input->post('id_user'),
                'nama_requester'=>$this->input->post('nama_requester'),
                'barang'=>$this->input->post('barang'),
                'jumlah'=>$this->input->post('jumlah'),
                'tgl_request'=>$this->input->post('tgl_request'),
                'status'=>$this->input->post('status')
            );
            $this->db->insert('request', $data);
        }

        function getrequestFromDepartement($departement){
            $this->db->where('status', 'Proses');
            $this->db->where('departement', $departement);
            $query = $this->db->get('request');
            return $query->result();
        }

        function getrequestAll(){
            $query = $this->db->get('request');
            return $query->result();
        }

        function getrequestByID($id){
            $this->db->where('id', $id);
            $query = $this->db->get('request');
            return $query->result();
        }

        function getProsKembali(){
            $query = $this->db->query('SELECT * FROM `request` WHERE status = "Ada"');
            return $query->result();
        }

        function getrequestByUser($name)
        {
            $this->db->where('requester',$name);
            $this->db->where('status', 'Proses');
            $query = $this->db->get('request');
            return $query->result();
        }

        function getHistoryRequest($name)
        {
            $this->db->where('requester',$name);
            $query = $this->db->get('request');
            return $query->result();
        }

        function prosesKembali($id)
        {
            $data = array(
                'status'=>'Kembali',
            );
            $this->db->where('id_pinjam',$id);
            $this->db->update('request',$data);
        }

        function add_Request($data)
        {
            $this->db->insert('request', $data);
            $id = $this->db->insert_id();
            return (isset($id)) ? $id : FALSE;
        }

        function add_DetailRequest($data)
        {
            $this->db->insert('detail_request', $data);
        }

        function deleteRequest($id)
        {
             //===================delete request
             $this->db->where('id', $id);
             $this->db->delete('request');
             //===================delete detail
             $this->db->where('id_request', $id);
             $this->db->delete('detail_request');
        }

        function view_detailRequest($id)
        {
            $this->db->where('id_request', $id);
            $query = $this->db->get('detail_request');
            return $query->result();
        }

        function actionRequest()
        {
            $id = $this->input->post('id');
            $jabatan = $this->input->post('jabatan');
            $action = $this->input->post('action');
            if($action=='upvote'){
                $data = array(
                    'upvote'    =>$this->input->post('upvote') + 1,
                    $jabatan    =>1
                );
                $this->db->where('id', $id);
                $this->db->update('request', $data);
            }else if($action=='downvote'){
                $data = array(
                    'downvote'  =>$this->input->post('upvote') + 1,
                    $jabatan    =>1
                );
                $this->db->where('id', $id);
                $this->db->update('request', $data);
            }
        }

        function accRequest($id)
        {
            date_default_timezone_set('Asia/Jakarta');
            $tanggal2=date('d-m-Y');
            $data = array(
                'tanggal_acc'   =>$tanggal2,
                'status'        =>"Approve"
            );
            $this->db->where('id', $id);
            $this->db->update('request', $data);
        }

        function declineRequest($id)
        {
            $data = array(
                'status'        =>"Decline"
            );
            $this->db->where('id', $id);
            $this->db->update('request', $data);
        }


    }

    /* End of file Pinjam.php */

?>