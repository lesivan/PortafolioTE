$(function(){
	$(".select2").select2();
	setTypes();
	listar();

});

function setTypes(){
	$.get('/types', function(res){
		$('#tipos').empty();
		$('#tipos').append('<option value="placeholder">Seleccione un tipo</option>');
		$('#tiposA').append('<option value="placeholder">Seleccione un tipo</option>');
		$(res).each(function(key, value){
			$('#tipos').append('<option value="'+value.id+'">'+value.name+'</option>');
			$('#tiposA').append('<option value="'+value.id+'">'+value.name+'</option>');
		});
	});
}


function listar(){
	$('#datos').empty();
	$.get('/usuarios', function(res){
		$(res).each(function(key, value){
			$('#datos').append('<tr><td>'+(key+1)+'</td>'+
				'<td>'+value.name+'</td>'+
				'<td>'+value.email+'</td>'+
				'<td>'+((value.type!=null)?value.type:'')+'</td>'+	
				'<td><button value='+value.id+' OnClick="mostrar(this);" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit">Editar</button> '+
				((value.id==1)?'':'<button value='+value.id+' OnClick="danger(this);" class="btn btn-danger" data-toggle="modal" data-target="#modalRemove">Eliminar</button>')+'</td></tr>');
		});
	});
}


$('#search').on('click', function(){
	if($('#toSearch').val() != ''){
		$('#datos').empty();
		$.get('/usuarios/bySearch/'+$('#toSearch').val(), function(res){
			if (res.length == 0) {
				$('#msjuser').removeClass('alert-success');
				$('#msjuser').addClass('alert-danger');
				$('#msjuser'+'-text').html('No se encontraron resultados!');
				$('#msjuser').fadeIn();
				window.setTimeout(function(){$('#msjuser').fadeOut();}, 2000);
			}
			$(res).each(function(key, value){
				$('#datos').append('<tr><td>'+(key+1)+'</td>'+
				'<td>'+value.name+'</td>'+
				'<td>'+value.email+'</td>'+
				'<td>'+((value.type!=null)?value.type:'')+'</td>'+
				'<button value='+value.id+' OnClick="mostrar(this);" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit">Editar</button> '+
				((value.id==1)?'':'<button value='+value.id+' OnClick="danger(this);" class="btn btn-danger" data-toggle="modal" data-target="#modalRemove">Eliminar</button>')+'</td></tr>');
			})
		});
	}else{
		listar();
	}
});

$('#registrar').on('click', function(){
	if ($('#password').val() == '' || ($('#password').val() != $('#confirm').val())) {
		$('#msjuser').removeClass('alert-success');
		$('#msjuser').addClass('alert-danger');
		$('#msjuser'+'-text').html('Las contraseñas ingresadas no coinciden!');
		$('#msjuser').fadeIn();
		window.setTimeout(function(){$('#msjuser').fadeOut();}, 2000);
		return;
	}
	if ($('#tipos').val()=='placeholder') {
		$('#msjuser').removeClass('alert-success');
		$('#msjuser').addClass('alert-danger');
		$('#msjuser'+'-text').html('Debe seleccionar un tipo!');
		$('#msjuser').fadeIn();
		window.setTimeout(function(){$('#msjuser').fadeOut();}, 2000);
		return;
	}
	var JData = {
		name: $('#nombre').val(), email: $('#email').val(), password: $('#password').val(),
		id_type: $('#tipos').val()
		};

	$.ajax({
		url: '/usuario',
		headers: {'X-CSRF-TOKEN': $('#token').val()},
		type: 'POST',
		dataType: 'json',
		data: JData,

		success: function(){
			listar();
			$('#nombre').val('');
			$('#email').val('');
			$('#password').val('');
			$('#confirm').val('');
			$('#tipos').val('placeholder').trigger('change');

			$('#msjuser').removeClass('alert-danger');
			$('#msjuser').addClass('alert-success');
			$('#msjuser'+'-text').html('Registro agregado exitosamente!');
			$('#msjuser').fadeIn();
			window.setTimeout(function(){$('#msjuser').fadeOut();}, 2000);
		},
		error:function(msj){
			$('#msjuser').removeClass('alert-success');
			$('#msjuser').addClass('alert-danger');
			$('#msjuser'+'-text').html((msj.responseJSON.name!=undefined)?msj.responseJSON.name:''+'<br>'+
				(msj.responseJSON.email!=undefined)?msj.responseJSON.email:''+'<br>'+
				(msj.responseJSON.password!=undefined)?msj.responseJSON.password:'');
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
		url: '/usuario/'+btn.value,
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
	$.get('/usuario/'+btn.value+'/edit', function(res){
		$('#idn').val(res.id);
		$('#nombreA').val(res.name);
		$('#emailA').val(res.email);
		$('#tiposA').val(res.id_type).trigger('change');

		$('#passwordA').val('');
		$('#confirmA').val('');
	})	
}

$('#actualizar').on('click', function(){
	if ($('#passwordA').val() != $('#confirmA').val()) {
		$('#msjuserA').removeClass('alert-success');
		$('#msjuserA').addClass('alert-danger');
		$('#msjuserA'+'-text').html('Las contraseñas ingresadas no coinciden!');
		$('#msjuserA').fadeIn();
		window.setTimeout(function(){$('#msjuserA').fadeOut();}, 2000);
		return;
	}
	var JData;
	
		if ($('#passwordA').val()=='') {
			JData = {
				name: $('#nombreA').val(), email: $('#emailA').val(), id_type: $('#tiposA').val()
			};
		}else{
			JData = {
				name: $('#nombreA').val(), email: $('#emailA').val(), password: $('#passwordA').val(), id_type: $('#tiposA').val()
			};
		}
	

	$.ajax({
		url: '/usuario/'+$('#idn').val(),
		headers: {'X-CSRF-TOKEN': $('#token').val()},
		type: 'PUT',
		dataType: 'json',
		data: JData,
		success: function(){
			listar();
			$('#modalEdit').modal('toggle');
			$('#nombreA').val('');
			$('#emailA').val('');
			$('#passwordA').val('');
			$('#confirmA').val('');
			$('#tiposA').val('placeholder').trigger('change');
			

			$('#msjuser').removeClass('alert-danger');
			$('#msjuser').addClass('alert-success');
			$('#msjuser'+'-text').html('Registros actualizados exitosamente!');
			$('#msjuser').fadeIn();
			window.setTimeout(function(){$('#msjuser').fadeOut();}, 2000);
		},
		error:function(msj){
			$('#msjuser').removeClass('alert-success');
			$('#msjuserA').addClass('alert-danger');
			$('#msjuserA'+'-text').html((msj.responseJSON.name!=undefined)?msj.responseJSON.name:''+'<br>'+
				(msj.responseJSON.email!=undefined)?msj.responseJSON.email:''+'<br>'+
				(msj.responseJSON.password!=undefined)?msj.responseJSON.password:'');
			$('#msjuserA').fadeIn();
			window.setTimeout(function(){$('#msjuserA').fadeOut();}, 2000);
		}
	});
})
