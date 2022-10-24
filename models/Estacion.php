<?php

	include 'database.php';

	class Estacion extends DataBase
	{

		function listar(){
			return $this -> consulta("SELECT * FROM estaciones") -> fetch_all(MYSQLI_ASSOC);
		}

		function buscar($chipid){
			$response = $this -> consulta("SELECT * FROM estaciones WHERE chipId = '$chipid'");
			if ($response -> num_rows>0) {
					return $response -> fetch_all (MYSQLI_ASSOC);
			} else {
				return false;
			}
		}

		function info($chipid, $limit){	
			$response = $this -> consulta("
				SELECT * FROM tiempo 
				INNER JOIN estaciones ON tiempo.chipId = estaciones.chipId 
				WHERE tiempo.chipId = $chipid 
				ORDER BY tiempo.fecha desc limit $limit");
			if ($response -> num_rows>0) {
				return $response -> fetch_all (MYSQLI_ASSOC);
			} else {
				return false;
			}
		}

		function nueva(){
			if ($_SERVER['REQUEST_METHOD']=='POST') {
				$datos = $_POST;
				var_dump($datos);
			}
			return $this -> consulta("INSERT INTO estaciones ('chipId','ubicacion','apodo') VALUES ('".$datos['chipId']."','".$datos['ubicacion']."','".$datos['apodo']."')");
		}

		function insertarTiempo($datos){
			if($_SERVER['REQUEST_METHOD']!='POST'){
				return array("error" => "metodo invalido");
			} else {
				if (!$this -> buscar($datos['chipId'])){
					return array("error" => "chipId invalido");
				} else {
					$this -> consulta("INSERT INTO tiempo ('chipId','temperatura','humedad') VALUES ('".$datos['chipId']."','".$datos['temperatura']."','".$datos['humedad']."')");
					return $this -> db -> insert_id;
				}
			}
		}

		function visitas($chipId){
			$this -> consulta("UPDATE estaciones SET visitas = visitas + 1 WHERE chipId = $chipId");
		}
	}
?>