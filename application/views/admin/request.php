<?php
$this->load->view('admin/header');
$session_data = $this->session->userdata('logged in');
$data['status'] = $session_data['status'];


function kode($kode){
	if ($kode == '0') {
		return 'assets/icon/circle-outline.png';
	}else if($kode == '1'){
		return 'assets/icon/checked.png';
	}else{
		return 'assets/icon/error.png';
	}
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
                            <th></th>
								<th>Requester</th>
								<th>Tools/Device</th>
								<th>Quantity</th>
								<th>Request Date</th>
								<th>Approval Date</th>
								<th>Adm1</th>
								<th>Adm2</th>
								<th>Adm3</th>
								<th>Detail</th>
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
								<td><img src="<?=base_url(kode($key->admin1_acc))?>" width="30px" height="30px"></td>
								<td><img src="<?=base_url(kode($key->admin2_acc))?>" width="30px" height="30px"></td>
								<td><img src="<?=base_url(kode($key->admin3_acc))?>" width="30px" height="30px"></td>
								<td><a class="btn btn-primary btn-sm" href="<?=site_url()?>/Admin/detailRequest/<?php echo $key->id_request?>">Detail</a></td>
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
