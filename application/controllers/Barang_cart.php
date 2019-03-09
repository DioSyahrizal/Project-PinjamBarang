<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Barang_cart extends CI_Controller {

        public function __construct()
	    {
            parent::__construct();
            $this->load->helper('url','form');
            $this->load->library('form_validation');
            $this->load->library('cart');
        }

        public function index()
        {

        }

        public function add()
        {
            $this->load->library('cart');
            $data = array(
                "id"            => $this->input->post('id'),
                "name"          => $this->input->post('nama_barang'),
                "location"      => $this->input->post('location'),
                "qty"           => $this->input->post('quantity'),
                "date"          => $this->input->post('date'),
                "requester"     => $this->input->post('requester'),
                "departement"   => $this->input->post('departement'),
                "price"         => 1
            );
            $this->cart->insert($data);
            echo $this->view();
        }

        public function view()
        {
            $this->load->library('cart');
            $output='';
            $output .= '
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <div align="right">
                        <button type="button" id="clear_cart" class="btn btn-warning">Clear Cart</button>
                    </div>
                    <br>
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Location</th>
                        <th>Quantity</th>
                        <th>Departement</th>
                        <th>Action</th>
                    </tr>
                </thead>

            ';
            $count = 0;
            foreach ($this->cart->contents() as $items) {
                $count++;
                $output .= '
                <tbody>
                            <tr>
                                <td>'.$items["name"].'</td>
                                <td>'.$items["location"].'</td>
                                <td>'.$items["qty"].'</td>
                                <td>'.$items["departement"].'</td>
								<td><button type="button" name="remove" class="btn btn-danger
                                btn-xs remove_inventory" id="'.$items["rowid"].'">Remove</button></td>
							</tr>

                ';
            }
            $output.='
                    </tbody>
				</table>
            ';
            if($count == 0){
                $output = '<h3 id="isicart" align="center">Cart is empty</h3>';
            }
            return $output;
        }

        public function load()
        {
            echo $this->view();
        }

        public function remove()
        {
            $this->load->library('cart');
            $row_id = $_POST["row_id"];
            $data = array(
                'rowid' => $row_id,
                'qty'   => 0
            );
            $this->cart->update($data);
            echo $this->view();
        }

        public function clear()
        {
            $this->load->library('cart');
            $this->cart->destroy();
            echo $this->view();
        }

    }

    /* End of file Barang_cart.php */

?>