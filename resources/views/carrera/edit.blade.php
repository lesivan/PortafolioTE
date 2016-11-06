@extends('layouts.admin')

@section('content')
	@include('alerts.request')
	<div id="divider"></div>
	<div class="form-group">
		{!!Form::model($carrera, ['route'=>['carrera.update', $carrera->id], 'method'=>'PUT'])!!}
			@include('carrera.modals.edit')
			{!!Form::submit('Modificar', ['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
	</div>
	@if ($user->id > 5)
	<div class="form-group">
		{!!Form::open(['route'=>['carrera.destroy', $carrera->id], 'method'=>'DELETE'])!!}
			{!!Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
	</div>
	@endif
	
@stop