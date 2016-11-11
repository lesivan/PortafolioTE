var turnos = null;

$(function(){
	$(".select2").select2();
	getTypesTurno();
	setTypesCarrera();
	listar();

});

function setTypesCarrera(){
	$('#carrera').empty();
	$.get('/typesC', function(res){
		$('#carrera').append('<option value="placeholder">Seleccione un tipo</option>');
		$('#carreraA').append('<option value="placeholder">Seleccione un tipo</option>');
		$(res).each(function(key, value){
			$('#carrera').append('<option value="'+value.id+'">'+value.NombreCarrera+'</option>');
			$('#carreraA').append('<option value="'+value.id+'">'+value.NombreCarrera+'</option>');
		});
	});
}

function getTypesTurno(){
	$.get('/typesT', function(res){
		turnos = res;
		setTypesTurno('placeholder');
	
	});
}

$('#carrera').on('change', function(){
	if ($('#carrera').val()=='placeholder') {
		$('#turno').empty();
		$('#turno').append('<option value="placeholder">Selecciona una carrera antes..</option>');
		$('#turnoA').append('<option value="placeholder">Selecciona una carrera antes..</option>');
	}
	setTypesTurno($('#carrera').val());
});

function setTypesTurno(id){
	if (id!='placeholder') {
		$('#turno').empty();
		$('#turno').append('<option value="placeholder">Selecciona un turno</option>');
		$('#turnoA').append('<option value="placeholder">Selecciona un turno</option>');
		$(turnos).each(function(key, value){
			if (value.idcarrera == id) {
				$('#turno').append('<option value="'+value.id+'">'+value.descripcion+'</option>');
				$('#turnoA').append('<option value="'+value.id+'">'+value.descripcion+'</option>');
			}
		});
	}
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
				'<td>'+value.descripcion+'</td>'+
				'<td><button value='+value.id+' OnClick="mostrar(this);" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit">Editar</button> '+
				'<button value='+value.id+' OnClick="danger(this);" class="btn btn-danger" data-toggle="modal" data-target="#modalRemove">Eliminar</button>'+'</td></tr>');
		});
	});
}



$('#agregar').on('click', function(){
	console.log('hola')
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
		Ncarnet: $('#carnet').val() ,Nombre: $('#nombre').val(), Apellido: $('#apellido').val(), correo: $('#correo').val(),
		 idCarreraTurno: $('#turno').val()
		};

		console.log(JData);

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


function danger(btn){
	$('#confirmRemove').val(btn.value);
}

function eliminar(btn){
	$.ajax({
		url: '/estudiante/'+btn.value,
		headers: {'X-CSRF-TOKEN': $('#token').val()},
		type: 'DELETE',
		dataType: 'json',
		success: function(){
			listar();
			$('#modalRemove').modal('toggle');
			$('#msjuser').removeClass('alert-danger');
			$('#msjuser').addClass('alert-success');
			$('#msjuser'+'-text').html('Registros actualizados exitosamente!');
			$('#msjuser').fadeIn();
			window.setTimeout(function(){$('#msjuser').fadeOut();}, 2000);
		}
	});
}

function mostrar(btn){
	$.get('/estudiante/'+btn.value+'/edit', function(res){
		$('#idn').val(res.id);
		$('#nombreA').val(res.Nombre);
		$('#apellidoA').val(res.Apellido);
		$('#carnetA').val(res.Ncarnet);
		$('#correoA').val(res.correo);
		$('#carreraA').val(res.NombreCarrera).trigger('change');
		$('#turnoA').val(res.descripcion).trigger('change');


	})	
}
