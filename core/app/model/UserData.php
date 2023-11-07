<?php
class UserData {
	public static $tablename = "user";

	public function __construct(){
		$this->name = "";
		$this->lastname = "";
		$this->username = "";
		$this->password = "";
		$this->is_active = "1";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (id, username, name, lastname, email, password, is_active, id_profile, created_at) ";
		$sql .= "values (\"$this->id\",\"$this->username\",\"$this->name\",\"$this->lastname\",\"$this->email\",\"$this->password\",1,$this->id_profile,NOW())";
		//var_dump($sql);
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "UPDATE ".self::$tablename." set is_active=2 where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto
	public function update(){
		$sql="UPDATE `user` 
		SET
		`username`=\"$this->username\",
		`name`=\"$this->name\",
		`lastname`=\"$this->lastname\",
		`email`=\"$this->email\",
		`is_active`=\"$this->is_active\",
		`id_profile`=\"$this->id_profile\" 
		WHERE id=$this->id";
		//echo $sql;
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select u.*,u.username as cargo from ".self::$tablename." u where u.id=$id";
		//echo $sql; 
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}
	public static function getBySede($id){
		$sql = "select * from ".self::$tablename." where id_project=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by name";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}
	
	public static function usuarios_bodega($sede){
		$sql = "select u.* from ".self::$tablename." u JOIN usuarios_bodegas b ON b.id_user = u.id where is_active=1 and id_bodega=".$sede." order by name";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}


}

?>