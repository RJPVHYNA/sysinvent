<?php
class PermisosData {
	public static $tablename = "permisos";


	public function __construct(){
	}
	
	public function add(){
	$sql = "insert into ".self::$tablename." (id_usuario,id_modulo,estado) ";
	$sql .= "value (\"$this->id_usuario\",\"$this->id_modulo\",1)";
	Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id_usuario=$this->id_usuario";
		Executor::doit($sql);
	}
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\" where id=$this->id";
		Executor::doit($sql);
	}
	
	public static function getById($id_modulo,$id_usuario){
		$sql = "select id_modulo from ".self::$tablename." where id_modulo=".$id_modulo." and id_usuario=".$id_usuario." ";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PermisosData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by name ASC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PermisosData());

	}
	
	public static function getModulos(){
		$sql = "select * from modulos order by id_menu ASC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PermisosData());
	}
	public static function getModulosByMenu($menu){
		$sql = "select * from modulos where id_menu=$menu order by name";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PermisosData());
	}
	public static function getMenu(){
		$sql = "select * from menu order by id ASC";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PermisosData());

	}


}

?>