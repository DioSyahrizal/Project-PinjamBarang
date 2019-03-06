<?php $this->load->view('header'); ?>

<div class="login-form">
<?php echo form_open_multipart('login/cekLogin');?>
<?php echo validation_errors(); ?>
		<h2 class="text-center">Log in</h2>
		<div class="form-group">
			<input type="text" name="username" class="form-control" placeholder="Username" required="required">
		</div>
		<div class="form-group">
			<input type="password" name="password" class="form-control" placeholder="Password" required="required">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block">Log in</button>
		</div>
	</form>
	<p class="text-center"><a href="<?= site_url()?>/Login/daftar">Create an Account</a></p>

</div>
<?php echo form_close(); ?>
<?php $this->load->view('footer'); ?>
