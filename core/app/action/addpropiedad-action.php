<?php
	if(count($_POST)>0){
		if($_POST["propiedad"]=="profile"){ $dato = new ProfileData(); }
		if($_POST["propiedad"]=="position"){ $dato = new PositionData(); }
		if($_POST["propiedad"]=="category"){ $dato = new CategoryData(); }
		if($_POST["propiedad"]=="project"){ $dato = new ProjectData(); }
		$dato->name = $_POST["name"];
		$dato->add();
		print "<script>window.location='?view=users';</script>";
	}
?>