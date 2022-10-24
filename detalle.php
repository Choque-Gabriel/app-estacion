<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/detalle.css">
	<title>Detalle</title>
</head>
<body>
	<div id="chipid">
		<?php
			echo $_GET['chipid'];
		?>
	</div>
		<header>
			<a href="https://mattprofe.com.ar/alumno/3765/app-estacion/panel.html" class="volver"><</a>
			<div class="seccion2">
				<div class="data__fecha"></div>
				<div class="data__ubicacion"></div>
			</div>
		</header>
		<div class="seccion3">
			<div class="boton" id="buttom-temperatura" onclick="verTemperatura()">
				<div class="icono termometro"></div>
				<div class="centrar data__maxtemperatura"></div>
			</div>
			<div class="boton" id="buttom-humedad" onclick="verHumedad()">
				<div class="icono agua"></div>
				<div class="centrar data__humedad"></div>
			</div>
		</div>

		<div class="contenedor">
			<div class="contenedor-paneles">	
				<div class="panel-temperatura">
					<div class="panel-col">
						<div class="col-items">
							<div class="item">
								<div class="item-title">
									TEMPERATURA
								</div>
							</div>
						</div>
						<div class="col-items">
							<div class="col-important bajar">
								<div class="important-val-int" id="data__temperatura__entero"> 00 </div>
								<div class="important-detail">
									<div class="important-val-unit"> ºC </div>
		 							<div class="important-val-dec" id="data__temperatura__decimal"> 00 </div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-humedad">
					<div class="panel-col">
						<div class="col-items">
							<div class="item">
								<div class="item-title centrar2">
									HUMEDAD
								</div>
							</div>
						</div>
	 					<div class="col-items">
	 						<div class="col-important bajar">
		 						<div class="important-val-int" id="data__humedad__entero">
		 							--
		 						</div>
								<div class="important-detail">
									<div class="important-val-unit">
		 								%
		 							</div>
		 							<div class="important-val-dec" id="data__humedad__decimal">
		 								--
		 							</div>	
		 						</div> 							
		 					</div>
	 					</div>
	 				</div>
				</div>
			</div>
		</div>
	<script type="text/javascript" src="js/detalle.js"></script>
</body>
</html>