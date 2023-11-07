<?php

if(count($_POST)>0){
	$user = new UserData();
	$user->id = $_POST["id"];
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->username = $_POST["username"];
	$user->email = $_POST["email"];
	$user->id_profile = $_POST["id_profile"];
	$user->password = sha1(md5($_POST["password"]));
	//var_dump($user);
    $user->add();

print "<script>window.location='index.php?view=users';</script>";


}

?>