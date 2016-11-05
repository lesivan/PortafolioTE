@extends('layouts.admin')

@section('content')
	@include('alerts.request')
	<div id="divider"></div>
	<div class="form-group">
		{!!Form::model($carrera, ['route'=>['carreraturno.update', $carrera->idcarrera], 'method'=>'PUT'])!!}
			@include('carreraturno.forms.crt')
			{!!Form::submit('Modificar', ['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
	</div>
	@if ($user->id > 5)
	<div class="form-group">
		{!!Form::open(['route'=>['carreraturno.destroy', $carreraturno->idCarreraTurno], 'method'=>'DELETE'])!!}
			{!!Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
	</div>
	@endif
	
@stop