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
	$user = new PantallaData();
	$user->marca = $_POST['marca'];
	$user->modelo = $_POST['modelo'];
	$user->serial = $_POST['serial'];
	$user->dimension = $_POST['dimension'];
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
								    window.location="./index.php?view=pantallas";
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
								    window.location="./index.php?view=newpantalla";
								  } 
						});


					</script>';
	}
}
?>