@extends('layouts.admin')

@section('content')
	@include('alerts.request')
	<div id="divider"></div>
	<div class="form-group">
		{!!Form::model($estudiante, ['route'=>['estudiante.update', $estudiante->id], 'method'=>'PUT'])!!}
			@include('estudiante.forms.usr')
			{!!Form::submit('Modificar', ['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
	</div>

	<div class="form-group">
		{!!Form::open(['route'=>['estudiante.destroy', $estudiante->id], 'method'=>'DELETE'])!!}
			{!!Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
	</div>
	
@stop