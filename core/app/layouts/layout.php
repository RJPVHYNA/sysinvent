<html class="no-js" lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>SYSINVENT</title>
		<link rel="icon" type="image/png" href="favicon.png" sizes="32x32">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
		<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
		<link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
		<link rel="stylesheet" href="dist/css/adminlte.css">
		<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
		<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
		<link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
		<link rel="stylesheet" href="dist/css/font-awesome.min.css">
		<link rel="stylesheet" href="dist/css/themify-icons.css">
		<link rel="stylesheet" href="dist/css/pe-icon-7-filled.css">
		<link rel="stylesheet" href="dist/css/flag-icon.min.css">
	</head>
	<script>
		function e(q) { window.location='logout.php'; }
		function inactividad() { e("Inactivo!!"); console.log("Inactivo!!"); }
		var t=null;
		function contadorInactividad() { t=setTimeout("inactividad()",3300000); }
		window.onblur=window.onmousemove=function() { if(t) clearTimeout(t); contadorInactividad(); }
		window.onblur=window.onclick=function() { if(t) clearTimeout(t); contadorInactividad(); }
		window.onload=function() { if(t) clearTimeout(t); contadorInactividad(); }
	</script>
	<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
		<?php if(isset($_SESSION["id_user_sorteio"])):?>
		<?php $usuario=UserData::getById($_SESSION["id_user_sorteio"]); ?>
		<div class="wrapper">
			<div class="preloader flex-column justify-content-center align-items-center">
				<img class="animation__shake" src="dist/img/AdminLTELogo_black.png" alt="AdminLTELogo" height="60" width="60">
			</div>

			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
				<!-- Left navbar links -->
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
					</li>
				</ul>

				<!-- Right navbar links -->
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" data-widget="fullscreen" href="#" role="button">
							<i class="fas fa-expand-arrows-alt"></i>
						</a>
					</li>
					<!-- Notifications Dropdown Menu -->
					<li class="nav-item dropdown">
						<a class="nav-link" data-toggle="dropdown" href="#">
							<i class="far fa-user"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
							<span class="dropdown-item dropdown-header"><?php echo $usuario->name.' '.$usuario->lastname;?></span>
							<div class="dropdown-divider"></div>
							<a href="?view=configuration" class="dropdown-item">
								<i class="fas ti-settings mr-2"></i> Perfil Usuario
							</a>
							<div class="dropdown-divider"></div>
							<a href="logout.php" class="dropdown-item">
								<i class="fas ti-power-off mr-2"></i> Cerrar Sesion
							</a>
						</div>
					</li>
				</ul>
			</nav>
			<!-- /.navbar -->

			<!-- Main Sidebar Container -->
			<aside class="main-sidebar sidebar-dark-primary elevation-4">
				<!-- Brand Logo -->
				<a href="./" class="brand-link">
					<img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="max-height: 40px;">
					<span class="brand-text font-weight-light" style="font-size: 25px;"><img class="animation__shake" src="dist/img/nomada.png" alt="AdminLTELogo" height="" width="130" style="margin-top: 4px;"></span>
				</a>

				<!-- Sidebar -->
				<div class="sidebar">
					<!-- Sidebar user panel (optional) -->
					<div class="user-panel mt-3 pb-3 mb-3 d-flex">
						<div class="info">
							<a href="?view=configuration" class="d-block"><?php echo ucwords(strtolower($usuario->name));?></a>
						</div>
					</div>

					<!-- SidebarSearch Form -->
					<div class="form-inline">
						<div class="input-group" data-widget="sidebar-search">
							<input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search">
							<div class="input-group-append">
								<button class="btn btn-sidebar">
									<i class="fas fa-search fa-fw"></i>
								</button>
							</div>
						</div>
					</div>
					<nav class="mt-2">
						<ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
							<?php $menu = MenuData::getAll();  ?>
							<?php foreach($menu as $m){ ?>
								<?php if($m->id!=100){ ?>
									<?php $modulos = ModulosData::getModulosByMenu($m->id); ?>
									<?php $permiso=PermisosData::getById($m->id,$_SESSION['id_user_sorteio']); if($_SESSION['profile_sorteio']==1 || isset($permiso->id_modulo)){ ?>
										<li class="nav-item">
											<a href="./?view=<?php echo $m->view; ?>" class="nav-link"><i class="nav-icon fas <?php echo $m->icono; ?>"></i><p><?php echo ucwords(strtolower($m->name)); ?><?php if($modulos) { ?><i class="right fas fa-angle-left"></i><?php } ?></p></a>
											<?php if($modulos) { ?>
												<ul class="nav nav-treeview">
													<?php foreach($modulos as $modulo){ ?>
														<?php $permiso=PermisosData::getById($modulo->id,$_SESSION['id_user_sorteio']); if($_SESSION['profile_sorteio']==1 || isset($permiso->id_modulo)){ ?>
															<li class="nav-item"><a href="./?view=<?php echo $modulo->view; ?>" class="nav-link"><i class="far <?php echo $modulo->icono; ?> nav-icon"></i><p><?php echo ucwords(strtolower($modulo->name)); ?></p></a></li>
														<?php } ?>
													<?php } ?>
												</ul>
											<?php } ?>
										</li>
									<?php } ?>
								<?php } ?>
							<?php } ?>
						</ul>
					</nav>
				</div>
			</aside>
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<div class="content-header">
				  <div class="container-fluid">
					<div class="row mb-2">
					</div><!-- /.row -->
				  </div><!-- /.container-fluid -->
				</div>
				<!-- /.content-header -->

				<!-- Main content -->
				<section class="content">
					<div class="container-fluid">
						<?php View::load("login"); ?>
					</div>
				</section>
			</div>
		</div>
		<!-- jQuery -->
		<script src="plugins/jquery/jquery.min.js"></script>
		<!-- jQuery UI 1.11.4 -->
		<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
		  //$.widget.bridge('uibutton', $.ui.button)
		</script>
		<!-- Bootstrap 4 -->
		<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- ChartJS -->
		<script src="plugins/chart.js/Chart.min.js"></script>
		<!-- Sparkline -->
		<script src="plugins/sparklines/sparkline.js"></script>
		<!-- JQVMap 
		<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
		<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>-->
		<!-- jQuery Knob Chart -->
		<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
		<!-- daterangepicker -->
		<script src="plugins/moment/moment.min.js"></script>
		<script src="plugins/daterangepicker/daterangepicker.js"></script>
		<!-- Tempusdominus Bootstrap 4 -->
		<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
		<!-- Summernote -->
		<script src="plugins/summernote/summernote-bs4.min.js"></script>
		<!-- overlayScrollbars -->
		<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
		<!-- AdminLTE App -->
		<script src="dist/js/adminlte.js"></script>
		<!-- AdminLTE for demo purposes
		<script src="dist/js/demo.js"></script> -->
		<!-- AdminLTE dashboard demo (This is only for demo purposes) 
		<script src="dist/js/pages/dashboard.js"></script>-->
		<?php else:?>
		<?php View::load("login"); ?>
		<?php endif;?>
	</body>
</html>