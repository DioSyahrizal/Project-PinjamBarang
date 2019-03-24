<?php
$this->load->view('admin/header');
$session_data = $this->session->userdata('logged in');
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
								<th>Request Date</th>
								<th>Requester</th>
								<th>Departement</th>
								<th>Upvote</th>
								<th>Downvote</th>
								<th>Status</th>
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
             if ( data[6] == "Approved" ) {
                $(row).addClass('green');
            }else if(data[6] == "Decline"){
                $(row).addClass('red');
            }

        },

    });
});
</script>

</body>

</html>
