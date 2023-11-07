<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>soft - CRM Comercial Coltolima</title>
    <meta name="description" content="CRM Comercial Coltolima">
    <meta name="viewport" content="width=device-width">
	<link rel="icon" type="image/png" href="favicon.png" sizes="32x32">
<link rel="stylesheet" href="assets/css/sweetalert.css">
<script src='assets/js/sweetalert.min.js'></script>
</head>
<?php

if(isset($_POST["user_id"])){
	$user = UserData::getById($_POST["user_id"]);
	//$user->update();

	if($_POST["confirmnewpassword"]!=""){
		$user->password = sha1(md5($_POST["confirmnewpassword"]));
		$user->update_passwd();
		echo "Ok";
	?> <script>
		swal({
			title: "¡OK!",
			text: "¡Se ha actualizado La Contraseña!",
			type: "success",
			confirmButtonText: "Cerrar",
			closeOnConfirm: false
		},
		function(isConfirm){
			if (isConfirm) {	   
				window.location="./index.php?view=configuration";
			} 
		});
		</script>
<?php 
	}else{
		echo "Error";
	?> <script>
		swal({
			title: "¡Error!",
			text: "¡Se ha actualizado La Contraseña!",
			type: "error",
			confirmButtonText: "Cerrar",
			closeOnConfirm: false
		},
		function(isConfirm){
			if (isConfirm) {	   
				window.location="./index.php?view=configuration";
			} 
		});
		</script>
		<?php
	}

}else{
	echo "Error";
	?> <script>
		swal({
			title: "¡Error!",
			text: "¡No Se ha actualizado La Contraseña!",
			type: "error",
			confirmButtonText: "Cerrar",
			closeOnConfirm: false
		},
		function(isConfirm){
			if (isConfirm) {	   
				window.location="./index.php?view=configuration";
			} 
		});
		</script>
		<?php
}


?>