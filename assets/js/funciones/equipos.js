function editar(id,nit){
	var elemento = document.getElementById('datos_documentos');
	while (elemento.firstChild) {
	  elemento.removeChild(elemento.firstChild);
	}
	var capa = document.getElementById('datos_documentos');
	capa.innerHTML+='<form class="form-horizontal" method="post" action="?view=update_equipo" autocomplete="off" role="form">'+
						'<input type="text" name="id_equipo" id="id_equipo" value="'+id+'" class="form-control" required>'+
						'<button type="submit" id="bnt_documentos_iniciales" class="btn btn-primary">Ir</button>'+
					'</form>';
	document.getElementById("bnt_documentos_iniciales").click();
}
