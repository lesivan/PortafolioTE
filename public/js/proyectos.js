var lineas = null;

$(function(){
	$(".select2").select2();
	getTypesLineas();
	setTypesAsignatura();
	setTypesEstudiante();
	

});



function setTypesAsignatura(){
	$('#asignatura').empty();
	$.get('/typesA', function(res){
		$('#asignatura').append('<option value="placeholder">Seleccione un tipo</option>');
		$('#carreraA').append('<option value="placeholder">Seleccione un tipo</option>');
		$(res).each(function(key, value){
			$('#asignatura').append('<option value="'+value.id+'">'+value.nombreasignatura+'</option>');
			$('#carreraA').append('<option value="'+value.id+'">'+value.NombreCarrera+'</option>');
		});
	});
}

function getTypesLineas(){
	$.get('/typesL', function(res){
		lineas = res;
		setTypesLineas('placeholder');
	
	});
}

$('#asignatura').on('change', function(){
	if ($('#asignatura').val()=='placeholder') {
		$('#linea').empty();
		$('#linea').append('<option value="placeholder">Selecciona una Asignatura antes..</option>');
		$('#turnoA').append('<option value="placeholder">Selecciona una carrera antes..</option>');
	}
	setTypesLineas($('#asignatura').val());
});

function setTypesLineas(id){
	if (id!='placeholder') {
		$('#linea').empty();
		$('#linea').append('<option value="placeholder">Selecciona Linea Investigacion</option>');
		$('#turnoA').append('<option value="placeholder">Selecciona un turno</option>');
		$(lineas).each(function(key, value){
			if (value.idasig == id) {
				$('#linea').append('<option value="'+value.id+'">'+value.nombrelineainvestigacion+'</option>');
				$('#turnoA').append('<option value="'+value.id+'">'+value.descripcion+'</option>');
			}
		});
	}
}

function setTypesEstudiante(){
	$.get('/typesE', function(res){
		$('#carnet').empty();
		$('#carnet').append('<option value="placeholder">Seleccione un tipo</option>');
		$(res).each(function(key, value){
		$('#carnet').append('<option value="'+value.id+'">'+value.Ncarnet+'</option>');
		$('#turnosA').append('<option value="'+value.id+'">'+value.descripcion+'</option>');
			
		});
	});
}
