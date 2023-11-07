<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SYSINVENT</title>
    <meta name="description" content="SORTEIO">
    <meta name="viewport" content="width=device-width">
	<link rel="icon" type="image/png" href="favicon.png" sizes="32x32">
<link rel="stylesheet" href="assets/css/sweetalert.css">
<script src='assets/js/sweetalert.min.js'></script>
</head>
<?php
$resultado="error";
if(count($_POST)>0){
	$user = new EquiposData();
	$user->marca = $_POST['marca'];
	$user->modelo = $_POST['modelo'];
	$user->procesador = $_POST['procesador'];
	$user->ram = $_POST['ram'];
	$user->disco_duro = $_POST['disco_duro'];
	$user->serial = $_POST['serial'];
	$user->mac_ethernet = $_POST['mac_ethernet'];
	$user->mac_wifi = $_POST['mac_wifi'];
	$user->hostname = $_POST['hostname'];
	$user->fecha_compra = $_POST['fecha_compra'];
	$user->fecha_fin_garantia = $_POST['fecha_fin_garantia'];
	$user->id_tipo = $_POST['id_tipo'];
	$user->id_so = $_POST['id_so'];
	$user->serial_so = $_POST['serial_so'];
	$user->id_pantalla = $_POST['id_pantalla'];
	$user->id_arquitectura = $_POST['id_arquitectura'];
	$user->id_office = $_POST['id_office'];
	$user->serial_office = $_POST['serial_office'];
	$user->id_estado = $_POST['id_estado'];
	$user->id_polucion = $_POST['id_polucion'];
	$user->id_user = $_POST['id_user'];
	$user->activo_fijo = $_POST['activo_fijo'];
	$resultado=$user->add();
	echo $resultado;
	if($resultado=="ok"){
		echo'<script>

						swal({
							  title: "¡OK!",
							  text: "¡Se ha creado correctamente!",
							  type: "success",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
						},

						function(isConfirm){
								 if (isConfirm) {	   
								    window.location="./?view=equipos";
								  } 
						});


					</script>';
	}else{
		echo"error";
		echo'<script>

						swal({
							  title: "¡Error!",
							  text: "¡No se ha creado! por favor revise los datos ingresados",
							  type: "error",
							  confirmButtonText: "Volver a Intentar",
							  closeOnConfirm: false
						},

						function(isConfirm){
								 if (isConfirm) {	   
								    window.location="./?view=new_equipo";
								  } 
						});


					</script>';
	}
}
?>