<?php $this->load->view('user/header');
?>

<div id="page-wrapper">
	<br>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Detail Request
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
					<thead>
							<tr>
								<th>ID</th>
								<th>ID Request</th>
								<th>Barang</th>
								<th>Qty</th>
								<th>Store Location</th>
							</tr>
						</thead>
						<tbody>
                        <?php foreach ($detail as $key) { ?>
                            <tr>
                                <td><?php echo $key->id ?></td>
                                <td><?php echo $key->id_request ?></td>
                                <td><?php echo $key->barang ?></td>
                                <td><?php echo $key->qty ?></td>
                                <td><?php echo $key->store_location ?></td>
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


<?php $this->load->view('user/footer');
?>