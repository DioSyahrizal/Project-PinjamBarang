<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Barang extends CI_Model {

        function tampilDataBarang()
        {
            $query = $this->db->query("SELECT * FROM barang");
		    return $query->result();
        }

        function getBarang($id)
        {
            $this->db->where('code',$id);
            $query = $this->db->get('barang');
		    return $query->result();
        }

        function insertBarang()
        {
            $data = array(
                'nama_barang'=>$this->input->post('nama_barang'),
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

        function countPermintaan(){
            $query = $this->db->query("SELECT count(*) as permintaan from request WHERE status='Proses Cek'");
            return $query->result();
        }

        function countDipinjam(){
            $query = $this->db->query("");
        }

        function countKembali(){
            $query = $this->db->query("SELECT count(*) as kembali FROM request WHERE status='Kembali'");
            return $query->result();
        }

    }

    /* End of file Barang.php */
?>