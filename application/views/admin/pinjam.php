<?php $this->load->view('admin/header');
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
					List Pinjam
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
                            <th></th>
								<th>Peminjam</th>
								<th>Barang</th>
								<th>Jumlah</th>
								<th>Pinjam</th>
								<th>Kembali</th>
								<th>Status</th>
                                <th>Detail</th>
							</tr>
						</thead>
						<tbody>
                        <?php foreach ($pinjam as $key) { ?>
                            <tr>
                                <td><?php echo $key->id_pinjam ?></td>
                                <td><?php echo $key->nama_peminjam ?></td>
                                <td><?php echo $key->barang ?></td>
                                <td><?php echo $key->jumlah ?></td>
                                <td><?php echo $key->tgl_pinjam ?></td>
                                <td><?php echo $key->tgl_kembali ?></td>
                                <td><?php echo $key->status ?></td>
                                <td><a class="btn btn-primary btn-sm" href="<?=site_url()?>/Admin/detailPinjam/<?php echo $key->id_pinjam?>">Detail</a></td>
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
