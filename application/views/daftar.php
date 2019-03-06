<?php $this->load->view('header'); ?>
<div class="container">
	<section class="success" id="podcast">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-sm-3">
					<div class="card">
						<div class="card-content">
							<h4 class="card-title text-center">
								Sebagai User
							</h4>
							<!-- <p class="">
              </p> -->
						</div>
						<div class="card-read-more">
							<a class="btn btn-primary btn-block" data-toggle="modal" href='#modal-id'>User</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-sm-3">
					<div class="card">
						<div class="card-content">
							<h4 class="card-title text-center">
								Sebagai Admin
							</h4>
							<!-- <p class="">
              </p> -->
						</div>
						<div class="card-read-more">
							<a class="btn btn-success btn-block" data-toggle="modal" href='#modal-id2'>Admin</a>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>

<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				<?php echo form_open_multipart('login/createUser');?>
				<?php echo validation_errors(); ?>
				<h2 class="text-center">Sign Up</h2>
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
					<input type="hidden" name="status" value="user">
					<input type="hidden" name="jabatan" value="user">
				</div>

				<div class="form-group">
					<label for="">Departement</label>
					<br>
					<select name="departement" id="selDepart" class="form-control" required="required">
						<option value="">-- Departement --</option>
						<option value="ACB MCCB">ACB MCCB</option>
						<option value="Busbar">Busbar</option>
						<option value="Drawer">Drawer</option>
						<option value="FAT">FAT</option>
						<option value="Finishing PIX MCSet">Finishing PIX MCSet</option>
						<option value="FQC LV">FQC LV</option>
						<option value="FQC SM6">FQC SM6</option>
						<option value="LV">LV</option>
						<option value="LV Box">LV Box</option>
						<option value="MCSet">MCSet</option>
						<option value="Method">Method</option>
						<option value="Motorpact">Motorpact</option>
						<option value="PIX">PIX</option>
						<option value="Recloser">Recloser</option>
						<option value="RM6">RM6</option>
						<option value="SM6">SM6</option>
						<option value="Werehouse">Werehouse</option>
						<option value="SERE">SERE</option>
						<option value="Trainer">Trainer</option>
						<option value="Maintenance">Maintenance</option>
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary button">Log in</button>
				<button type="button" class="btn btn-default button" data-dismiss="modal">Close</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-id2">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Daftar Admin</h4>
			</div>
			<div class="modal-body">
				<?php echo form_open_multipart('login/createUser');?>
				<?php echo validation_errors(); ?>
				<h2 class="text-center">Admin</h2>
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
					<input type="hidden" name="status" value="admin">
				</div>

				<div class="form-group">
					<label for="">Departement</label>
					<select name="departement" id="selDepart" class="form-control" required="required">
						<option value="">-- Departement --</option>
						<option value="ACB MCCB">ACB MCCB</option>
						<option value="Busbar">Busbar</option>
						<option value="Drawer">Drawer</option>
						<option value="FAT">FAT</option>
						<option value="Finishing PIX MCSet">Finishing PIX MCSet</option>
						<option value="FQC LV">FQC LV</option>
						<option value="FQC SM6">FQC SM6</option>
						<option value="LV">LV</option>
						<option value="LV Box">LV Box</option>
						<option value="MCSet">MCSet</option>
						<option value="Method">Method</option>
						<option value="Motorpact">Motorpact</option>
						<option value="PIX">PIX</option>
						<option value="Recloser">Recloser</option>
						<option value="RM6">RM6</option>
						<option value="SM6">SM6</option>
						<option value="Werehouse">Werehouse</option>
						<option value="SERE">SERE</option>
						<option value="Trainer">Trainer</option>
						<option value="Maintenance">Maintenance</option>
					</select>
				</div>
				<div class="form-group">
					<label for="">Jabatan</label>
					<select name="jabatan" id="jabatan" class="form-control" require="required">
						<option value="">-- Jabatan --</option>
						<option value="Supervisor">Supervisor</option>
						<option value="Supervisor Maintenance">Supervisor Maintenance</option>
						<option value="Manager Maintenance">Manager Maintenance</option>
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary button">Daftar</button>
				<button type="button" class="btn btn-default button" data-dismiss="modal">Close</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>
