<?php
class PantallaData {
	public static $tablename = "pantalla";


	public function __construct(){
	}

	public function add(){
		$sql = "insert into pantalla (id_marca, modelo, serial, dimension) ";
		$sql .= "value ('$this->marca','$this->modelo','$this->serial','$this->dimension')";
		//var_dump($sql);
		$var=Executor::doit($sql);
		if($var[0]==1){
			return $respuesta="ok";
		}else{
			return $respuesta="error";
		}
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id_pantalla=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id_pantalla=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto StatusData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\" where id_pantalla=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PantallaData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by modelo";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PantallaData());

	}
	public static function getAllit(){
		$sql = "SELECT * FROM pantalla p WHERE NOT EXISTS (SELECT id_pantalla FROM EQUIPO e where e.id_pantalla=p.id)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PantallaData());

	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PantallaData());
	}


}

?>