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

        function getrequestAll(){
            $query = $this->db->get('request');
            return $query->result();
        }

        function getProsKembali(){
            $query = $this->db->query('SELECT * FROM `request` WHERE status = "Ada"');
            return $query->result();
        }

        function getrequestByUser($id)
        {
            $this->db->where('id_user',$id);
            $query = $this->db->get('request');
            return $query->result();
        }

        function getrequestByID($id)
        {
            $this->db->where('id_request',$id);
            $query = $this->db->get('request');
            return $query->result();
        }

        function getHistoryByID($id)
        {
            $this->db->where('id_user',$id);
            $query = $this->db->get('request');
            return $query->result();
        }

        function cek_barang($teks)
        {
            $kata_kotor = array(",");
            $hasil = 0;
            $jml_kata = count($kata_kotor);

            for ($i=0;$i<$jml_kata;$i++)
                {
                if (stristr($teks,$kata_kotor[$i]))
                    { $hasil=1; }
                }
            return $hasil;
        }


        function prosesrequest($id)
        {
            date_default_timezone_set('Asia/Jakarta');
            $tanggal2=date('d-m-Y');
            if ($this->session->userdata('logged in')) {
                $action = $this->input->post('action');
                $session_data = $this->session->userdata('logged in');
                $data['status'] = $session_data['status'];
                if($action == 'acc'){
                    $acc = array(
                        'status' => 'Acc',
                        'tgl_acc'=> $tanggal2
                    );
                    $this->db->where('id_request', $id);
                    $this->db->update('request', $acc);
                    $barang= $this->input->post('nama_barang');
                    if($this->cek_barang($barang)){
                        $pisah = explode(", ",$barang);
                        for ($i=0; $i < count($pisah); $i++) {
                            $insertBarang = array(
                                'nama_barang' => $pisah[$i]
                            );
                            $this->db->insert('barang',$insertBarang);
                        }
                    }else {
                        $insertBarang = array(
                        'nama_barang' => $barang
                    );
                    $this->db->insert('barang',$insertBarang);
                    }
                }

                if($data['status'] == 'admin'){
                    if($action == 'accept') {
                        $isi = array(
                            'admin1_acc'=>'1',
                        );
                        $this->db->where('id_request',$id);
                        $this->db->update('request',$isi);
                    }
                    if($action == 'denied') {
                        $isi = array(
                            'admin1_acc'=>'2',
                        );
                        $this->db->where('id_request',$id);
                        $this->db->update('request',$isi);
                    }
                }else if($data['status'] == 'admin2'){
                    if($action == 'accept') {
                        $isi = array(
                            'admin2_acc'=>'1',
                        );
                        $this->db->where('id_request',$id);
                        $this->db->update('request',$isi);
                    }
                    if($action == 'denied') {
                        $isi = array(
                            'admin2_acc'=>'2',
                        );
                        $this->db->where('id_request',$id);
                        $this->db->update('request',$isi);
                    }
                }else if($data['status'] == 'admin3'){
                    if($action == 'accept') {
                        $isi = array(
                            'admin3_acc'=>'1',
                        );
                        $this->db->where('id_request',$id);
                        $this->db->update('request',$isi);
                    }
                    if($action == 'denied') {
                        $isi = array(
                            'admin3_acc'=>'2',
                        );
                        $this->db->where('id_request',$id);
                        $this->db->update('request',$isi);
                    }
                }
            }


        }

        function prosesKembali($id)
        {
            $data = array(
                'status'=>'Kembali',
            );
            $this->db->where('id_pinjam',$id);
            $this->db->update('request',$data);
        }

    }

    /* End of file Pinjam.php */

?>