<?php
	class ModulosData {
		public static $tablename = "modulos";
		
		public function __construct(){
		}
	
		public function add(){
			$sql = "insert into ".self::$tablename." (id,name) ";
			$sql .= "value (\"$this->name\")";
			Executor::doit($sql);
		}
		
		public function update(){
			$sql = "update ".self::$tablename." set name=\"$this->name\" where id=$this->id";
			Executor::doit($sql);
		}
		
		public static function getAll(){
			$sql = "select * from ".self::$tablename." order by id ASC";
			$query = Executor::doit($sql);
			return Model::many($query[0],new PermisosData());
		}
		
		public static function getById($id){
			$sql = "select id_modulo from ".self::$tablename." where id=".$id."";
			$query = Executor::doit($sql);
			return Model::one($query[0],new MenuData());
		}
		
		public static function getModulosByMenu($menu){
			$sql = "select * from modulos where id_menu=$menu and id<>id_menu order by name";
			$query = Executor::doit($sql);
			return Model::many($query[0],new PermisosData());
		}
		
		
	}
	
?>