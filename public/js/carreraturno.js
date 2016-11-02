$(function(){
	$(".select2").select2();
	setTypesTurno();
	setTypesCarrera();
	listar();

});

function setTypesTurno(){
	$.get('/typesTu', function(res){
		$('#turnos').empty();
		$('#turnos').append('<option value="placeholder">Seleccione un tipo</option>');
		$(res).each(function(key, value){
			$('#turnos').append('<option value="'+value.idturno+'">'+value.descripcion+'</option>');
			
		});
	});
}

function setTypesCarrera(){
	$.get('/typesCa', function(res){
		$('#carreras').empty();
		$('#carreras').append('<option value="placeholder">Seleccione un tipo</option>');
		$(res).each(function(key, value){
			$('#carreras').append('<option value="'+value.idcarrera+'">'+value.NombreCarrera+'</option>');
			
		});
	});
}

function listar(){
	$('#datos').empty();
	$.get('/carreraturnos', function(res){
		$(res).each(function(key, value){
			$('#datos').append('<tr><td>'+(key+1)+'</td>'+
				'<td>'+value.CodCarrera+'</td>'+
				'<td>'+value.idturno+'</td>'+
				'<td><button value='+value.id+' OnClick="mostrar(this);" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit">Editar</button> '+
				((value.id==1)?'':'<button value='+value.id+' OnClick="danger(this);" class="btn btn-danger" data-toggle="modal" data-target="#modalRemove">Eliminar</button>')+'</td></tr>');
		});
	});
}

$('#agregar').on('click', function(){
	
	if ($('#carreras').val()=='placeholder') {
		$('#msjuser').removeClass('alert-success');
		$('#msjuser').addClass('alert-danger');
		$('#msjuser'+'-text').html('Debe seleccionar una Carrera!');
		$('#msjuser').fadeIn();
		window.setTimeout(function(){$('#msjuser').fadeOut();}, 2000);
		return;
	}

	if ($('#turnos').val()=='placeholder') {
		$('#msjuser').removeClass('alert-success');
		$('#msjuser').addClass('alert-danger');
		$('#msjuser'+'-text').html('Debe seleccionar un Turno!');
		$('#msjuser').fadeIn();
		window.setTimeout(function(){$('#msjuser').fadeOut();}, 2000);
		return;
	}
	var JData = {
		CodCarrera: $('#carreras').val() ,idturno: $('#turnos').val()
		};

		console.log(JData);

	$.ajax({
		url: '/carreraturno',
		headers: {'X-CSRF-TOKEN': $('#token').val()},
		type: 'POST',
		dataType: 'json',
		data: JData,

		success: function(){
			listar();
			$('#carreras').val('placeholder').trigger('change');
			$('#turnos').val('placeholder').trigger('change');

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
