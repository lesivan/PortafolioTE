@extends('layouts.admin')

@section('content')
	@include('alerts.request')
	<div id="divider"></div>
	<div class="form-group">
		{!!Form::model($turno, ['route'=>['turno.update', $turno->id], 'method'=>'PUT'])!!}
			@include('turno.forms.tu')
			{!!Form::submit('Modificar', ['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
	</div>
	
	<div class="form-group">
		{!!Form::open(['route'=>['turno.destroy', $turno->id], 'method'=>'DELETE'])!!}
			{!!Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
	</div>
	
@stop