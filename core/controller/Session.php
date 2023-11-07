<?php

/**
* 1 de agosto del 2013
* Esta funcion contiene el nombre de los identificadores que se usaran como variables de session
* y tambien los setters y getters correspondientes.
**/

class Session{
	public static function setUID($uid){
		$_SESSION['id_user_sorteio'] = $uid;
		
	}

	public static function unsetUID(){
		if(isset($_SESSION['id_user_sorteio']))
			unset($_SESSION['id_user_sorteio']);
	}

	public static function issetUID(){
		if(isset($_SESSION['id_user_sorteio']))
			return true;
		else return false;
	}

	public static function getUID(){
		if(isset($_SESSION['id_user_sorteio']))
			return $_SESSION['id_user_sorteio'];
		else return false;
	}

}

?>