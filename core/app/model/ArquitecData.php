<?php
class ArquitecData {
	public static $tablename = "arquitectura";


	public function __construct(){
	}

	public function add(){
		$sql = "insert into status (name) ";
		$sql .= "value (\"$this->name\")";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id_arquitectura=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id_arquitectura=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto StatusData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\" where id_arquitectura=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ArquitecData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by descripcion";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ArquitecData());

	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ArquitecData());
	}


}

?>