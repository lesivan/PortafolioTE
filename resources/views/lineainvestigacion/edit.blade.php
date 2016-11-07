@extends('layouts.admin')

@section('content')
	@include('alerts.request')
	<div id="divider"></div>
	<div class="form-group">
		{!!Form::model($linea, ['route'=>['lineainvestigacion.update', $linea->id], 'method'=>'PUT'])!!}
			@include('lineainvestigacion.forms.li')
			{!!Form::submit('Modificar', ['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
	</div>
	<div class="form-group">
		{!!Form::open(['route'=>['lineainvestigacion.destroy', $linea->id], 'method'=>'DELETE'])!!}
			{!!Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
	</div>
	
@stop