<?php
class CategoryData {
	public static $tablename = "category";


	public function __construct(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into category (name) ";
		$sql .= "value (\"$this->name\")";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto CategoryData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CategoryData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by name ASC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CategoryData());

	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CategoryData());
	}

	public static function getEstadoRefRep(){
		$sql = "select * from estado_ref_rep order by name ASC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CategoryData());
	}

	public static function getByIdRefRep($id){
		$sql = "select * from estado_ref_rep where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CategoryData());
	}

	public static function getAllCifra(){
		$sql = "select * from cifra where id != 3";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CategoryData());
	}

	public static function getCifra(){
		$sql = "select * from cifra where id = 3";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CategoryData());
	}

	public static function getAllRifas($id){
		$sql = "select * from numero_rifas where cifra=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CategoryData());
	}

}
?>