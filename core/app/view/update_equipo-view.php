<script src="assets/input-mask/jquery.inputmask.js"></script>
<script src="assets/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="assets/input-mask/jquery.inputmask.extensions.js"></script>
<script src="assets/input-mask/jquery.inputmask.numeric.extensions.js"></script>
<script src="assets/input-mask/jquery.inputmask.js"></script>
<?php 
$reservation = EquiposData::getById($_POST['id_equipo']);
// var_dump($reservation );
?>
<div class="row">
	<div class="col-md-12">

<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Modificar Equipo</h4>
  </div>
  <div class="card-content table-responsive">
<form class="form-horizontal" role="form" method="post" action="./?action=update_equipo">

  <div class="form-group">
    <label for='inputEmail1' class='col-lg-2 control-label'>Codigo:</label>
    <div class='col-lg-4'><input type='text' class="form-control" name='id' value='<?php echo $reservation->id; ?>' readonly>
    </div>
	<label for='inputEmail1' class='col-lg-2 control-label'>Marca:</label>
    <div class='col-lg-4'>
	<select name="marca" class="form-control" required>
		<?php 
		$Marca=MarcaData::getAll();
		foreach($Marca as $m):?>
		<option value="<?php echo $m->id; ?>" <?php if($m->id==$reservation->id_marca){ echo "selected"; }?>><?php echo $m->descripcion; ?></option>
		<?php endforeach; ?>
	</select>
    </div>
	<label for='inputEmail1' class='col-lg-2 control-label'>Modelo:</label>
    <div class='col-lg-4'><input type='text' class="form-control" name='modelo' value='<?php echo $reservation->modelo; ?>' required>
    </div>
	<label for='inputEmail1' class='col-lg-2 control-label'>Procesador:</label>
    <div class='col-lg-4'><input type='text' class="form-control" name='procesador' value='<?php echo $reservation->procesador; ?>' required>
    </div>
	<label for='inputEmail1' class='col-lg-2 control-label'>RAM:</label>
    <div class='col-lg-4'><input type='text' class="form-control" name='ram' value='<?php echo $reservation->ram; ?>' required>
    </div>
	<label for='inputEmail1' class='col-lg-2 control-label'>Capacidad Disco Duro:</label>
    <div class='col-lg-4'><input type='text' class="form-control" name='disco_duro' value='<?php echo $reservation->disco_duro; ?>' required>
    </div>
	<label for='inputEmail1' class='col-lg-2 control-label'>Serial:</label>
    <div class='col-lg-4'><input type='text' class="form-control" name='serial' value='<?php echo $reservation->serial; ?>' required>
    </div>
	<label for='inputEmail1' class='col-lg-2 control-label'>Activo Fijo:</label>
    <div class='col-lg-4'><input type='text' class="form-control" name='activo_fijo' value='<?php echo $reservation->activo_fijo; ?>' required>
    </div>
	<label for='inputEmail1' class='col-lg-2 control-label'>MAC Ethernet:</label>
    <div class='col-lg-4'><input type='text' class="form-control" id='mac_ethernet' name='mac_ethernet' value='<?php echo $reservation->mac_ethernet; ?>'required>
    </div>
	<label for='inputEmail1' class='col-lg-2 control-label'>MAC Wi-Fi:</label>
    <div class='col-lg-4'><input type='text' class="form-control" id='mac_wifi' name='mac_wifi' value='<?php echo $reservation->mac_wifi; ?>'required>
    </div>
	<label for='inputEmail1' class='col-lg-2 control-label'>Nombre Host:</label>
    <div class='col-lg-4'><input type='text' class="form-control" name='hostname' value='<?php echo $reservation->hostname; ?>'required>
    </div>
	<label for='inputEmail1' class='col-lg-2 control-label'>Fecha Compra:</label>
    <div class='col-lg-4'><input type='date' class="form-control" name='fecha_compra' value='<?php echo $reservation->fecha_compra; ?>'required>
    </div>
	<label for='inputEmail1' class='col-lg-2 control-label'>Fecha Fin de Garantia:</label>
    <div class='col-lg-4'><input type='date' class="form-control" name='fecha_fin_garantia' value='<?php echo $reservation->fecha_fin_garantia; ?>'required>
    </div>
	<label for='inputEmail1' class='col-lg-2 control-label'>Tipo:</label>
    <div class='col-lg-4'>
	<select name="id_tipo" class="form-control" required>
		<?php 
		$Type=TypeData::getAll();
		foreach($Type as $t):?>
		<option value="<?php echo $t->id; ?>" <?php if($t->id==$reservation->id_tipo){ echo "selected"; }?>><?php echo $t->descripcion; ?></option>
		<?php endforeach; ?>
	</select>
	</div>
	<label for='inputEmail1' class='col-lg-2 control-label'>Sistema Operativo:</label>
    <div class='col-lg-4'>
	<select name="id_so" class="form-control" required>
		<?php 
		$so=SistemaData::getAll();
		foreach($so as $s):?>
		<option value="<?php echo $s->id; ?>" <?php if($s->id==$reservation->id_so){ echo "selected"; }?>><?php echo $s->descripcion; ?></option>
		<?php endforeach; ?>
	</select>
	</div>
	<label for='inputEmail1' class='col-lg-2 control-label'>Serial S.O.:</label>
    <div class='col-lg-4'><input type='text' class="form-control" id='serial_so' name='serial_so' value='<?php echo $reservation->serial_so; ?>' required>
    </div>
	<label for='inputEmail1' class='col-lg-2 control-label'>Pantalla:</label>
    <div class='col-lg-4'>
	<select name="id_pantalla" class="form-control" required>
		<?php 
		$Pantalla=PantallaData::getAllit(); ?>
		<option value="1" selected>N/A</option>
		<option value="4" selected>GENERICA</option>
		<option value="<?php echo $reservation->id_pantalla; ?>" selected><?php $Pan=PantallaData::getById($reservation->id_pantalla); echo $Pan->modelo; ?></option>
		<?php foreach($Pantalla as $p):?>
		<option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->id_pantalla){ echo "selected"; }?>><?php echo $p->modelo; ?></option>
		<?php endforeach; ?>
	</select>
    </div>
	<label for='inputEmail1' class='col-lg-2 control-label'>Arquitectura:</label>
    <div class='col-lg-4'>
	<select name="id_arquitectura" class="form-control" required>
		<?php 
		$Arquitec=ArquitecData::getAll();
		foreach($Arquitec as $a):?>
		<option value="<?php echo $a->id; ?>" <?php if($a->id==$reservation->id_arquitectura){ echo "selected"; }?>><?php echo $a->descripcion; ?></option>
		<?php endforeach; ?>
	</select>
	</div>
	<label for='inputEmail1' class='col-lg-2 control-label'>Version Office:</label>
    <div class='col-lg-4'>
	<select name="id_office" class="form-control" required>
		<?php 
		$Office=OfficeData::getAll();
		foreach($Office as $o):?>
		<option value="<?php echo $o->id; ?>" <?php if($o->id==$reservation->id_office){ echo "selected"; }?>><?php echo $o->descripcion; ?></option>
		<?php endforeach; ?>
	</select>
	</div>
	<label for='inputEmail1' class='col-lg-2 control-label'>Serial Office:</label>
    <div class='col-lg-4'><input type='text' class="form-control" id='serial_office' name='serial_office' value='<?php echo $reservation->serial_office; ?>' required>
    </div>
	<label for='inputEmail1' class='col-lg-2 control-label'>Estado:</label>
		<div class='col-lg-4'>
		<select name="id_estado" class="form-control" required>
		<?php 
		$Status=StatusData::getAll();
		foreach($Status as $s):?>
		<option value="<?php echo $s->id; ?>" <?php if($s->id==$reservation->id_estado){ echo "selected"; }?>><?php echo $s->descripcion; ?></option>
		<?php endforeach; ?>
	</select>
		</div>
	<label for='inputEmail1' class='col-lg-2 control-label'>Clasificacion de Polucion:</label>
    <div class='col-lg-4'>
	<select name="id_polucion" class="form-control" required>
		<?php 
		$polucion=PolucionData::getAll();
		foreach($polucion as $p):?>
		<option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->id_polucion){ echo "selected"; }?>><?php echo $p->descripcion; ?></option>
		<?php endforeach; ?>
	</select>
	</div>
	<label for='inputEmail1' class='col-lg-2 control-label'>Usuario:</label>
    <div class='col-lg-4'>
	<select name="id_user" class="form-control" required>
		<?php 
		$usuarios=UserData::getAll();
		foreach($usuarios as $u):?>
		<option value="<?php echo $u->id; ?>" <?php if($u->id==$reservation->id_user){ echo "selected"; }?>><?php echo $u->name.' '.$u->lastname ; ?></option>
		<?php endforeach; ?>
	</select>
	</div>
	<label for='inputEmail1' class='col-lg-12 control-label'>Observacion:</label>
    <div class='col-lg-12'>
	<textarea name="observacion" class="form-control"><?php echo $reservation->observacion; ?></textarea>
	</div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-4">
		<input type="hidden" name="id" value="<?php echo $reservation->id; ?>">
		<button type="submit" class="btn btn-default">Actualizar Equipo</button>
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
// $(document).ready(function(){
  // $("#mac_wifi").inputmask("##:##:##:##:##:##");
  // $("#mac_ethernet").inputmask("##:##:##:##:##:##");
  // $("#serial_so").inputmask("#####-#####-#####-#####-#####");
  // $("#serial_office").inputmask("#####-#####-#####-#####-#####");
// });
</script>