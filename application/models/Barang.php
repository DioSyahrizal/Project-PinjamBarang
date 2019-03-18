<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Barang extends CI_Model {

        function tampilDataBarang()
        {
            $query = $this->db->query("SELECT * FROM barang");
		    return $query->result();
        }

        function search_Barang($barang){
            $this->db->like('nama_barang', $barang , 'both');
            $this->db->order_by('nama_barang', 'ASC');
            $this->db->limit(10);
            return $this->db->get('barang')->result();
        }

        function getBarang($id)
        {
            $this->db->where('code',$id);
            $query = $this->db->get('barang');
		    return $query->result();
        }

        function insertBarang()
        {
            $barang = $this->input->post('nama_barang');
            $data = array(
                'nama_barang'=>$barang,
                'store_location'=>$this->input->post('store_location'),
                'clasification'=>$this->input->post('clasification')
            );
            $this->db->insert('barang', $data);
        }

        function updateBarang($id)
        {
            $data = array(
                'nama_barang'=>$this->input->post('nama_barang'),
                'store_location'=>$this->input->post('store_location'),
                'clasification'=>$this->input->post('clasification')
            );
            $this->db->where('code',$id);
            $this->db->update('barang',$data);
        }

        function deleteBarang($id){
            $this->db->where('code', $id);
            $this->db->delete('barang');

        }

        function countBarang(){
            $query = $this->db->query("SELECT COUNT(*) as count_barang FROM barang");
            return $query->result();
        }

        function countRequest(){
            $query = $this->db->query("SELECT count(*) as count_request from request WHERE status='Proses'");
            return $query->result();
        }

        function countReplace(){
            $query = $this->db->query("SELECT count(*) as count_replace FROM tbl_replace WHERE status='Proses'");
            return $query->result();
        }

        function countAdmin(){
            $query = $this->db->query("SELECT count(*) as count_admin FROM user WHERE status='admin'");
            return $query->result();
        }

    }

    /* End of file Barang.php */
?>