<?php 
	if(isset($_POST["id"])){ 
		$nombre_propiedad="";
		if($_POST["id"]=="profile"){ $datos = ProfileData::getAll(); $nombre_propiedad="Perfil"; }
		if($_POST["id"]=="position"){ $datos = PositionData::getAll(); $nombre_propiedad="Cargo"; }
		if($_POST["id"]=="category"){ $datos = CategoryData::getAll(); $nombre_propiedad="Area"; }
		if($_POST["id"]=="project"){ $datos = ProjectData::getAll(); $nombre_propiedad="Sede"; }
		?>
		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#crear_propiedad">Crear <?php echo $nombre_propiedad; ?></button>
		<hr>
		<table id="example" class="display compact cell-border table table-striped table-bordered" cellspacing="0" width="100%">
			<thead style="text-align: center;">
				<th>Nombre</th>
				<th>Editar</th>
			</thead>
			<?php foreach($datos as $d){ ?>
				<tr>
					<td><?php echo $d->name; ?></td>
					<td class="td-actions" style="text-align: center;">
						<a style='padding:2px 5px 2px 5px; color:white' class='btn btn-simple btn-warning' onclick='consultar_propiedad(<?php echo $d->id; ?>,"<?php echo $d->name; ?>");' ><i class='ti-pencil' aria-hidden='true'></i></a>
					</td>
				</tr>
			<?php }?>
		</table>
	<div class="modal fade" id="crear_propiedad" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<div class="col-md-4">
						<h4 class="modal-title" id="scrollmodalLabel">Crear <?php echo $nombre_propiedad; ?></h4>
					</div>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form class="form-horizontal" method="post" action="?action=addpropiedad" role="form">
					<div class="modal-body">
						<div class="row form-group">
							<label class="col-lg-2 control-label">Nombre</label>
							<div class="col-md-6">
								<input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
								<input type="hidden" name="propiedad" value="<?php echo $_POST["id"]; ?>">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary">Crear</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<button type="button" id="btn_editar_propiedad" style="display:none;" class="btn btn-info mb-1" data-toggle="modal" data-target="#editar_propiedad">Editar</button>
	<div class="modal fade" id="editar_propiedad" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<div class="col-md-4">
					<h4 class="modal-title" id="scrollmodalLabel">Consulta <?php echo $nombre_propiedad; ?></h4>
					</div>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form class="form-horizontal" method="post" action="?action=updatepropiedad" role="form">
					<div class="modal-body">
						<div class="row form-group">
							<label for="inputEmail1" class="col-lg-2 control-label">Codigo</label>
							<div class="col-md-4">
								<input type="text" name="id" id="id" class="form-control" placeholder="Codigo" value="" readonly>
							</div>
							<label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
							<div class="col-md-4">
								<input type="text" name="name" id="name" class="form-control"  value="" placeholder="Nombre" required>
								<input type="hidden" name="propiedad" value="<?php echo $_POST["id"]; ?>">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Actualizar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php } ?>
