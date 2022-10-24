const MAX_DATOS = 7;
const INTERVAL_REFRESH = 60000;

let botones = [
	["temperatura"],
	["humedad"],
]

document.addEventListener("DOMContentLoaded", function(event){
	addVisitStation();
	refreshDatos(MAX_DATOS);
	refreshId = setInterval(refreshDatos, INTERVAL_REFRESH, 1);	
})

function verTemperatura(){
	botones.forEach(function(botones, i){
		if (botones[0]=='temperatura'){
			document.querySelector(".panel-"+botones[0]).setAttribute("style","display: grid")
		} else {
			document.querySelector(".panel-"+botones[0]).setAttribute("style","display: none")
		}
	})
}

function verHumedad(){
	botones.forEach(function(botones, i){
		if (botones[0]=='humedad'){
			document.querySelector(".panel-"+botones[0]).setAttribute("style","display: grid")
		} else {
			document.querySelector(".panel-"+botones[0]).setAttribute("style","display: none")
		}
	})
}

async function refreshDatos(cantfilas){
	const response = await fetch("https://mattprofe.com.ar/alumno/3765/app-estacion/api/estacion/info/"+chipid.textContent+"/1")
	const data = await response.json()
	procesar(data)
}

async function addVisitStation(){
	fetch("https://mattprofe.com.ar/alumno/3765/app-estacion/api/estacion/visitas/"+chipid.textContent);
}

function procesar(datos, addData = true){
	console.log(datos);
	document.querySelector(".data__fecha").innerHTML = datos[0].fecha;
	document.querySelector(".data__ubicacion").textContent = datos[0].ubicacion;
	document.querySelector("#data__temperatura__entero").textContent = datos[0].temperatura.split(".")[0]+".";
	document.querySelector("#data__temperatura__decimal").textContent = datos[0].temperatura.split(".")[1];
	document.querySelector(".data__humedad").textContent = datos[0].humedad.split(".")[0]+"%";
	document.querySelector(".data__maxtemperatura").textContent = datos[0].temperatura.split(".")[0]+"°C";
	document.querySelector("#data__humedad__entero").textContent = datos[0].humedad.split(".")[0]+".";
	document.querySelector("#data__humedad__decimal").textContent = datos[0].humedad.split(".")[1];
}