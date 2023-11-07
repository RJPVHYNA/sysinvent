<?php
class ProfileData {
	public static $tablename = "profile";


	public function __construct(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}
	
	public function add(){
	$sql = "insert into ".self::$tablename." (name) ";
	$sql .= "value (\"$this->name\")";
	Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\" where id=$this->id";
		Executor::doit($sql);
	}
	
	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProfileData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by name ASC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProfileData());

	}

	public static function getAllTipo(){
		$sql = "select * from tipo";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProfileData());

	}

	public static function getByTipo($id){
		$sql = "select * from tipo where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProfileData());

	}

	public static function getAllArqui(){
		$sql = "select * from arquitectura";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProfileData());

	}

	public static function getByArqui($id){
		$sql = "select * from arquitectura where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProfileData());

	}

	public static function getAllPantalla(){
		$sql = "select * from pantalla";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProfileData());

	}

	public static function getByPantalla($id){
		$sql = "select * from pantalla where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProfileData());

	}

	public static function getAllPolucion(){
		$sql = "select * from polucion";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProfileData());

	}

	public static function getByPolucion($id){
		$sql = "select * from polucion where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProfileData());

	}

	public static function getAllSO(){
		$sql = "select * from so";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProfileData());

	}

	public static function getBySO($id){
		$sql = "select * from so where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProfileData());

	}

	public static function getAllVersionO(){
		$sql = "select * from office";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProfileData());

	}

	public static function getByVersionO($id){
		$sql = "select * from office where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProfileData());

	}

}

?>