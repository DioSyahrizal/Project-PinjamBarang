<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Pinjam extends CI_Model {

        function pinjamBarang()
        {
            $data = array(
                'id_user'=>$this->input->post('id_user'),
                'nama_peminjam'=>$this->input->post('nama_peminjam'),
                'barang'=>$this->input->post('barang'),
                'jumlah'=>$this->input->post('jumlah'),
                'tgl_pinjam'=>$this->input->post('tgl_pinjam'),
                'tgl_kembali'=>$this->input->post('tgl_kembali'),
                'status'=>$this->input->post('status')
            );
            $this->db->insert('peminjaman', $data);
        }

        function getPinjamAll(){
            $this->db->where('status !=',"Kembali");
            $query = $this->db->get('peminjaman');
            return $query->result();
        }

        function getProsKembali(){
            $query = $this->db->query('SELECT * FROM `peminjaman` WHERE status = "Ada"');
            return $query->result();
        }

        function getPinjamByUser($id)
        {
            $this->db->where('status !=',"Kembali");
            $this->db->where('id_user',$id);
            $query = $this->db->get('peminjaman');
            return $query->result();
        }

        function getPinjamByID($id)
        {
            $this->db->where('status !=',"Kembali");
            $this->db->where('id_pinjam',$id);
            $query = $this->db->get('peminjaman');
            return $query->result();
        }

        function getHistoryByID($id)
        {
            $this->db->where('id_user',$id);
            $query = $this->db->get('peminjaman');
            return $query->result();
        }

        function prosesPinjam($id)
        {
            $action = $this->input->post('action');
            if($action == 'ada') {
                $data = array(
                    'admin_penerima'=>$this->input->post('admin_penerima'),
                    'status'=>'Ada',
                );
                $this->db->where('id_pinjam',$id);
                $this->db->update('peminjaman',$data);
            }
            if($action == 'habis') {
                $data = array(
                    'admin_penerima'=>$this->input->post('admin_penerima'),
                    'status'=>'Habis',
                );
                $this->db->where('id_pinjam',$id);
                $this->db->update('peminjaman',$data);
            }

        }

        function prosesKembali($id)
        {
            $data = array(
                'status'=>'Kembali',
            );
            $this->db->where('id_pinjam',$id);
            $this->db->update('peminjaman',$data);
        }

    }

    /* End of file Pinjam.php */

?>