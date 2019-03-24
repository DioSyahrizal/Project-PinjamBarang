<?php
$this->load->view('admin/header');
$session_data = $this->session->userdata('logged in');
$data['status'] = $session_data['status'];
$data['jabatan'] = $session_data['jabatan'];
$jabatan = '';
	if($data['jabatan']=="Supervisor"){
		$jabatan="pilih_supervisor";
	}elseif ($data['jabatan']=="Maintenance Engineer") {
		$jabatan="pilih_engineer";
	}elseif($data['jabatan']=="Maintenance Manager"){
		$jabatan="pilih_manager";
	}elseif($data['jabatan']=="Operational Manager"){
		$jabatan="pilih_operational";
	}

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
								<th>Request Date</th>
								<th>Requester</th>
								<th>Departement</th>
								<th>Upvote</th>
								<th>Downvote</th>
								<th>Status</th>
								<th>Detail</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                        <?php foreach ($request as $key) { ?>
                            <tr>
                                <td><?php echo $key->id ?></td>
                                <td><?php echo $key->tanggal_request ?></td>
                                <td><?php echo $key->requester ?></td>
                                <td><?php echo $key->departement ?></td>
                                <td><?php echo $key->upvote ?></td>
								<td><?php echo $key->downvote ?></td>
								<td><?php echo $key->status ?></td>
								<td><a class="btn btn-primary btn-xs" href="<?=site_url()?>/Admin/detailRequest/<?php echo $key->id ?>">Detail</a>
								<?php if($key->upvote == 4){ ?>
									<td><a href="<?=site_url()?>/Admin/accRequest/<?php echo $key->id ?>"><button class="btn btn-success btn-xs">Acc</button></a></td>
								<?php }else if($key->downvote >= 1){ ?>
									<td><a href="<?=site_url()?>/Admin/declineRequest/<?php echo $key->id ?>"><button class="btn btn-danger btn-xs">Decline</button></a></td>
								<?php }else{ ?>
									<?php if($request[0]->$jabatan == 1){ ?>
											<td>Sudah vote</td>
									<?php }else{?>
										<?php echo form_open_multipart('Admin/actionRequest');?>
										<?php echo validation_errors(); ?>
												<input type="hidden" name="id" value="<?php echo $request[0]->id ?>">
												<input type="hidden" name="upvote" value="<?php echo $request[0]->upvote ?>">
												<input type="hidden" name="downvote" value="<?php echo $request[0]->downvote ?>">
												<input type="hidden" name="jabatan" value="<?php echo $jabatan ?>">
												<td><button type="submit" name="action" value="upvote" class="btn btn-warning btn-xs">Upvote</button>
												<button type="submit" name="action" value="downvote" class="btn btn-danger btn-xs">Downvote</button></td>
										<?php echo form_close(); ?>
									<?php } ?>
								<?php } ?>
							</tr>
                        <?php } ?>
						</tbody>

					</table>
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

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        "createdRow": function( row, data, dataIndex ) {
             if ( data[6] == "Proses Cek" ) {
                $(row).addClass('yellow');
            }else if(data[6] == "Ada"){
                $(row).addClass('green');
            }else if(data[6] == "Habis"){
                $(row).addClass('red');
            }

        },

    });
});
</script>

</body>

</html>
