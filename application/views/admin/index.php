<?php $this->load->view('admin/header');
$session_data = $this->session->userdata('logged in');
$data['id']= $session_data['id'];
$data['name'] = $session_data['name'];
$data['status'] = $session_data['status'];
$data['jabatan'] = $session_data['jabatan'];
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <?php if( !$data['jabatan']) {?>
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Anda belum memiliki jabatan!</strong> Hubungi Superadmin
                </div>
                <?php } ?>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cog fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $countBarang[0]->count_barang ?></div>
                                    <div>Tools/Device List</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?=site_url()?>/Admin/tabel">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $countRequest[0]->count_request ?></div>
                                    <div>Tools/Device Request</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?=site_url()?>/Admin/request">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
				<div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-arrow-left fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $countReplace[0]->count_replace ?></div>
                                    <div>Tools/Device Replace</div>
                                </div>
                            </div>
                        </div>
                        <?php if($data['jabatan'] != 'Supervisor'){ ?>
                            <a href="#" onClick="alert('Hanya Super Admin dan Supervisor yang bisa mengakses Replace page!')">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                            </a>
                        <?php }else {?>
                        <a href="<?=site_url()?>/Admin/replace">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $countAdmin[0]->count_admin ?></div>
                                    <div>Admin List</div>
                                </div>
                            </div>
                        </div>
                        <a href="#" onClick="alert('Hanya Super Admin yang bisa melihat list Admin!')">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

<?php $this->load->view('admin/footer');?>