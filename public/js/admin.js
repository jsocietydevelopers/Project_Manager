function editarProyecto(dato, nombre){
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
	arr_names.push(name);
}
function cambiarInput(num){
	$('#activi'+num).css('display', 'none');
	$('#actividad'+num).css('display', 'block');
	$('#horas'+num).css('display', 'block');
	$('#actividad').focus();
	$('#btnActividad'+num).css('display', 'block')
}
function crearTarea(){
	var tarea = $('#tarea').val();
	var tiempo = $('#tiempo').val();
	var cont = 1;
	if(tarea == null || tarea == ''){
		msj('error', 'Ingrese la tarea');
		return;
	}
	if(tiempo == null || tiempo == ''){
		msj('error', 'Ingrese el tiempo');
		return;
	}
	$.ajax({
		data : {tarea  : tarea,
			    tiempo : tiempo},
		url  : 'Actividades/crearTarea',
		type : 'POST'
	}).done(function(data){
		try{
	    data = JSON.parse(data);
	    if(data.error == 0){
	    	var html = '<div class="div-activis'+cont+'">'+
	    			   '<h3>'+tarea+'</h3>'+
						'<div class="progress">'+
						    '<div class="progress-bar" style="width:0%; color:black">0%</div>'+
						'</div>'+
						'<div class="add-activis">'+
							'<a onclick="cambiarInput()"><span id="activi'+cont+'">Ingrese una actividad...</span></a>'+
						'</div>'+
						'<input type="text" class="form-control" id="actividad'+cont+'" placeholder="Ingrese una actividad..." style="display: none;">'+
						'<input type="text" class="form-control" id="horas'+cont+'" placeholder="Nro Horas" style="display: none;">'+
						'<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" id="btnActividad'+cont+'" onclick="crearActividad()" style="display: none;"><i class="mdi mdi-add"></i>Crear actividad</button>'
						'</div>';
	    	$('.actividades').append(html);
	    	cont++;
	    }else {
	    	msj('error', data.msj);
	    	return;
	    }
	  }catch(err){
	    msj('error',err.message);
	  }
	});
}
function crearActividad(num){
	var activi = $('#actividad'+num).val();
	var horas = $('#horas'+num).val();
	var cont = 1;
	if(activi == null || activi == ''){
		msj('error', 'Ingrese la actividad');
		return;
	}
	if(horas == null || horas == ''){
		msj('error', 'Ingrese el tiempo');
		return;
	}
	$.ajax({
		data : {activi  : activi,
			    horas   : horas},
		url  : 'Actividades/crearActividad',
		type : 'POST'
	}).done(function(data){
		try{
	    data = JSON.parse(data);
	    if(data.error == 0){
	    	//var html = '';
	    	$('.add-activis').html('');
	    	$('.add-activis').html(data.html_activi);
	    }else {
	    	msj('error', data.msj);
	    	return;
	    }
	  }catch(err){
	    msj('error',err.message);
	  }
	});
}