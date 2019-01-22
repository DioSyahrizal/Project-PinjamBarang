<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Barang extends CI_Model {

        function tampilDataBarang()
        {
            $query = $this->db->query("SELECT * FROM barang");
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

        function countBarang(){
            $query = $this->db->query("SELECT COUNT(*) as count_barang FROM barang");
            return $query->result();
        }

    }

    /* End of file Barang.php */
?>