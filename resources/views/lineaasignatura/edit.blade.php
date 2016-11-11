@extends('layouts.admin')

@section('content')
	@include('alerts.request')
	<div id="divider"></div>
	<div class="form-group">
		{!!Form::model($lineaasignatura, ['route'=>['lineaasignatura.update', $lineaasignatura->id], 'method'=>'PUT'])!!}
			@include('lineaasignatura.forms.lia')
			{!!Form::submit('Modificar', ['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
	</div>
	
	<div class="form-group">
		{!!Form::open(['route'=>['lineaasignatura.destroy', $lineaasignatura->id], 'method'=>'DELETE'])!!}
			{!!Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
	</div>
	
	
@stop