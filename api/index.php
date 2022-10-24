<?php
	header("Access-Control-Allow-Origin:*");
	header("Access-Control-Allow-Credentials:true");
	header("Access-Control-Allow-Methods:PUT,POST,DELETE,GET");
	header('Content-Type:Application/json');
	define("URL_BASE","/alumno/3765/app-estacion/api/");
	$request = explode("/",str_replace(URL_BASE,"",$_SERVER['REQUEST_URI']));
	$request = array_filter($request);
	if(!count($request)){
		echo json_encode(array("errno" => 404, "error" => "falta el modelo"));
	} else {
		$modelo = ucfirst(strtolower($request[0]));
		if (!file_exists("../models/".$modelo.".php")) {
			echo json_encode(array("errno" => 404, "error" => "el modelo no existe"));
		} else {
			if (!isset($request[1])) {
				echo json_encode(array("errno" => 404, "error" => "falta la funcion"));
			} else {
				include "../models/".$modelo.".php";
				$metodo = $request[1];
				if (!method_exists($modelo, $metodo)) {
					echo json_encode(array("errno" => 404, "error" => "la funcion no existe"));
				} else {
					if (!isset($request[2])) {
						$obj = new $modelo;
						$response = $obj -> $metodo();
					} else if (!isset($request[3])) {
						$obj = new $modelo;
						$response = $obj -> $metodo($request[2]);
					} else {
						$obj = new $modelo;
						$response = $obj -> $metodo($request[2],$request[3]);
					}
					echo json_encode($response);
				}
			}
		}
	}
?>