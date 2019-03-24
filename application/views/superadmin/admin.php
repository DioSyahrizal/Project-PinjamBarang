<?php $this->load->view('superadmin/header');
?>

<body>
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"></h1>
			</div>
			<!-- /.col-lg-12 -->

			<ul class="tabs">
				<li class="tab-link current" data-tab="tab-1">Personal Information</li>
				<li class="tab-link" data-tab="tab-2">Change Password</li>
				<!-- <li class="tab-link" data-tab="tab-3">Tab Three</li>
				<li class="tab-link" data-tab="tab-4">Tab Four</li> -->
			</ul>

			<div id="tab-1" class="tab-content current">
				<?php echo form_open_multipart('Superadmin/update/'.$this->uri->segment(3)); ?>
				<?php echo validation_errors(); ?>

				<input type="hidden" name="id" value="<?php echo $list_user[0]->id ?>">
				<input type="hidden" name="username" value="<?php echo $list_user[0]->username ?>">
				<input type="hidden" name="status" value="<?php echo $list_user[0]->status ?>">

				<div class="form-group">
					<label for="">Name</label>
					<input type="text" class="form-control" id="name" name="name" value="<?php echo $list_user[0]->name ?>" disabled>
				</div>

				<div class="form-group">
					<label for="">Departement</label>
					<input type="text" class="form-control" id="departement" name="departement" value="<?php echo $list_user[0]->departement ?>"
					 disabled>
				</div>

				<div class="form-group">
					<label for="">Jabatan</label>
					<select name="jabatan" id="jabatan" class="form-control" require="required" disabled>
						<option value="">-- Jabatan --</option>
						<option value="user">User</option>
						<option value="Supervisor">Supervisor</option>
						<option value="Maintenance Engineer">Maintenance Engineer</option>
						<option value="Maintenance Manager">Maintenance Manager</option>
						<option value="Operational Manager">Operational Manager</option>
					</select>
				</div>

				<?php  if($list_user[0]->status == 'admin') {
					}else {?>
				<div class="form-group">
						<label for="">Manager Pengampu</label>
						<br>
						<select name="manager" id="manager" class="form-control" required="required" disabled>
							<option value="">-- Manager --</option>
							<option value=" ">Kosong</option>
							<?php foreach ($manager as $key) { ?>
								<option value="<?php echo $key->username ?>"><?php echo $key->username ?></option>
							<?php } ?>
						</select>
				</div>
				<?php } ?>
				<div class="form-group button">
					<button type="submit" class="btn btn-success" id="submit" disabled>Submit</button>
					<button type="button" class="btn btn-warning" id="update">Update</button>
					<button type="button" class="btn btn-danger" id="cancel">Cancel</button>
				</div>
				<?php echo form_close(); ?>

			</div>
			<div id="tab-2" class="tab-content">
				<?php echo form_open_multipart('Superadmin/updatePassword/'.$this->uri->segment(3)); ?>
				<?php echo validation_errors(); ?>

				<div class="form-group">
					<label for="">Password</label>
					<input type="password" class="form-control" id="password" name="password">
				</div>

				<div class="form-group">
					<label for="">Confirm Password</label>
					<input type="password" class="form-control" id="confirm_password" name="confirm_password">
				</div>

				<div class="form-group button">
					<button type="submit" class="btn btn-success" id="submit">Submit</button>
				</div>
				<?php echo form_close(); ?>

			</div>
			<!-- <div id="tab-3" class="tab-content">
				Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
				aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
			</div>
			<div id="tab-4" class="tab-content">
				Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
				exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
			</div> -->

		</div>
		<!-- /.row -->

		<!-- /.row -->
	</div>
	<!-- /#page-wrapper -->

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

	<!-- Custom Theme JavaScript -->
	<script src="<?=base_url()?>assets/dist/js/sb-admin-2.js"></script>

	<script>
		$(document).ready(function () {
			// Initialize select2
			$('#cancel').hide();
			$("#update").click(function (e) {
				$("input").prop('disabled', false);
				$('#submit').prop('disabled', false);
				$('#jabatan').prop('disabled', false);
				$('#manager').prop('disabled', false);
				$(this).hide();
				$('#cancel').show();
			});
			$('#cancel').click(function () {
				$("input").prop('disabled', true);
				$('#submit').prop('disabled', true);
				$('#jabatan').prop('disabled', true);
				$('#manager').prop('disabled', true);
				$(this).hide();
				$('#update').show();
			});
			$('ul.tabs li').click(function () {
				var tab_id = $(this).attr('data-tab');

				$('ul.tabs li').removeClass('current');
				$('.tab-content').removeClass('current');

				$(this).addClass('current');
				$("#" + tab_id).addClass('current');
			});
		});

	</script>
</body>

</html>

?>
