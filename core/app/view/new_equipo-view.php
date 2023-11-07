<?php

?>
<script src="assets/input-mask/jquery.inputmask.js"></script>
<script src="assets/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="assets/input-mask/jquery.inputmask.extensions.js"></script>
<script src="assets/input-mask/jquery.inputmask.numeric.extensions.js"></script>
<script src="assets/input-mask/jquery.inputmask.js"></script>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header" data-background-color="blue">
				<h4 class="title">Nuevo Equipo</h4>
			</div>
			<div class="card-content table-responsive">
				<form class="form-horizontal" role="form" method="post" action="./?action=add_equipo">
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
					<label for='inputEmail1' class='col-lg-2 control-label'>Procesador:</label>
					<div class='col-lg-4'>
					<input type='text' class="form-control" name='procesador' placeholder="Procesador" value='' required>
					</div>
					<label for='inputEmail1' class='col-lg-2 control-label'>RAM:</label>
					<div class='col-lg-4'>
					<select name="ram" class="form-control" required>
						<option value=''>----SELECCIONE----</option>
						<option value='1 GB'>1 GB</option>
						<option value='2 GB'>2 GB</option>
						<option value='3 GB'>3 GB</option>
						<option value='4 GB'>4 GB</option>
						<option value='8 GB'>8 GB</option>
						<option value='16 GB'>16 GB</option>
						<option value='32 GB'>32 GB</option>
						<option value='64 GB'>64 GB</option>
					</select>
					</div>
					<label for='inputEmail1' class='col-lg-2 control-label'>Capacidad Disco Duro:</label>
					<div class='col-lg-4'>
					<select name="disco_duro" class="form-control" required>
						<option value=''>----SELECCIONE----</option>
						<option value='80 GB'>80 GB</option>
						<option value='160 GB'>160 GB</option>
						<option value='250 GB'>250 GB</option>
						<option value='320 GB'>320 GB</option>
						<option value='500 GB'>500 GB</option>
						<option value='750 GB'>750 GB</option>
						<option value='900 GB'>900 GB</option>
						<option value='1 TB'>1 TB</option>
						<option value='2 TB'>2 TB</option>
						<option value='4 TB'>4 TB</option>
						<option value='8 TB'>8 TB</option>
					</select>
					</div>
					<label for='inputEmail1' class='col-lg-2 control-label'>Serial:</label>
					<div class='col-lg-4'>
					<input type='text' class="form-control" name='serial' value='' placeholder="Serial" required>
					</div>
					<label for='inputEmail1' class='col-lg-2 control-label'>Activo Fijo:</label>
					<div class='col-lg-4'><input type='text' class="form-control" name='activo_fijo' value='' required>
					</div>
					<label for='inputEmail1' class='col-lg-2 control-label'>MAC Ethernet:</label>
					<div class='col-lg-4'>
					<input type='text' class="form-control" id='mac_ethernet' name='mac_ethernet' placeholder="MAC Ethernet" value='' required>
					</div>
					<label for='inputEmail1' class='col-lg-2 control-label'>MAC Wi-Fi:</label>
					<div class='col-lg-4'>
					<input type='text' class="form-control" id='mac_wifi' name='mac_wifi' placeholder="MAC Wi-Fi" value='' required>
					</div>
					<label for='inputEmail1' class='col-lg-2 control-label'>Nombre Host:</label>
					<div class='col-lg-4'>
					<input type='text' class="form-control" name='hostname' placeholder="Nombre Host" value='' required>
					</div>
					<label for='inputEmail1' class='col-lg-2 control-label'>Fecha Compra:</label>
					<div class='col-lg-4'>
					<input type='date' class="form-control" name='fecha_compra' placeholder="Fecha Compra" value='' required>
					</div>
					<label for='inputEmail1' class='col-lg-2 control-label'>Fecha Fin de Garantia:</label>
					<div class='col-lg-4'>
					<input type='date' class="form-control" name='fecha_fin_garantia' placeholder="Fecha Fin de Garantia" value='' required>
					</div>
					<label for='inputEmail1' class='col-lg-2 control-label'>Tipo:</label>
					<div class='col-lg-4'>
					<select name="id_tipo" class="form-control" required>
						<option value=''>----SELECCIONE----</option>
						<?php 
						$Type=TypeData::getAll();
						foreach($Type as $t):?>
						<option value="<?php echo $t->id; ?>"><?php echo $t->descripcion; ?></option>
						<?php endforeach; ?>
					</select>
					</div>
					<label for='inputEmail1' class='col-lg-2 control-label'>Sistema Operativo:</label>
					<div class='col-lg-4'>
					<select name="id_so" class="form-control" required>
						<option value=''>----SELECCIONE----</option>
						<?php 
						$so=SistemaData::getAll();
						foreach($so as $s):?>
						<option value="<?php echo $s->id; ?>"><?php echo $s->descripcion; ?></option>
						<?php endforeach; ?>
					</select>
					</div>
					<label for='inputEmail1' class='col-lg-2 control-label'>Serial S.O.:</label>
					<div class='col-lg-4'>
					<input type='text' class="form-control" id='serial_so' name='serial_so' placeholder="Serial S.O." value='' required>
					</div>
					<label for='inputEmail1' class='col-lg-2 control-label'>Pantalla:</label>
					<div class='col-lg-4'>
					<select name="id_pantalla" class="form-control" required>
						<option value=''>----SELECCIONE----</option>
						<option value="1">N/A</option>
						<?php 
						$Pantalla=PantallaData::getAll();
						foreach($Pantalla as $p):?>
						<option value="<?php echo $p->id; ?>" ><?php echo $p->modelo; ?></option>
						<?php endforeach; ?>
					</select>
					</div>
					<label for='inputEmail1' class='col-lg-2 control-label'>Arquitectura:</label>
					<div class='col-lg-4'>
					<select name="id_arquitectura" class="form-control" required>
						<option value=''>----SELECCIONE----</option>
						<?php 
						$Arquitec=ArquitecData::getAll();
						foreach($Arquitec as $a):?>
						<option value="<?php echo $a->id; ?>"><?php echo $a->descripcion; ?></option>
						<?php endforeach; ?>
					</select>
					</div>
					<label for='inputEmail1' class='col-lg-2 control-label'>Version Office:</label>
					<div class='col-lg-4'>
					<select name="id_office" class="form-control" required>
						<option value=''>----SELECCIONE----</option>
						<?php 
						$Office=OfficeData::getAll();
						foreach($Office as $o):?>
						<option value="<?php echo $o->id; ?>"><?php echo $o->descripcion; ?></option>
						<?php endforeach; ?>
					</select>
					</div>
					<label for='inputEmail1' class='col-lg-2 control-label'>Serial Office:</label>
					<div class='col-lg-4'>
					<input type='text' class="form-control" id='serial_office' placeholder="Serial Office" name='serial_office' value='' required>
					</div>
					<label for='inputEmail1' class='col-lg-2 control-label'>Estado:</label>
					<div class='col-lg-4'>
					<select name="id_estado" class="form-control" required>
						<option value=''>----SELECCIONE----</option>
						<?php 
						$Status=StatusData::getAll();
						foreach($Status as $s):?>
						<option value="<?php echo $s->id; ?>"><?php echo $s->descripcion; ?></option>
						<?php endforeach; ?>
					</select>
					</div>
					<label for='inputEmail1' class='col-lg-2 control-label'>Clasificacion de Polucion:</label>
					<div class='col-lg-4'>
					<select name="id_polucion" class="form-control" required>
						<option value=''>----SELECCIONE----</option>
						<?php 
						$polucion=PolucionData::getAll();
						foreach($polucion as $p):?>
						<option value="<?php echo $p->id; ?>"><?php echo $p->descripcion; ?></option>
						<?php endforeach; ?>
					</select>
					</div>
					<label for='inputEmail1' class='col-lg-2 control-label'>Usuario:</label>
					<div class='col-lg-4'>
					<select name="id_user" class="form-control" required>
						<option value=''>----SELECCIONE----</option>
						<?php 
						$usuarios=UserData::getAll();
						foreach($usuarios as $u):?>
						<option value="<?php echo $u->id; ?>"><?php echo $u->name.' '.$u->lastname ; ?></option>
						<?php endforeach; ?>
					</select>
					</div>
				</div>
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-4">
							<button type="submit" class="btn btn-default">Agregar Equipo</button>
						</div>
					
				</form>
				<div class="col-lg-offset-2 col-lg-4">
					<form action="?view=equipos" method="post" target="" id="FormularioExportacion">
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