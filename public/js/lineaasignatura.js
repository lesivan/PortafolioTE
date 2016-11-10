$(function(){
	$(".select2").select2();
	setTypesLineas();
	setTypesAsignaturas();
	listar();

});

function setTypesAsignaturas(){
	$.get('/typesAs', function(res){
		$('#asignaturas').empty();
		$('#asignaturas').append('<option value="placeholder">Seleccione un tipo</option>');
		$('#asignaturasA').append('<option value="placeholder">Seleccione un tipo</option>');
		$(res).each(function(key, value){
		$('#asignaturas').append('<option value="'+value.id+'">'+value.nombreasignatura+'</option>');
		$('#asignaturasA').append('<option value="'+value.id+'">'+value.nombreasignatura+'</option>');
			
		});
	});
}

function setTypesLineas(){
	$.get('/typesLi', function(res){
		$('#lineas').empty();
		$('#lineas').append('<option value="placeholder">Seleccione un tipo</option>');
		$('#lineasA').append('<option value="placeholder">Seleccione un tipo</option>');
		$(res).each(function(key, value){
			$('#lineas').append('<option value="'+value.id+'">'+value.nombrelineainvestigacion+'</option>');
			$('#lineasA').append('<option value="'+value.id+'">'+value.nombrelineainvestigacion+'</option>');
			
		});
	});
}

function listar(){
	$('#datos').empty();
	$.get('/lineasasignaturas', function(res){
		$(res).each(function(key, value){
			$('#datos').append('<tr><td>'+(key+1)+'</td>'+
				'<td>'+value.nombreasignatura+'</td>'+
				'<td>'+value.nombrelineainvestigacion+'</td>'+
				'<td><button value='+value.id+' OnClick="mostrar(this);" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit">Editar</button> '+
				'<button value='+value.id+' OnClick="danger(this);" class="btn btn-danger" data-toggle="modal" data-target="#modalRemove">Eliminar</button>'+'</td></tr>');
		});
	});
}


$('#agregar').on('click', function(){
	
	if ($('#lineas').val()=='placeholder') {
		$('#msjuser').removeClass('alert-success');
		$('#msjuser').addClass('alert-danger');
		$('#msjuser'+'-text').html('Debe seleccionar una Linea de Investigacion!');
		$('#msjuser').fadeIn();
		window.setTimeout(function(){$('#msjuser').fadeOut();}, 2000);
		return;
	}

	if ($('#asignaturas').val()=='placeholder') {
		$('#msjuser').removeClass('alert-success');
		$('#msjuser').addClass('alert-danger');
		$('#msjuser'+'-text').html('Debe seleccionar una Asignatura!');
		$('#msjuser').fadeIn();
		window.setTimeout(function(){$('#msjuser').fadeOut();}, 2000);
		return;
	}
	var JData = {
		idasig: $('#asignaturas').val() ,idlineainvestigacion: $('#lineas').val()
		};

		console.log(JData);

	$.ajax({
		url: '/lineaasignatura',
		headers: {'X-CSRF-TOKEN': $('#token').val()},
		type: 'POST',
		dataType: 'json',
		data: JData,

		success: function(){
			listar();
			$('#lineas').val('placeholder').trigger('change');
			$('#asignaturas').val('placeholder').trigger('change');
			$('#msjuser').removeClass('alert-danger');
			$('#msjuser').addClass('alert-success');
			$('#msjuser'+'-text').html('Registro agregado exitosamente!');
			$('#msjuser').fadeIn();
			window.setTimeout(function(){$('#msjuser').fadeOut();}, 2000);
		},
		error:function(msj){
			$('#msjuser').removeClass('alert-success');
			$('#msjuser').addClass('alert-danger');
			$('#msjuser').fadeIn();
			window.setTimeout(function(){$('#msjuser').fadeOut();}, 2000);
		}
	});
});