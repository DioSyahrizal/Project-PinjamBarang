<?php $this->load->view('admin/header');
?>

<body>
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Admin Profile</h1>
			</div>
			<!-- /.col-lg-12 -->

			<ul class="tabs">
				<li class="tab-link current" data-tab="tab-1">Personal Information</li>
				<li class="tab-link" data-tab="tab-2">Change Password</li>
				<!-- <li class="tab-link" data-tab="tab-3">Tab Three</li>
				<li class="tab-link" data-tab="tab-4">Tab Four</li> -->
			</ul>

			<div id="tab-1" class="tab-content current">
					<?php echo form_open_multipart('admin/update/'.$this->uri->segment(3)); ?>
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

					<div class="form-group button">
						<button type="submit" class="btn btn-success" id="submit" disabled>Submit</button>
						<button type="button" class="btn btn-warning" id="update">Update</button>
						<button type="button" class="btn btn-danger" id="cancel">Cancel</button>
					</div>
					<?php echo form_close(); ?>

			</div>
			<div id="tab-2" class="tab-content">
			<?php echo form_open_multipart('admin/updatePassword/'.$this->uri->segment(3)); ?>
					<?php echo validation_errors(); ?>

					<div class="form-group">
						<label for="">Password</label>
						<input type="password" class="form-control" id="password" name="password" >
					</div>

					<div class="form-group">
						<label for="">Confirm Password</label>
						<input type="password" class="form-control" id="confirm_password" name="confirm_password" >
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

	<?php $this->load->view('admin/footer');
?>
