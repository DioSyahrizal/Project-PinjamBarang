<?php
  $session_data = $this->session->userdata('logged in');
	$data['name'] = $session_data['name'];
	$data['status'] = $session_data['status'];

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Schneider Electric Indonesia | Cikarang Plant - Maintenance Division Website</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<link rel="shortcut icon" href="<?=base_url()?>assets/icon/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?=base_url()?>assets/icon/favicon.ico" type="image/x-icon">
	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css" />

	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/owl.theme.default.css" />

	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/magnific-popup.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Header -->
	<header id="home">
		<!-- Nav -->
		<!-- Background Image -->
		<div class="bg-img" style="background-image: url('<?=base_url()?>assets/img/schneider.png');">
			<div class="overlay"></div>
		</div>
		<nav id="nav" class="navbar nav nav-transparent">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a href="<?= site_url()?>/Welcome/">
							<img class="logo" src="<?=base_url()?>assets/img/logo.png" alt="logo">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Collapse nav button -->
					<div class="nav-collapse">
						<span></span>
					</div>
					<!-- /Collapse nav button -->
				</div>

				<!--  Main navigation  -->
				<ul class="main-nav nav navbar-nav">
					<li><a href="#home">Home</a></li>
				</ul>
				<ul class="main-nav nav navbar-nav navbar-right">
					<!-- <li><a href="#service">Services</a></li>
					<li><a href="#team">Team</a></li>
					<li><a href="#contact">Contact</a></li> -->
					<?php
           				if(!empty($data['name'])) {
					?>
					<li class="has-dropdown"><a href="#">
							<?php echo $data['name']?></a>
						<ul class="dropdown">
							<?php if($data['status'] == 'admin') {?>
							<li><a href="<?=site_url()?>/Admin/">Admin</a></li>
							<?php }else if($data['status'] == 'superadmin'){ ?>
							<li><a href="<?=site_url()?>/Superadmin/">Super Admin</a></li>
							<?php } else{ ?>
							<li><a href="<?=site_url()?>/User/">User</a></li>
							<?php } ?>
							<li><a href="<?=site_url()?>/Login/logout">Logout</a></li>
						</ul>
					</li>
					<?php } else{ ?>
					<li><a href="<?=site_url()?>/Login/daftar">Sign Up</a></li>
					<li><a href="<?=site_url()?>/Login/login">Login</a></li>
					<?php } ?>
				</ul>
				<!-- /Main navigation -->

			</div>
		</nav>
		<!-- /Nav -->

		<!-- /Background Image -->
		<!-- home wrapper -->
		<div class="home-wrapper">
			<div class="container">
				<div class="row">

					<!-- home content -->
					<div class="col-md-10 col-md-offset-1">
						<div class="home-content">
							<h1 class="white-text">Schneider Electric Indonesia</h1>
							<h2 class="white-text">- Cikarang Plant -</h2>
							<p class="white-text">Maintenance Division Website
							</p>
						</div>
					</div>
					<!-- /home content -->

				</div>
			</div>
		</div>
		<!-- /home wrapper -->

	</header>
	<!-- /Header -->

	<!-- Numbers -->
	<div id="numbers" class="section sm-padding">

		<!-- Background Image -->
		<div class="bg-img" style="background-image: url('./img/background2.jpg');">
			<div class="overlay"></div>
		</div>
		<!-- /Background Image -->

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- number -->
				<div class="col-sm-3 col-xs-6">
					<div class="number">
						<i class="fa fa-users"></i>
						<h3 class="white-text"><span class="counter">6</span></h3>
						<span class="white-text">Team Member</span>
					</div>
				</div>
				<!-- /number -->

				<!-- number -->
				<div class="col-sm-3 col-xs-6">
					<div class="number">
						<i class="fa fa-cogs"></i>
						<h3 class="white-text"><span class="counter">2</span></h3>
						<span class="white-text">Workshop</span>
					</div>
				</div>
				<!-- /number -->

				<!-- number -->
				<div class="col-sm-3 col-xs-6">
					<div class="number">
						<i class="fa fa-rocket"></i>
						<h3 class="white-text"><span class="counter">Fast</span></h3>
						<span class="white-text">Handling</span>
					</div>
				</div>
				<!-- /number -->

				<!-- number -->
				<div class="col-sm-3 col-xs-6">
					<div class="number">
						<i class="fa fa-file"></i>
						<h3 class="white-text"><span class="counter">2</span></h3>
						<span class="white-text">Monitoring System</span>
					</div>
				</div>
				<!-- /number -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Numbers -->

	<!-- Team -->
	<div id="team" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section header -->
				<div class="section-header text-center">
					<h2 class="title">Maintenance Division</h2>
				</div>
				<!-- /Section header -->

				<!-- team -->
				<div class="col-sm-4">
					<div class="team">
						<div class="team-img">
							<img class="img-responsive" src="<?=base_url()?>assets/img/team1.jpg" alt="">
							<div class="overlay">
							</div>
						</div>
						<div class="team-content">
							<h3>Haryono Mansur Harun</h3>
							<span>Manager</span>
						</div>
					</div>
				</div>
				<!-- /team -->

				<!-- team -->
				<div class="col-sm-4">
					<div class="team">
						<div class="team-img">
							<img class="img-responsive" src="<?=base_url()?>assets/img/team2.jpg" alt="">
							<div class="overlay">
							</div>
						</div>
						<div class="team-content">
							<h3>Joko Dwi Admawijaya</h3>
							<span>Supervisor</span>
						</div>
					</div>
				</div>
				<!-- /team -->

				<!-- team -->
				<div class="col-sm-4">
					<div class="team">
						<div class="team-img">
							<img class="img-responsive" src="<?=base_url()?>assets/img/team3.jpg" alt="">
							<div class="overlay">
							</div>
						</div>
						<div class="team-content">
							<h3>Ahmad Aminudin</h3>
							<span>Engineer</span>
						</div>
					</div>
				</div>
				<!-- /team -->

				<!-- team -->
				<div class="col-sm-4">
					<div class="team">
						<div class="team-img">
							<img class="img-responsive" src="<?=base_url()?>assets/img/team3.jpg" alt="">
							<div class="overlay">
							</div>
						</div>
						<div class="team-content">
							<h3>Toirin</h3>
							<span>Engineer</span>
						</div>
					</div>
				</div>
				<!-- /team -->

				<!-- team -->
				<div class="col-sm-4">
					<div class="team">
						<div class="team-img">
							<img class="img-responsive" src="<?=base_url()?>assets/img/team3.jpg" alt="">
							<div class="overlay">
							</div>
						</div>
						<div class="team-content">
							<h3>Rifki Muslih</h3>
							<span>Engineer</span>
						</div>
					</div>
				</div>
				<!-- /team -->

				<!-- team -->
				<div class="col-sm-4">
					<div class="team">
						<div class="team-img">
							<img class="img-responsive" src="<?=base_url()?>assets/img/team3.jpg" alt="">
							<div class="overlay">
							</div>
						</div>
						<div class="team-content">
							<h3>Aref Feri Pambudi</h3>
							<span>Engineer</span>
						</div>
					</div>
				</div>
				<!-- /team -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Team -->

	<!-- Contact -->
	<div id="contact" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section-header -->
				<div class="section-header text-center">
					<h2 class="title">Contact</h2>
				</div>
				<!-- /Section-header -->

				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-phone"></i>
						<h3>Phone/Fax.</h3>
						<p>(+62) (021) 897 0203-8</p>
						<p>(+62) (021) 897 0209, 897 0085</p>
					</div>
				</div>
				<!-- /contact -->

				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-envelope"></i>
						<h3>Email</h3>
						<p>SESA241209@schneider-electric.com</p>
					</div>
				</div>
				<!-- /contact -->

				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-map-marker"></i>
						<h3>Address</h3>
						<p>Pabrik Cikarang | Engineering & Manufacturing</p>
						<p>East Jakarta Industrial Park (EJIP), Plot 4B No.1-2, Lemah Abang, Bekasi 17550, Jawa Barat</p>
					</div>
				</div>
				<!-- /contact -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Contact -->


	<!-- Footer -->
	<footer id="footer" class="sm-padding bg-dark">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<div class="col-md-12">

					<!-- footer logo -->
					<div class="footer-logo">
						<a href="<?= site_url()?>/Welcome/"><img src="<?=base_url()?>assets/img/logo.png" alt="logo"></a>
					</div>
					<!-- /footer logo -->

					<!-- footer follow -->
					<ul class="footer-follow">
						<li><a href="http://facebook.com/SchneiderElectric"><i class="fa fa-facebook"></i></a></li>
						<li><a href="https://twitter.com/SchneiderElec"><i class="fa fa-twitter"></i></a></li>
						<li><a href="https://plus.google.com/+schneiderelectric/posts"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="https://instagram.com/schneiderelectric"><i class="fa fa-instagram"></i></a></li>
						<li><a href="https://www.linkedin.com/company/schneider-electric"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="https://www.youtube.com/user/SchneiderCorporate"><i class="fa fa-youtube"></i></a></li>
					</ul>
					<!-- /footer follow -->

					<!-- footer copyright -->
					<div class="footer-copyright">
						<p>Copyright © 2019. All Rights Reserved. Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
					</div>
					<!-- /footer copyright -->

				</div>

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</footer>
	<!-- /Footer -->

	<!-- Back to top -->
	<div id="back-to-top"></div>
	<!-- /Back to top -->

	<!-- Preloader -->
	<div id="preloader">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<!-- /Preloader -->

	<?php $this->load->view('footer.php');
	?>
