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
		$('#turnosA').append('<option value="placeholder">Seleccione un tipo</option>');
		$(res).each(function(key, value){
		$('#turnos').append('<option value="'+value.id+'">'+value.descripcion+'</option>');
		$('#turnosA').append('<option value="'+value.id+'">'+value.descripcion+'</option>');
			
		});
	});
}

function setTypesCarrera(){
	$.get('/typesCa', function(res){
		$('#carreras').empty();
		$('#carreras').append('<option value="placeholder">Seleccione un tipo</option>');
		$('#carrerasA').append('<option value="placeholder">Seleccione un tipo</option>');
		$(res).each(function(key, value){
			$('#carreras').append('<option value="'+value.id+'">'+value.NombreCarrera+'</option>');
			$('#carrerasA').append('<option value="'+value.id+'">'+value.NombreCarrera+'</option>');
			
		});
	});
}

function listar(){
	$('#datos').empty();
	$.get('/carreraturnos', function(res){
		$(res).each(function(key, value){
			$('#datos').append('<tr><td>'+(key+1)+'</td>'+
				'<td>'+value.NombreCarrera+'</td>'+
				'<td>'+value.descripcion+'</td>'+
				'<td><button value='+value.id+' OnClick="mostrar(this);" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit">Editar</button> '+
				'<button value='+value.id+' OnClick="danger(this);" class="btn btn-danger" data-toggle="modal" data-target="#modalRemove">Eliminar</button>'+'</td></tr>');
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
		idcarrera: $('#carreras').val() ,idturno: $('#turnos').val()
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


function danger(btn){
	$('#confirmRemove').val(btn.value);
}

function eliminar(btn){
	$.ajax({
		url: '/carreraturno/'+btn.value,
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
	$.get('/carreraturno/'+btn.value+'/edit', function(res){
		$('#idn').val(res.id);
		$('#carrerasA').val(res.idcarrera).trigger('change');
		$('#turnosA').val(res.idturno).trigger('change');
	})	
}

$('#actualizar').on('click', function(){

	if ($('#carrerasA').val()=='placeholder') {
		$('#msjuser').removeClass('alert-success');
		$('#msjuser').addClass('alert-danger');
		$('#msjuser'+'-text').html('Debe seleccionar una Carrera!');
		$('#msjuser').fadeIn();
		window.setTimeout(function(){$('#msjuser').fadeOut();}, 2000);
		return;
	}

	if ($('#turnosA').val()=='placeholder') {
		$('#msjuser').removeClass('alert-success');
		$('#msjuser').addClass('alert-danger');
		$('#msjuser'+'-text').html('Debe seleccionar un Turno!');
		$('#msjuser').fadeIn();
		window.setTimeout(function(){$('#msjuser').fadeOut();}, 2000);
		return;
	}

	
	var JData;
			JData = {
				idcarrera: $('#carrerasA').val() ,idturno: $('#turnosA').val()
			};
		
	
	$.ajax({
		url: '/carreraturno/'+$('#idn').val(),
		headers: {'X-CSRF-TOKEN': $('#token').val()},
		type: 'PUT',
		dataType: 'json',
		data: JData,
		success: function(){
			listar();
			$('#modalEdit').modal('toggle');
			$('#carrerasA').val('placeholder').trigger('change');
			$('#turnosA').val('placeholder').trigger('change');
			
		
			$('#msjuser').removeClass('alert-danger');
			$('#msjuser').addClass('alert-success');
			$('#msjuser'+'-text').html('Registros actualizados exitosamente!');
			$('#msjuser').fadeIn();
			window.setTimeout(function(){$('#msjuser').fadeOut();}, 2000);
		},
		error:function(msj){
			$('#msjuser').removeClass('alert-success');
			$('#msjuserA').addClass('alert-danger');
			window.setTimeout(function(){$('#msjuserA').fadeOut();}, 2000);
		}
	});
})
