<?php $user = UserData::getById($_SESSION["id_user_sorteio"]);?>
<div class="row">
	<div class="col-lg-12">
		<div class="animated">
			<div class="card">
				<div class="card-header twt-feed blue-bg">
					<h4 class="title">DATOS PERSONALES</h4>
				</div>
				<div class="card-body">
					<div class="row form-group">
						<label for="" class="col-lg-6 control-label"><strong>Nit:</strong> <?php echo $user->id;?></label>
						<label for="" class="col-lg-6 control-label"><strong>Usuario:</strong> <?php echo $user->username;?></label>
						<label for="" class="col-lg-6 control-label"><strong>Nombres:</strong> <?php echo $user->name;?></label>
						<label for="" class="col-lg-6 control-label"><strong>Apellidos:</strong> <?php echo $user->lastname;?></label>
						<label for="" class="col-lg-6 control-label"><strong>Estado:</strong> <?php if($user->is_active==1){ echo "ACTIVO"; } ELSE { echo "INACTIVO"; }?></label>
						<label for="" class="col-lg-6 control-label"><strong>Correo:</strong> <?php echo $user->email;?></label>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header twt-feed blue-bg">
					<h4 class="title">CAMBIO DE CONTRASEÑA</h4>
				</div>
				<div class="card-body">
					<form class="form-horizontal" id="changepasswd" method="post" action="index.php?action=changepasswd" role="form">
						<div class="row form-group">
							<label for="" class="col-lg-12 control-label"><strong>Contraseña Actual:</strong></label>
							<div class="col-lg-12">
								<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña Actual" required>
							</div>
							<label for="" class="col-lg-12 control-label"><strong>Nueva Contraseña:</strong></label>
							<div class="col-lg-12">
								<input type="password" class="form-control"  id="newpassword" name="newpassword" placeholder="Nueva Contraseña" required>
							</div>
							<label for="" class="col-lg-12 control-label"><strong>Confirmar Nueva Contraseña:</strong></label>
							<div class="col-lg-12">
								<input type="password" class="form-control" id="confirmnewpassword" name="confirmnewpassword" placeholder="Confirmar Nueva Contraseña" required>
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-6">
								<input type="hidden" name="user_id" value="<?php echo $user->id;?>">
								<button type="submit" class="btn btn-info ">Guardar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>