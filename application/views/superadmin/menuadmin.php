
<?php $this->load->view('superadmin/header');
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
					Admin List
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
                                <th>ID</th>
								<th>Username</th>
								<th>Name</th>
								<th>Departement</th>
								<th>Status</th>
								<th>Jabatan</th>
								<th>Update</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
                        <?php foreach ($listadmin as $key) { ?>
                            <tr>
                                <td><?php echo $key->id ?></td>
                                <td><?php echo $key->username ?></td>
                                <td><?php echo $key->name ?></td>
                                <td><?php echo $key->departement ?></td>
                                <td><?php echo $key->status ?></td>
								<td><?php echo $key->jabatan ?></td>
								<td><a class="btn btn-warning btn-xs" href="<?=site_url()?>/Superadmin/update/<?php echo $key->id ?>">Update</a></td>
								<?php if($key->status == 'superadmin') {?>
									<td><p>Cannot be deleted</p></td>
								<?php }else{?>
									<td><a class="btn btn-danger btn-xs" href="<?=site_url()?>/Superadmin/deleteUser/<?php echo $key->id ?>">Delete</a></td>
							<?php }
								?>

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


<?php $this->load->view('superadmin/footer');
?>