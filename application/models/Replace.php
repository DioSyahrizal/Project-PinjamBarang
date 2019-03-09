<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Replace extends CI_Model {

        function getreplaceFromDepartement($departement){
            $this->db->where('status', 'Proses');
            $this->db->where('departement', $departement);
            $query = $this->db->get('tbl_replace');
            return $query->result();
        }

        function getreplaceAll(){
            $query = $this->db->get('tbl_replace');
            return $query->result();
        }

        function add_Replace($data)
        {
            $this->db->insert('tbl_replace', $data);
            $id = $this->db->insert_id();
            return (isset($id)) ? $id : FALSE;
        }

        function add_DetailReplace($data)
        {
            $this->db->insert('detail_replace', $data);
        }

        function deleteReplace($id)
        {
            //===================delete replace
            $this->db->where('id', $id);
            $this->db->delete('tbl_replace');
            //===================delete detail
            $this->db->where('id_replace', $id);
            $this->db->delete('detail_replace');
        }

        function getreplaceByUser($name)
        {
            $this->db->where('replacer',$name);
            $this->db->where('status', 'Proses');
            $query = $this->db->get('tbl_replace');
            return $query->result();
        }

        function view_detailReplace($id)
        {
            $this->db->where('id_replace', $id);
            $query = $this->db->get('detail_replace');
            return $query->result();
        }

        function getHistoryReplace($name)
        {
            $this->db->where('replacer',$name);
            $query = $this->db->get('tbl_replace');
            return $query->result();
        }

        function accReplace($id)
        {
            date_default_timezone_set('Asia/Jakarta');
            $tanggal2=date('d-m-Y');
            $data = array(
                'tanggal_acc'   =>$tanggal2,
                'status'        =>"Barang Acc"
            );
            $this->db->where('id', $id);
            $this->db->update('tbl_replace', $data);
        }

        function declineReplace($id)
        {
            $data = array(
                'status'        =>"Barang Decline"
            );
            $this->db->where('id', $id);
            $this->db->update('tbl_replace', $data);
        }

        function actionReplace()
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
                $this->db->update('tbl_replace', $data);
            }else if($action=='downvote'){
                $data = array(
                    'downvote'  =>$this->input->post('upvote') + 1,
                    $jabatan    =>1
                );
                $this->db->where('id', $id);
                $this->db->update('tbl_replace', $data);
            }
        }
    }

    /* End of file Replace.php */

?>