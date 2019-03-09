<?php
$this->load->view('superadmin/header');
$session_data = $this->session->userdata('logged in');
$data['status'] = $session_data['status'];
$data['jabatan'] = $session_data['jabatan'];


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
					Replace List
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
					<thead>
							<tr>
								<th>ID</th>
								<th>Replace Date</th>
								<th>Replacer</th>
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
                                <td><?php echo $key->tanggal_replace ?></td>
                                <td><?php echo $key->replacer ?></td>
                                <td><?php echo $key->departement ?></td>
                                <td><?php echo $key->upvote ?></td>
								<td><?php echo $key->downvote ?></td>
								<td><?php echo $key->status ?></td>
								<td><a class="btn btn-primary btn-xs" href="<?=site_url()?>/Superadmin/detailReplace/<?php echo $key->id ?>">Detail</a>
                                <td><a href="<?=site_url()?>/Superadmin/deleteReplace/<?php echo $key->id ?>" class="btn btn-danger btn-xs">Delete</a></td>
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
