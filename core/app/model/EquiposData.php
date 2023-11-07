<?php
class EquiposData {
	public static $tablename = "equipo";

	public function __construct(){
		$this->id = "";
		$this->id_marca = "";
		$this->modelo = "";
		$this->procesador = "";
		$this->ram = "";
		$this->disco_duro = "";
		$this->serial = "";
	}
	public function add(){
		$sql = "INSERT INTO ".self::$tablename." (id_marca, modelo, procesador, ram, disco_duro, serial, mac_ethernet, mac_wifi, hostname, fecha_compra, fecha_fin_garantia, id_tipo, id_so, serial_so, id_pantalla, id_arquitectura, id_office, serial_office, id_estado, id_polucion, id_user, activo_fijo) ";
		$sql .= "values (\"$this->marca\",\"$this->modelo\",\"$this->procesador\",\"$this->ram\",\"$this->disco_duro\",\"$this->serial\",\"$this->mac_ethernet\",\"$this->mac_wifi\",\"$this->hostname\",\"$this->fecha_compra\",\"$this->fecha_fin_garantia\",\"$this->id_tipo\",\"$this->id_so\",\"$this->serial_so\",\"$this->id_pantalla\",\"$this->id_arquitectura\",\"$this->id_office\",\"$this->serial_office\",\"$this->id_estado\",\"$this->id_polucion\",\"$this->id_user\",\"$this->activo_fijo\")";
		//var_dump($sql);
		$var=Executor::doit($sql);
		if($var[0]==1){
			return $respuesta="ok";
		}else{
			return $respuesta="error";
		}
	}
	public function update(){
		$sql="UPDATE ".self::$tablename." SET `id_marca`=\"$this->marca\", `modelo`=\"$this->modelo\", `procesador`=\"$this->procesador\", `ram`=\"$this->ram\", `disco_duro`=\"$this->disco_duro\", `serial`=\"$this->serial\", `mac_ethernet`=\"$this->mac_ethernet\", `mac_wifi`=\"$this->mac_wifi\", `hostname`=\"$this->hostname\", `fecha_compra`=\"$this->fecha_compra\", `fecha_fin_garantia`=\"$this->fecha_fin_garantia\", `id_tipo`=\"$this->id_tipo\", `id_so`=\"$this->id_so\", `serial_so`=\"$this->serial_so\", `id_pantalla`=\"$this->id_pantalla\", `id_arquitectura`=\"$this->id_arquitectura\", `id_office`=\"$this->id_office\", `serial_office`=\"$this->serial_office\", `id_estado`=\"$this->id_estado\", `id_polucion`=\"$this->id_polucion\", `id_user`=\"$this->id_user\", `activo_fijo`=\"$this->activo_fijo\", `observacion`=\"$this->observacion\" WHERE id=$this->id";
		//var_dump($sql);
		$var=Executor::doit($sql);
		if($var[0]==1){
			return $respuesta="ok";
		}else{
			return $respuesta="error";
		}
	}
	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EquiposData());
	}
	public static function getById($id){
		$sql = "SELECT * FROM ".self::$tablename." WHERE id = $id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new EquiposData());
	}
}
?>