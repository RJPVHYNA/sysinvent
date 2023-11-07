<?php
class View {
	public static function load($view){
		if(!isset($_GET['view'])){
			if(Core::$root==""){
				include "core/app/view/".$view."-view.php";
			}else if(Core::$root=="admin/"){
				include "core/app/".Core::$theme."/view/".$view."-view.php";				
			}
		}else{


			if(View::isValid()){
				if($_GET['view']<>"processlogin" and isset($_SESSION["id_user_sorteio"])){
					$url ="";
					if(Core::$root==""){
					$url = "core/app/view/".$_GET['view']."-view.php";
					}else if(Core::$root=="admin/"){
					$url = "core/app/".Core::$theme."/view/".$_GET['view']."-view.php";				
					}
						include $url;				
				}
				elseif ($_GET['view']=="processlogin"){
					$url ="";
					if(Core::$root==""){
					$url = "core/app/view/".$_GET['view']."-view.php";
					}else if(Core::$root=="admin/"){
					$url = "core/app/".Core::$theme."/view/".$_GET['view']."-view.php";				
					}
						include $url;
				}
				else{
					echo "<script>window.location='./';</script>";
				}
			}
			else{
				echo'  <script type="text/javascript" src="CC/jquery.min.js"></script>
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header twt-feed blue-bg">
										<h4 class="title"></h4>
									</div>
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
						</div>';
			}



		}
	}
	public static function isValid(){
		$valid=false;
		if(isset($_GET["view"])){
			$url ="";
			if(Core::$root==""){
			$url = "core/app/view/".$_GET['view']."-view.php";
			}else if(Core::$root=="admin/"){
			$url = "core/app/".Core::$theme."/view/".$_GET['view']."-view.php";				
			}
			if(file_exists($file = $url)){
				$valid = true;
			}
		}
		return $valid;
	}

	public static function Error($message){
		print $message;
	}

}



?>