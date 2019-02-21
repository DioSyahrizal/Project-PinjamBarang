<?php $this->load->view('admin/header');
?>

<div id="page-wrapper">
<br>
  	<div class="panel panel-default">
    	<div class="panel-heading">Add Tools/Device</div>
    		<div class="panel-body">

	    		<?php echo form_open_multipart('Admin/tambahbarang');?>
	    		<?php echo validation_errors(); ?>
				<div class="form-group">
					<label for="">Tools/Device Name: </label>
                    <input type="text" name="nama_barang" class="form-control" id="nama_barang" placeholder="Tools/Device Name">
				</div>
                <div class="form-group">
					<label for="" >Store Location</label>
					<input type="text" name="store_location" class="form-control" id="store_location" placeholder="Store Location">
				</div>
                <div class="form-group">
                    <label for="">Classification</label>
                    <input type="text" name="clasification" class="form-control" id="clasification" placeholder="Classificationification">
                </div>

				<button type="submit" class="btn btn-primary">Submit</button>
				<?php echo form_close(); ?>

			</div>
    	</div>
  	</div>
</div>

<?php $this->load->view('admin/footer');

?>