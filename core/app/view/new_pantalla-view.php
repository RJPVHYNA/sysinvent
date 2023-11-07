<?php

?>
<script src="assets\input-mask/jquery.inputmask.js"></script>
<script src="assets\input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="assets\input-mask/jquery.inputmask.extensions.js"></script>
<script src="assets\input-mask/jquery.inputmask.numeric.extensions.js"></script>
<script src="assets\input-mask/jquery.inputmask.js"></script>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header" data-background-color="blue">
				<h4 class="title">Nueva Pantalla</h4>
			</div>
			<div class="card-content table-responsive">
				<form class="form-horizontal" role="form" method="post" action="./?action=add_pantalla">
				<div class="form-group">
					<label for='inputEmail1' class='col-lg-2 control-label'>Marca:</label>
					<div class='col-lg-4'>
					<select name="marca" class="form-control" required>
						<option value=''>----SELECCIONE----</option>
						<?php 
						$Marca=MarcaData::getAll();
						foreach($Marca as $m):?>
						<option value="<?php echo $m->id; ?>"><?php echo $m->descripcion; ?></option>
						<?php endforeach; ?>
					</select>
					</div>
					<label for='inputEmail1' class='col-lg-2 control-label'>Modelo:</label>
					<div class='col-lg-4'>
					<input type='text' class="form-control" name='modelo' value='' placeholder="Modelo" required>
					</div>
					<label for='inputEmail1' class='col-lg-2 control-label'>Serial:</label>
					<div class='col-lg-4'>
					<input type='text' class="form-control" name='serial' placeholder="Serial" value='' required>
					</div>
					<label for='inputEmail1' class='col-lg-2 control-label'>Dimension:</label>
					<div class='col-lg-4'>
					<input type='text' class="form-control" name='dimension' placeholder="Dimension" value='' required>
					</div>
				</div>
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-4">
							<button type="submit" class="btn btn-default">Agregar Pantalla</button>
						</div>
					
				</form>
				<div class="col-lg-offset-2 col-lg-4">
					<form action="?view=pantallas" method="post" target="" id="FormularioExportacion">
						<button class="btn btn-default">Regresar<div class="ripple-container"></div></button>
					</form>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
  $("#mac_wifi").inputmask("##:##:##:##:##:##");
  $("#mac_ethernet").inputmask("##:##:##:##:##:##");
  $("#serial_so").inputmask("#####-#####-#####-#####-#####");
  $("#serial_office").inputmask("#####-#####-#####-#####-#####");
});
</script>