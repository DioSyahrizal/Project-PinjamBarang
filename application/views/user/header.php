<?php
  $session_data = $this->session->userdata('logged in');
	$data['name'] = $session_data['name'];
	$data['jabatan'] = $session_data['jabatan'];
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>User - <?php echo $data['name'] ?></title>

	<link rel="shortcut icon" href="<?=base_url()?>assets/icon/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?=base_url()?>assets/icon/favicon.ico" type="image/x-icon">
	<!-- Bootstrap Core CSS -->
	<link href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">
	<!-- custom css -->
	<link href="<?=base_url()?>assets/vendor/datedropper/datedropper.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url()?>assets/css/my-style.css" rel="stylesheet" type="text/css" />
	<!-- Custom CSS -->
	<link href="<?=base_url()?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="<?=base_url()?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<style>

	.yellow {
        background-color: yellow !important;
    }
	.red {
        background-color: red !important;
        color: white;
    }
    .green {
    	background-color: green !important;
        color: white;
    }

</style>
	<div id="wrapper">

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?=site_url()?>/Admin">User Panel</a>
			</div>
			<!-- /.navbar-header -->

			<ul class="nav navbar-top-links navbar-right">

				<!-- /.dropdown -->
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-user fa-fw"></i> <?php echo $data['name'] ?> <i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-user">
						<li><a href="#"><i class="fa fa-user fa-fw"></i> Profile</a>
						</li>
						<li class="divider"></li>
						<li><a href="<?=site_url()?>/Login/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
						</li>
					</ul>
					<!-- /.dropdown-user -->
				</li>
				<!-- /.dropdown -->
			</ul>
			<!-- /.navbar-top-links -->

			<div class="navbar-default sidebar" role="navigation">
				<div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">
						<li>
							<a href=""><i class="fa fa-dashboard fa-fw"></i> Dashboard <span class="fa arrow"></a>
							<ul class="nav nav-second-level">
								<li>
									<a href="<?=site_url()?>/User/dashboard_request"><i class="fa fa-table fa-fw"></i> Request </a>
								</li>
								<li>
									<a href="<?=site_url()?>/User/dashboard_replace"><i class="fa fa-table fa-fw"></i> Replace </a>
								</li>
							</ul>
						</li>
						<li>
							<a href=""><i class="fa fa-table fa-fw"></i> Action<span class="fa arrow"></a>
                            <ul class="nav nav-second-level">
                                <li>
									<a href="<?=site_url()?>/User/index"><i class="fa fa-table fa-fw"></i> Tools/Device Request</a>
                                </li>
                                <li>
                                    <a href="<?=site_url()?>/User/replace"><i class="fa fa-table fa-fw"></i> Tools/Device Replace</a>
                                </li>
                            </ul>
                        </li>
						<li>
							<a href="<?=site_url()?>/User/history_request"><i class="fa fa-edit fa-fw"></i> Request History</a>
						</li>
						<li>
							<a href="<?=site_url()?>/User/history_replace"><i class="fa fa-edit fa-fw"></i> Replace History</a>
						</li>
						<!--<li>
							<a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a href="#">Second Level Item</a>
								</li>
								<li>
									<a href="#">Second Level Item</a>
								</li>
								<li>
									<a href="#">Third Level <span class="fa arrow"></span></a>
									<ul class="nav nav-third-level">
										<li>
											<a href="#">Third Level Item</a>
										</li>
										<li>
											<a href="#">Third Level Item</a>
										</li>
										<li>
											<a href="#">Third Level Item</a>
										</li>
										<li>
											<a href="#">Third Level Item</a>
										</li>
									</ul>
									<!-- /.nav-third-level
								</li>
							</ul>
							<!-- /.nav-second-level
						</li>-->
					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>
			<!-- /.navbar-static-side -->
		</nav>
