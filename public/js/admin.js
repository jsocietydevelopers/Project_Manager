function editarProyecto(dato, nombre){
	//crear cards
	$.ajax({
		data : {proyecto : nombre},
		url  : 'Admin/editarProyecto',
		type : 'POST'
	}).done(function(data){
		try{
	    data = JSON.parse(data);
	    if(data.error == 0){
	    	location.href = 'Actividades';
	    }else {
	    	msj('error', data.msj);
	    	return;
	    }
	  }catch(err){
	    msj('error',err.message);
	  }
	});
}
function crearProyecto(){
	var project = $('#proyect_name').val();
	if(project == null || project == ''){
		msj('error', 'Ingrese un nombre para su proyecto');
		return;
	}
	if(arr_names.length == 0){
		msj('error', 'Ingrese un colaborador');
		return;
	}
	$.ajax({
		data : {project 	  : project,
			    colaboradores : arr_names.toString()},
		url  : 'Admin/crearProyecto',
		type : 'POST'
	}).done(function(data){
		try{
	    data = JSON.parse(data);
	    if(data.error == 0){
	    	$('#proyectos').html('');
	    	$('#proyectos').append(data.tabla);
	    }else {
	    	msj('error', data.msj);
	    	return;
	    }
	  }catch(err){
	    msj('error',err.message);
	  }
	});
}
var nombre_pers = null;
var arr_names   = [];
function guadarNombre(name){
	//nombre_pers = name;
	arr_names.push(name);
}
function cambiarInput(){
	$('#activi').css('display', 'none');
	$('#actividad').css('display', 'block');
	$('#actividad').focus();
	$('#btnActividad').css('display', 'block')
}