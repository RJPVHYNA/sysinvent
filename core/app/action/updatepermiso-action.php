<?php

//var_dump($_POST);
if(count($_POST)>0){
	$user = new PermisosData();
	$user->id_usuario = $_POST["user_id"];
	$user->del();
	foreach($_POST as $id => $s){ 
		if($id!="user_id"){
		echo $id."=".$s;
		$user->id_modulo =  $id;
		$user->add();
		}
	}
	print "<script>window.location='index.php?view=permisos';</script>";
}

?>