<?php $this->load->view('superadmin/header');?>
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
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Number</th>
                                        <th>Tools/Device Name</th>
                                        <th>Store Location</th>
                                        <th>Classification</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
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
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url()?>assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?=base_url()?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url()?>assets/dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
			"processing":true,
			"serverSide":true,
            "lengthMenu":[[6,10,15,-1],[6,10,15,"All"]],
            "responsive": true,
            "ajax":{
				url : "<?php echo site_url('Admin/data_server/') ?>",
				type : "POST"
			},
			"columnDefs":
			[
				{
					"targets":0,
					"data":"code",
				},
				{
					"targets":1,
					"data":"nama_barang",
				},
				{
					"targets":2,
					"data":"store_location",
				},
				{
					"targets":3,
					"data":"clasification",
				},
                {
                    "targets":4,
                    "data":null,
					"searchable":false,
					"render":function(data,type,full,meta){
						return '<a class="btn btn-warning btn-xs" href="<?=site_url()?>/Superadmin/updateBarang/'+data["code"]+'">Edit</a>  <a class="btn btn-danger btn-xs" href="<?=site_url()?>/Superadmin/deleteBarang/'+data["code"]+'">Delete</a>';
					}
                },
			]
        });
    });
    </script>

</body>

</html>
