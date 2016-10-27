@extends('layouts.admin')

@section('content')
	@include('alerts.request')
	<div id="divider"></div>
	<div class="form-group">
		{!!Form::model($user, ['route'=>['turno.update', $turno->idturno], 'method'=>'PUT'])!!}
			@include('turno.forms.tu')
			{!!Form::submit('Modificar', ['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
	</div>
	@if ($user->id > 5)
	<div class="form-group">
		{!!Form::open(['route'=>['carrera.destroy', $carrera->idcarrera], 'method'=>'DELETE'])!!}
			{!!Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
	</div>
	@endif
	
@stop