<?php
	class Action {
		public static function load($action){
			
			if(!isset($_GET['action'])){
				include "core/app/action/".$action."-action.php";
				}else{
				
				
				if(Action::isValid()){
					include "core/app/action/".$_GET['action']."-action.php";				
				}
				else{
					Action::Error('<head>
									<meta charset="utf-8">
									<meta name="viewport" content="width=device-width, initial-scale=1">
									<title>Nomada - Nomina Web Coltolima ltda.</title>
									<link rel="icon" type="image/png" href="favicon.png" sizes="32x32">
									<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
									<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
									<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
									<link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
									<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
									<link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
									<link rel="stylesheet" href="dist/css/adminlte.min.css">
									<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
									<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
									<link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
									<link rel="stylesheet" href="dist/css/font-awesome.min.css">
									<link rel="stylesheet" href="dist/css/themify-icons.css">
									<link rel="stylesheet" href="dist/css/pe-icon-7-filled.css">
									<link rel="stylesheet" href="dist/css/flag-icon.min.css">
								</head>
								<br><br>
								<div class="row">
									<div class="col-lg-12">
										<div class="card">
											<div class="card-body text-center">
												<img src="dist/img/404.png" alt="">
												<h1>¡PAGINA NO ENCONTRADA!</h1>
												<h3>La pagina que estas buscando no existe.</h3>
												<br>
												<h5 class="mt">Tal vez te interese alguna de estas paginas:</h5>
												<p><a href="./">Inicio</a> | <a href="./">Mapa del Sitio</a> | <a href="./"> Contacto</a></p>
											</div>
										</div>
									</div>
								</div>');
				}
				
				
				
			}
		}
		
		public static function isValid(){
			$valid=false;
			if(file_exists($file = "core/app/action/".$_GET['action']."-action.php")){
				$valid = true;
			}
			return $valid;
		}
		
		public static function Error($message){
			print $message;
		}
		
		public function execute($action,$params){
			$fullpath =  "core/app/action/".$action."-action.php";
			if(file_exists($fullpath)){
				include $fullpath;
				}else{
				assert("wtf");
			}
		}
		
	}
	
	
	
?>