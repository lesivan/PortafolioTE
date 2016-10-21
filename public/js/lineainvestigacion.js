$(function(){
	$(".select2").select2();
	listar();

});


function listar(){
	$('#datos').empty();
	$.get('/lineasinvestigacion', function(res){
		$(res).each(function(key, value){
			$('#datos').append('<tr><td>'+(key+1)+'</td>'+
				'<td>'+value.nombrelineainvestigacion+'</td>'+
				'<td><button value='+value.idlineainvestigacion+' OnClick="mostrar(this);" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit">Editar</button> '+
				'<button value='+value.idlineainvestigacion+' OnClick="danger(this);" class="btn btn-danger" data-toggle="modal" data-target="#modalRemove">Eliminar</button>'+'</td></tr>');
		});
	});
}



$('#agregar').on('click', function(){
	
	var JData = {
		nombrelineainvestigacion: $('#nombreli').val()
		};
	$.ajax({
		url: '/lineainvestigacion',
		headers: {'X-CSRF-TOKEN': $('#token').val()},
		type: 'POST',
		dataType: 'json',
		data: JData,

		success: function(){
			listar();
			$('#nombreli').val('');
			
		

			$('#msjuser').removeClass('alert-danger');
			$('#msjuser').addClass('alert-success');
			$('#msjuser'+'-text').html('Registro agregado exitosamente!');
			$('#msjuser').fadeIn();
			window.setTimeout(function(){$('#msjuser').fadeOut();}, 2000);
		},
		error:function(msj){
			$('#msjuser').removeClass('alert-success');
			$('#msjuser').addClass('alert-danger');
			$('#msjuser'+'-text').html((msj.responseJSON.nombrelineainvestigacion!=undefined)?msj.responseJSON.nombrelineainvestigacion:'');
			$('#msjuser').fadeIn();
			window.setTimeout(function(){$('#msjuser').fadeOut();}, 2000);
		}
	});
});