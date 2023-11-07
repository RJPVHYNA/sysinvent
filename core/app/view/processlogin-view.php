<?php
	if(Session::getUID()=="") {
		$user = $_POST['mail'];
		$pass = sha1(md5($_POST['password']));
		$base = new Database();
		$con = $base->connect();
		$sql = "select * from user where (email= \"".$user."\" or username= \"".$user."\") and password= \"".$pass."\" and is_active=1";
		$query = $con->query($sql);
		$found = false;
		$userid = null;
		while($r = $query->fetch_array()){
			$found = true ;
			$userid = $r['id'];
			$user = $r['username'];
			$profile = $r['id_profile'];
		}
		if($found==true) {
			$_SESSION['id_user_sorteio']=$userid ;
			$_SESSION['user_sorteio']=$user ;
			$_SESSION['profile_sorteio']=$profile ;
			$sql = "UPDATE user SET last_login=NOW() WHERE id=\"".$userid."\"";
			$query = $con->query($sql);
			print "<script>window.location='?view=home';</script>";
		}
		else {
			print "<script>window.location='?view=login';</script>";
		}
		
	}
	else{
		print "<script>window.location='?view=home';</script>";
		
	}
?>