<?php
class OfficeData {
	public static $tablename = "office";

	public function __construct(){
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (id, username, name, lastname, email, password, is_active, kind, created_at, gender, id_category, id_project, id_position) ";
		$sql .= "values (\"$this->id\",\"$this->username\",\"$this->name\",\"$this->lastname\",\"$this->email\",\"$this->password\",$this->is_active,$this->kind,$this->created_at,\"$this->gender\",\"$this->id_category\",\"$this->id_project\",\"$this->id_position\")";
		// var_dump($sql);
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id_office=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id_office=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",email=\"$this->email\",lastname=\"$this->lastname\",username=\"$this->username\",is_active=$this->is_active,kind=$this->kind where id=$this->id";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new OfficeData());
	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by descripcion";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OfficeData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new OfficeData());
	}


}

?>