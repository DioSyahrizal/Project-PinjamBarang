<?php $this->load->view('user/header');
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
					List Barang
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<h2>Form control: input</h2>
					<p>The form below contains two input elements; one of type text and one of type password:</p>
					<form>
						<div class="form-group">
							<label for="usr">Name:</label>
							<input type="text" class="form-control" id="usr">
						</div>
						<div class="form-group">
							<label for="pwd">Password:</label>
							<input type="password" class="form-control" id="pwd">
						</div>
                        <div class="form-group">
                            <label for="barang">Barang</label>
                            <select name="barang" id="selBarang" class="form-control" required="required">
                                <option value="">--Pilih Barang--</option>
                                <?php foreach($listbarang as $row){ ?>
                                <option value="<?= $row->nama_barang?>"><?php echo($row->nama_barang)?></option>
                                <?php } ?>
                            </select>
                        </div>
					</form>
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
