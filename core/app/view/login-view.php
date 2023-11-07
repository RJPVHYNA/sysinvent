<?php
	if(Session::getUID()!=""){
		print "<script>window.location='?view=home';</script>";
	}
?>
<style>
	body {
	-ms-flex-align: center;
	align-items: center;
	background-color: #e9ecef;
	display: -ms-flexbox;
	display: flex;
	-ms-flex-direction: column;
	flex-direction: column;
	height: 100vh;
	-ms-flex-pack: center;
	justify-content: center;
	min-height: 464.943px;
	
	background: url(dist/img/overlay.png), linear-gradient( rgba(128, 128, 128, 0.45), rgba(128, 128, 128, 0.45) ), url(dist/img/fondo.jpeg) fixed no-repeat center / cover;
	}
</style>
<div class="login-box">
	<div class="card card-outline card-primary">
		<div class="card-header text-center">
			<a href="./" class="h1"><b><img class="animation__shake" src="dist/img/logo.png" alt="LTELogo" height="" width="100"></b></a>
		</div>
		<div class="card-body">
			<p class="login-box-msg">Ingresa tus datos para iniciar sesión</p>
			
			<form method="post" action="?view=processlogin">
				<div class="input-group mb-3">
					<input type="text" id="mail" name="mail" class="form-control" placeholder="Usuario">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" id="password" name="password" class="form-control" placeholder="Contraseña">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<button type="submit" class="btn btn-primary btn-block">Iniciar Sesion</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

