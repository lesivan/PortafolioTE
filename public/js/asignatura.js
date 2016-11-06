$(function(){
	$(".select2").select2();
	listar();

});


function listar(){
	$('#datos').empty();
	$.get('/asignaturas', function(res){
		$(res).each(function(key, value){
			$('#datos').append('<tr><td>'+(key+1)+'</td>'+
				'<td>'+value.codasignatura+'</td>'+
				'<td>'+value.nombreasignatura+'</td>'+
				'<td><button value='+value.id+' OnClick="mostrar(this);" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit">Editar</button> '+
				'<button value='+value.id+' OnClick="danger(this);" class="btn btn-danger" data-toggle="modal" data-target="#modalRemove">Eliminar</button>'+'</td></tr>');
		});
	});
}



$('#agregar').on('click', function(){
	
	var JData = {
		codasignatura: $('#codigoAsignatura').val(), nombreasignatura: $('#nombreAsignatura').val()
		};
	$.ajax({
		url: '/asignatura',
		headers: {'X-CSRF-TOKEN': $('#token').val()},
		type: 'POST',
		dataType: 'json',
		data: JData,

		success: function(){
			listar();
			$('#codigoAsignatura').val('');
			$('#nombreAsignatura').val('');
		

			$('#msjuser').removeClass('alert-danger');
			$('#msjuser').addClass('alert-success');
			$('#msjuser'+'-text').html('Registro agregado exitosamente!');
			$('#msjuser').fadeIn();
			window.setTimeout(function(){$('#msjuser').fadeOut();}, 2000);
		},
		error:function(msj){
			$('#msjuser').removeClass('alert-success');
			$('#msjuser').addClass('alert-danger');
			$('#msjuser'+'-text').html((msj.responseJSON.codasignatura!=undefined)?msj.responseJSON.codasignatura:''+'<br>'+
				(msj.responseJSON.nombreasignatura!=undefined)?msj.responseJSON.nombreasignatura:'');
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
		url: '/asignatura/'+btn.value,
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
	$.get('/asignatura/'+btn.value+'/edit', function(res){
		$('#codigoAsignaturaA').val(res.codasignatura);
		$('#nombreAsignaturaA').val(res.nombreasignatura);
	})	
}

$('#actualizar').on('click', function(){
	var JData;
			JData = {
				codasignatura: $('#codigoAsignatura').val(), nombreasignatura: $('#nombreAsignatura').val()
			};
		
	
	$.ajax({
		url: '/asignatura/'+$('#idn').val(),
		headers: {'X-CSRF-TOKEN': $('#token').val()},
		type: 'PUT',
		dataType: 'json',
		data: JData,
		success: function(){
			listar();
			$('#modalEdit').modal('toggle');
			$('#codigoAsignaturaA').val('');
			$('#nombreAsignaturaA').val('');
			
		
			$('#msjuser').removeClass('alert-danger');
			$('#msjuser').addClass('alert-success');
			$('#msjuser'+'-text').html('Registros actualizados exitosamente!');
			$('#msjuser').fadeIn();
			window.setTimeout(function(){$('#msjuser').fadeOut();}, 2000);
		},
		error:function(msj){
			$('#msjuser').removeClass('alert-success');
			$('#msjuserA').addClass('alert-danger');
			$('#msjuserA'+'-text').html((msj.responseJSON.codasignatura!=undefined)?msj.responseJSON.codasignatura:''+'<br>'+
				(msj.responseJSON.nombreasignatura!=undefined)?msj.responseJSON.nombreasignatura:'');
			$('#msjuserA').fadeIn();
			window.setTimeout(function(){$('#msjuserA').fadeOut();}, 2000);
		}
	});
})
