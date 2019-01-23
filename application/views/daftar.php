<?php $this->load->view('header'); ?>

<div class="login-form">
	<?php echo form_open_multipart('login/create');?>
	<?php echo validation_errors(); ?>
	<h2 class="text-center">Daftar</h2>
	<div class="form-group title">
		<label for="username">Username</label>
		<input type="text" class="form-control" name="username" required="required">
	</div>
	<div class="form-group">
		<label for="">Password</label>
		<input type="password" class="form-control" name="password" required="required">
	</div>
	<div class="form-group">
		<label for="Name">Name</label>
		<input type="text" class="form-control" name="name" required>
	</div>
	<div class="form-group">
		<label for="">Departement</label>
		<input type="text" class="form-control" name="departement" required>
		<input type="hidden" name="status" value="user">
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary btn-block button">Log in</button>
	</div>
	<?php echo form_close(); ?>
	<p class="text-center"><a href="#">Create an Account</a></p>

</div>

<?php $this->load->view('footer'); ?>
