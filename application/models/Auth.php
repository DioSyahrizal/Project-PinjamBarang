<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Auth extends CI_Model {

        public function login($username,$password){
            $this->db->select('id,username,password,name,status');
            $this->db->from('user');
            $this->db->where('username', $username);
            $this->db->where('password', MD5($password));
            $query=$this->db->get();
            if ($query->num_rows()==1) {
                return $query->result();
            }else{
                return false;
            }
        }

        public function insertUser(){
            $object = array('username'=>$this->input->post('username'),
                            'password'=>MD5($this->input->post('password')),
                            'name'=>$this->input->post('name'),
                            'departement'=>$this->input->post('departement'),
                            'status'=>$this->input->post('status')
                            );
            $this->db->insert('user',$object);
        }

        public function updateUser($id){
            $data = array(
                    'name'=>$this->input->post('name'),
                    'departement'=>$this->input->post('departement'),
            );
            $this->db->where('id',$id);
            $this->db->update('user',$data);
        }

        public function updatePassword($id){
            $data = array(
                'password'=>MD5($this->input->post('password')),
            );
            $this->db->where('id',$id);
            $this->db->update('user',$data);
        }

        public function getUser($id){
            $this->db->where('id', $id);
            $query = $this->db->get('user');
		    return $query->result();
        }

        public function getAllAdmin(){
            $this->db->where('status !=', "User");
            $query = $this->db->get('user');
            return $query->result();
        }


    }

    /* End of file Auth.php */

?>