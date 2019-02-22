<?php $this->load->view('user/header');
$session_data = $this->session->userdata('logged in');
$data['id'] = $session_data['id'];
$data['name'] = $session_data['name'];
$data['status'] = $session_data['status'];
date_default_timezone_set('Asia/Jakarta');
$tanggal2=date('d-m-Y');

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
					Tools/Device List
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="form-group">
						<label for="barang">Tools/Device</label>
						<select name="barang" id="selBarang" class="form-control" required="required">
							<option value="">-- List --</option>
							<?php foreach($listbarang as $row){ ?>
							<option value="<?= $row->nama_barang?>">
								<?php echo($row->nama_barang)?>
							</option>
							<?php } ?>
						</select>
					</div>
					<div class="alert alert-info">
						<strong>Information!</strong> If the tools/device you wanted is not on listed above, please write it down in the panel below!
					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>


			<div class="panel panel-default">
				<div class="panel-heading">
					Unregistered Tools/Device Request
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">

					<div class="alert alert-info">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Tips</strong> if you want to request several items, make sure to separate item with commas and spacebar<br>
						<i>Example: Item, Item2, Item3</i>
					</div>

					<?php echo form_open_multipart('User/pinjam');?>
					<?php echo validation_errors(); ?>

					<div class="form-group">
						<label for="barang">Tools/Device</label>
						<input type="hidden" name="nama_requester" id="" value="<?php echo $data['name']?>" >
						<input type="hidden" name="id_user" id="" value="<?php echo $data['id'] ?>">
						<input type="hidden" name="status" id="" value="Proses Cek">
						<input type="hidden" name="tgl_request" id="" value="<?php echo $tanggal2 ?>">
						<input class="form-control" type="text" name="barang" id="">
					</div>
					<div class="form-group">
						<label for="jumlah">Quantity</label>
						<input class="form-control" type="text" name="jumlah" id="">
					</div>
					<button type="submit" class="btn btn-primary">Request</button>

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

<?php $this->load->view('user/footer');
?>
