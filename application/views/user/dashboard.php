<?php $this->load->view('user/header');
$session_data = $this->session->userdata('logged in');
$data['id'] = $session_data['id'];

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
	<br>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					List Barang
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
					<thead>
							<tr>
                            <th></th>
								<th>Tools/Device</th>
								<th>Quantity</th>
								<th>Request Date</th>
								<th>Approval Date</th>
								<th>Adm1</th>
								<th>Adm2</th>
								<th>Adm3</th>
							</tr>
						</thead>
						<tbody>
                        <?php foreach ($tabel as $key) { ?>
                            <tr>
                                <td><?php echo $key->id_request ?></td>
                                <td><?php echo $key->barang ?></td>
                                <td><?php echo $key->jumlah ?></td>
                                <td><?php echo $key->tgl_request ?></td>
                                <td><?php echo $key->tgl_acc ?></td>
								<td><img src="<?=base_url(kode($key->admin1_acc))?>" width="30px" height="30px"></td>
								<td><img src="<?=base_url(kode($key->admin2_acc))?>" width="30px" height="30px"></td>
								<td><img src="<?=base_url(kode($key->admin3_acc))?>" width="30px" height="30px"></td>
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

<!-- Morris Charts JavaScript -->
<script src="<?=base_url()?>assets/vendor/raphael/raphael.min.js"></script>
<script src="<?=base_url()?>assets/vendor/morrisjs/morris.min.js"></script>
<script src="<?=base_url()?>assets/data/morris-data.js"></script>

<!-- DataTables JavaScript -->
<script src="<?=base_url()?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?=base_url()?>assets/dist/js/sb-admin-2.js"></script>
<script>
	$(document).ready(function () {
		$('#dataTables-example').DataTable({

			// "processing": true,
			// "serverSide": true,
			// "lengthMenu": [
			// 	[6, 10, 15, -1],
			// 	[6, 10, 15, "All"]
			// ],
			// "responsive": true,
			// "ajax": {
			// 	url: "<?php echo site_url('User/data_server/'.$data['id']) ?>",
			// 	type: "POST"
			// },
			// "columnDefs": [{
			// 		"targets": 0,
			// 		"data": "id_pinjam",
			// 	},
			// 	{
			// 		"targets": 1,
			// 		"data": "admin_penerima",
			// 	},
			// 	{
			// 		"targets": 2,
			// 		"data": "nama_peminjam",
			// 	},
			// 	{
			// 		"targets": 3,
			// 		"data": "barang",
			// 	},
			// 	{
			// 		"targets": 4,
			// 		"data": "jumlah",
			// 	},
			// 	{
			// 		"targets": 5,
			// 		"data": "tgl_pinjam",
			// 	},
			// 	{
			// 		"targets": 6,
			// 		"data": "tgl_kembali",
			// 	},
			// 	{
			// 		"targets": 7,
			// 		"data": "status",
			// 	},
			// ],
            "createdRow": function( row, data, dataIndex ) {
             if ( data[7] == "Proses Cek" ) {
                $(row).addClass('yellow');
            }else if(data[7] == "Ada"){
                $(row).addClass('green');
            }else if(data[7] == "Habis"){
                $(row).addClass('red');
            }
            }
        });
	});

</script>
</body>

</html>
