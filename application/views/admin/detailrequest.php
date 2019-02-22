<?php
$this->load->view('admin/header');
$session_data = $this->session->userdata('logged in');
$data['name'] = $session_data['name'];
$data['status'] = $session_data['status'];


?>

<div id="page-wrapper">
	<!-- <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Barang</h1>
                </div>
            </div> -->
	<!-- /.row -->
	<br>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Request List
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
                            <th>ID</th>
								<th>Requester</th>
								<th>Tools/Device</th>
								<th>Quantity</th>
								<th>Request Date</th>
								<th>Approval Date</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
                        <?php foreach ($pinjam as $key) { ?>
                            <tr>
                                <td><?php echo $key->id_request ?></td>
                                <td><?php echo $key->nama_requester ?></td>
                                <td><?php echo $key->barang ?></td>
                                <td><?php echo $key->jumlah ?></td>
                                <td><?php echo $key->tgl_request ?></td>
                                <td><?php echo $key->tgl_acc ?></td>
                                <td><?php echo $key->status ?></td>
                            </tr>
                        <?php } ?>
						</tbody>
					</table>

                    <?php echo form_open_multipart('admin/prosespinjam/'.$this->uri->segment(3)); ?>
					<?php echo validation_errors(); ?>
					<input type="hidden" name="nama_barang" id="nama_barang" value="<?php echo $pinjam[0]->barang ?>">

					<?php
						if($pinjam[0]->admin1_acc == 1 && $pinjam[0]->admin2_acc == 1 && $pinjam[0]->admin3_acc == 1){
							if($pinjam[0]->status !== 'Acc'){?>
							<button type="submit" name="action" value="acc" class="btn btn-primary btn-lg btn-block">Acc Barang</button>
						<?php }else{ ?>
							<div class="alert alert-info">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<strong>Sudah ter Acc</strong>
							</div>
						<?php }
						}else if($data['status'] == 'admin'){
							if($pinjam[0]->admin1_acc == '2'){
								return 0;
							}else{ ?>
								<button type="submit" name="action" value="accept" class="btn btn-success btn-lg btn-block"> Accept </button>
                    			<button type="submit" name="action" value="denied" class="btn btn-danger btn-lg btn-block"> Denied </button>
						<?php }
						}else if($data['status'] == 'admin2'){
							if($pinjam[0]->admin2_acc == '2'){
								return 0;
							}else{ ?>
								<button type="submit" name="action" value="accept" class="btn btn-success btn-lg btn-block"> Accept </button>
                    			<button type="submit" name="action" value="denied" class="btn btn-danger btn-lg btn-block"> Denied </button>
						<?php }
						}else if($data['status'] == 'admin3'){
							if($pinjam[0]->admin3_acc == '2'){
								return 0;
							}else{ ?>
								<button type="submit" name="action" value="accept" class="btn btn-success btn-lg btn-block"> Accept </button>
                    			<button type="submit" name="action" value="denied" class="btn btn-danger btn-lg btn-block"> Denied </button>
						<?php }
						}
					?>
					<?php echo form_close(); ?>
                    <!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /#page-wrapper -->

</div>
<!-- jQuery -->
<script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?=base_url()?>assets/vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="<?=base_url()?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?=base_url()?>assets/dist/js/sb-admin-2.js"></script>
</body>

</html>
