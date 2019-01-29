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
					Pinjam Barang
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">

					<?php echo form_open_multipart('User/pinjam');?>
					<?php echo validation_errors(); ?>

					<div class="form-group">
						<label for="barang">Barang</label>
						<input type="hidden" name="nama_peminjam" id="" value="<?php echo $data['name']?>" >
						<input type="hidden" name="id_user" id="" value="<?php echo $data['id'] ?>">
						<input type="hidden" name="status" id="" value="Proses Cek">
						<input type="hidden" name="tgl_pinjam" id="" value="<?php echo $tanggal2 ?>">
						<select name="barang" id="selBarang" class="form-control" required="required">
							<option value="">--Pilih Barang--</option>
							<?php foreach($listbarang as $row){ ?>
							<option value="<?= $row->nama_barang?>">
								<?php echo($row->nama_barang)?>
							</option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="jumlah">Jumlah</label>
						<input class="form-control" type="text" name="jumlah" id="">
					</div>
					<div class="form-group">
						<label for="tglkembali">Tanggal Kembali</label>
						<input class="form-control" type="text" name="tgl_kembali" id="tgl" data-theme="my-style" data-modal="true"
						 data-large-mode="true" data-fx-mobile="true" data-format="d-m-Y">
					</div>
					<button type="submit" class="btn btn-primary">Pinjam</button>

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
