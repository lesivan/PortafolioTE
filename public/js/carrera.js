$(function(){
	$(".select2").select2();
	listar();

});


function listar(){
	$('#datos').empty();
	$.get('/carreras', function(res){
		$(res).each(function(key, value){
			$('#datos').append('<tr><td>'+(key+1)+'</td>'+
				'<td>'+value.CodCarrera+'</td>'+
				'<td>'+value.NombreCarrera+'</td>'+
				'<td><button value='+value.id+' OnClick="mostrar(this);" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit">Editar</button> '+
				'<button value='+value.id+' OnClick="danger(this);" class="btn btn-danger" data-toggle="modal" data-target="#modalRemove">Eliminar</button>'+'</td></tr>');
		});
	});
}



$('#agregar').on('click', function(){
	
	var JData = {
		CodCarrera: $('#codigoCarrrera').val(), NombreCarrera: $('#nombreCarrrera').val()
		};
	$.ajax({
		url: '/carrera',
		headers: {'X-CSRF-TOKEN': $('#token').val()},
		type: 'POST',
		dataType: 'json',
		data: JData,

		success: function(){
			listar();
			$('#codigoCarrrera').val('');
			$('#nombreCarrrera').val('');
		

			$('#msjuser').removeClass('alert-danger');
			$('#msjuser').addClass('alert-success');
			$('#msjuser'+'-text').html('Registro agregado exitosamente!');
			$('#msjuser').fadeIn();
			window.setTimeout(function(){$('#msjuser').fadeOut();}, 2000);
		},
		error:function(msj){
			$('#msjuser').removeClass('alert-success');
			$('#msjuser').addClass('alert-danger');
			$('#msjuser'+'-text').html((msj.responseJSON.CodCarrera!=undefined)?msj.responseJSON.CodCarrera:''+'<br>'+
				(msj.responseJSON.NombreCarrera!=undefined)?msj.responseJSON.NombreCarrera:'');
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
		url: '/carrera/'+btn.value,
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
	$.get('/carrera/'+btn.value+'/edit', function(res){
		console.log(res)
		$('#codigoCarrreraA').val(res.CodCarrera);
		$('#nombreCarrreraA').val(res.NombreCarrera);
	})	
}

$('#actualizar').on('click', function(){
	var JData;
			JData = {
				CodCarrera: $('#codigoCarrreraA').val(), NombreCarrera: $('#nombreCarrreraA').val()
			};
		
	
	$.ajax({
		url: '/carrera/'+$('#idn').val(),
		headers: {'X-CSRF-TOKEN': $('#token').val()},
		type: 'PUT',
		dataType: 'json',
		data: JData,
		success: function(){
			listar();
			$('#modalEdit').modal('toggle');
			$('#codigoCarrreraA').val('');
			$('#nombreCarrreraA').val('');
			
		
			$('#msjuser').removeClass('alert-danger');
			$('#msjuser').addClass('alert-success');
			$('#msjuser'+'-text').html('Registros actualizados exitosamente!');
			$('#msjuser').fadeIn();
			window.setTimeout(function(){$('#msjuser').fadeOut();}, 2000);
		},
		error:function(msj){
			$('#msjuser').removeClass('alert-success');
			$('#msjuserA').addClass('alert-danger');
			$('#msjuserA'+'-text').html((msj.responseJSON.CodCarrera!=undefined)?msj.responseJSON.CodCarrera:''+'<br>'+
				(msj.responseJSON.NombreCarrera!=undefined)?msj.responseJSON.NombreCarrera:'');
			$('#msjuserA').fadeIn();
			window.setTimeout(function(){$('#msjuserA').fadeOut();}, 2000);
		}
	});
})
