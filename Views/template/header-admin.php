<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="<?php echo BASE_URL;?>assets/images/favicon-32x32.png" type="image/png"/>
	<!--plugins-->
	<link href="<?php echo BASE_URL;?>assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="<?php echo BASE_URL;?>assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="<?php echo BASE_URL;?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?php echo BASE_URL;?>assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet"/>
	<!-- loader-->
	<link href="<?php echo BASE_URL;?>assets/css/pace.min.css" rel="stylesheet"/>
	<script src="<?php echo BASE_URL;?>assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?php echo BASE_URL;?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo BASE_URL;?>assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="<?php echo BASE_URL;?>assets/css/app.css" rel="stylesheet">
	<link href="<?php echo BASE_URL;?>assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/dark-theme.css"/>
	<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/semi-dark.css"/>
	<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/header-colors.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . 'assets/css/slick.min.css'; ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">


	<title><?php echo TITLE . ' - ' . $data['title'] ?><</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="<?php echo BASE_URL;?>assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Tienda Online</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
				</div>
			 </div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="<?php echo BASE_URL . 'admin/home'; ?>">
						<div class="parent-icon"><i class='bx bx-home-alt'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
					
				</li>

				
				<li>
					<a href="<?php echo BASE_URL . 'usuarios'; ?>">
						
						<div class="menu-title"><i class='fas fa-users'></i> Usuarios</div>
					</a>
				</li>
				<li>
					<a href="<?php echo BASE_URL . 'categorias'; ?>">
						
						<div class="menu-title"><i class='fas fa-tags'></i> Categorias</div>
					</a>
				</li>
				<li>
					<a href="<?php echo BASE_URL . 'productos'; ?>">
						
						<div class="menu-title"><i class='fas fa-list'></i> Productos</div>
					</a>
				</li>
				<li>
					<a href="<?php echo BASE_URL . 'pedidos'; ?>">
						
						<div class="menu-title"><i class='fas fa-bell'></i> Pedidos</div>
					</a>
				</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand gap-3">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					  <div class="top-menu ms-auto">
					</div>
					<div class="user-box dropdown px-3">
						<a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="<?php echo BASE_URL;?>assets_tmp/img/user.png" class="user-img" alt="user avatar">
							<div class="user-info">
    <p class="user-name mb-0">
        <?php echo isset($_SESSION['nombre_usuario']) ? $_SESSION['nombre_usuario'] : 'Invitado'; ?>
    </p>
    <p class="designattion mb-0">
        <?php echo isset($_SESSION['email']) ? $_SESSION['email'] : 'Correo no disponible'; ?>
    </p>
</div>

						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-user fs-5"></i><span>Profile</span></a>
							</li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item d-flex align-items-center" href="<?php echo BASE_URL . 'admin/salir';?>"><i class="bx bx-log-out-circle"></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">