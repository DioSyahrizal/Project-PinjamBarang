<?php $this->load->view('user/header');
$session_data = $this->session->userdata('logged in');
$data['id'] = $session_data['id'];
$data['name'] = $session_data['name'];
$data['status'] = $session_data['status'];
$data['departement'] = $session_data['departement'];
$data['manager'] = $session_data['manager'];
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
		<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					Request
				</div>
				<!-- /.panel-heading -->
				<?php if(empty($data['manager'])){ ?>
				<div class="panel-body">
					Manager belum disetting!
					<br>
					Lapor ke Super Admin terlebih dahulu
				</div>
				<?php } else { ?>

				<div class="panel-body">
					<div class="form-group">
						<label>Title</label>
						<input type="text" name="barang" class="form-control" id="barang" placeholder="Barang">
					</div>
					<div class="form-group">
						<label for="">ID Barang</label>
						<input type="text" name="id" id="id" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label for="">Nama Barang</label>
						<input type="text" name="nama_barang" id="nama_barang" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label for="">Store_Location</label>
						<input type="text" name="store_location" id="location" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label for="">Clasification</label>
						<input type="text" name="clasification" id="" class="form-control" disabled>
						<input type="hidden" name="date" id="date" value="<?php echo $tanggal2?>">
						<input type="hidden" name="requester" id="requester" value="<?php echo $data['name']  ?>">
						<input type="hidden" name="departement" id="departement" value="<?php echo $data['departement']  ?>">

					</div>
					<div class="form-group">
						<label for="">Quantity</label>
						<input type="text" name="quantity" id="quantity" class="form-control">
					</div>

					<button type="button" id="btn" name="add_cart" class="btn btn-success add_cart"
                                data-barangid=""
								data-barangnama=""
                                data-location=""
								data-requester="<?php echo $data['name'] ?>"
								data-date="<?php echo $tanggal2 ?>"
								data-departement="<?php echo $data['departement'] ?>">Add to Cart</button>
					<!-- /.panel-body -->
				</div>

				<!-- /.panel -->
			</div>


			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
		<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					Cart
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body" id="cart_details">
					Empty
					<!-- /.panel-body -->
				</div>
				<?php echo form_open_multipart('User/addRequest');?>
				<?php echo validation_errors(); ?>
					<input type="hidden" name="tanggal_request" value="<?php echo $tanggal2 ?>">
					<input type="hidden" name="requester" value="<?php echo $data['name'] ?>">
					<input type="hidden" name="departement" value="<?php echo $data['departement'] ?>">
					<input type="hidden" name="manager" value="<?php echo $data['manager'] ?>">
					<button type="submit" id="submit" class="btn btn-primary btn-block">Request Barang</button>
				<?php echo form_close(); ?>
				<!-- /.panel -->
			</div><?php } ?>
			<!-- /.col-lg-12 -->
		</div>
	</div>
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>

<?php $this->load->view('user/footer');
?>
