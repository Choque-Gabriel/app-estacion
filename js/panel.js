loadEstaciones().then(estaciones => {
	estaciones.forEach(estacion => {
		createEstacion(estacion)
	})
})

function createEstacion(data){
	const tpl = tpl__estacion.content;
	const clon = tpl.cloneNode(true);
	clon.querySelector(".card__title").textContent = data.apodo;
	clon.querySelector(".card__ubicacion").textContent = data.ubicacion;
	clon.querySelector(".card__visitas").textContent = data.visitas;
	clon.querySelector("a").href="detalle.php?chipid="+data.chipId;
	listado.appendChild(clon);
}

async function loadEstaciones(){
	const response = await fetch("https://mattprofe.com.ar/alumno/3765/app-estacion/api/estacion/listar");
	const data = await response.json();
	return data;
}