$(function(){
	$(".select2").select2();
	setTypesTurno();
	setTypesCarrera();
	listar();

});

function setTypesTurno(){
	$.get('/typesT', function(res){
		$('#turno').empty();
		$('#turno').append('<option value="placeholder">Seleccione un tipo</option>');
		$(res).each(function(key, value){
			$('#turno').append('<option value="'+value.idturno+'">'+value.descripcion+'</option>');
			
		});
	});
}

function setTypesCarrera(){
	$.get('/typesC', function(res){
		$('#carrera').empty();
		$('#carrera').append('<option value="placeholder">Seleccione un tipo</option>');
		$(res).each(function(key, value){
			$('#carrera').append('<option value="'+value.idcarrera+'">'+value.NombreCarrera+'</option>');
			
		});
	});
}

function listar(){
	$('#datos').empty();
	$.get('/estudiantes', function(res){
		$(res).each(function(key, value){
			$('#datos').append('<tr><td>'+(key+1)+'</td>'+
				'<td>'+value.Nombre+'</td>'+
				'<td>'+value.Apellido+'</td>'+
				'<td>'+value.Ncarnet+'</td>'+
				'<td>'+value.NombreCarrera+'</td>'+
				'<td><button value='+value.id+' OnClick="mostrar(this);" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit">Editar</button> '+
				((value.id==1)?'':'<button value='+value.id+' OnClick="danger(this);" class="btn btn-danger" data-toggle="modal" data-target="#modalRemove">Eliminar</button>')+'</td></tr>');
		});
	});
}




$('#agregar').on('click', function(){
	
	if ($('#carrera').val()=='placeholder') {
		$('#msjuser').removeClass('alert-success');
		$('#msjuser').addClass('alert-danger');
		$('#msjuser'+'-text').html('Debe seleccionar una Carrera!');
		$('#msjuser').fadeIn();
		window.setTimeout(function(){$('#msjuser').fadeOut();}, 2000);
		return;
	}

	if ($('#turno').val()=='placeholder') {
		$('#msjuser').removeClass('alert-success');
		$('#msjuser').addClass('alert-danger');
		$('#msjuser'+'-text').html('Debe seleccionar un Turno!');
		$('#msjuser').fadeIn();
		window.setTimeout(function(){$('#msjuser').fadeOut();}, 2000);
		return;
	}
	var JData = {
		Nombre: $('#nombre').val(), Apellido: $('#apellido').val(), Ncarnet: $('#carnet').val() , correo: $('#correo').val(),
		 NombreCarrera: $('#carrera').val(),
		descripcion: $('#turno').val()
		};

	$.ajax({
		url: '/estudiante',
		headers: {'X-CSRF-TOKEN': $('#token').val()},
		type: 'POST',
		dataType: 'json',
		data: JData,

		success: function(){
			listar();
			$('#nombre').val('');
			$('#apellido').val('');
			$('#carnet').val('');
			$('#correo').val('');
			$('#carrera').val('placeholder').trigger('change');
			$('#turno').val('placeholder').trigger('change');

			$('#msjuser').removeClass('alert-danger');
			$('#msjuser').addClass('alert-success');
			$('#msjuser'+'-text').html('Registro agregado exitosamente!');
			$('#msjuser').fadeIn();
			window.setTimeout(function(){$('#msjuser').fadeOut();}, 2000);
		},
		error:function(msj){
			$('#msjuser').removeClass('alert-success');
			$('#msjuser').addClass('alert-danger');
			$('#msjuser'+'-text').html((msj.responseJSON.Nombre!=undefined)?msj.responseJSON.Nombre:''+'<br>'+
				(msj.responseJSON.Apellido!=undefined)?msj.responseJSON.Apellido:''+'<br>'+
				(msj.responseJSON.Ncarnet!=undefined)?msj.responseJSON.Ncarnet:''+'<br>'+
				(msj.responseJSON.correo!=undefined)?msj.responseJSON.correo:'');
			$('#msjuser').fadeIn();
			window.setTimeout(function(){$('#msjuser').fadeOut();}, 2000);
		}
	});
});