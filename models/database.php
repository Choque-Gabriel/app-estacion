<?php

	include 'credenciales.php';

	class DataBase
	{

		public $db;

		public function conectar(){
			$this -> db = new mysqli(HOST,USER,PASSWORD,DB,PORT);
			if ($this -> db -> connect_error) {
				echo "sitio no disponible";
			}
		}

		public function consulta($sql){
			$this -> conectar();
			$result= $this -> db -> query($sql);
			if ($this -> db ->errno1=0) {
				echo "error".$conexion->error;
			}
			$this -> db -> close();
			return $result;
		}
	}

?>