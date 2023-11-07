<?php
class KindData {
	public static $tablename = "kind";
	
	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new KindData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by name";
		$query = Executor::doit($sql);
		return Model::many($query[0],new KindData());
	}

}

?>