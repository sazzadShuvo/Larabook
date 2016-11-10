@extends('layouts.default')

@section('content')
	<h1>Register</h1>

	{!! Form::open(['route' => 'auth.register']) !!}
		<div class="form-group">
			{!! Form::label('username', 'Username:') !!}
			{!! Form::text('username', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('email', 'Email:') !!}
			{!! Form::email('email', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('password', 'Password:') !!}
			{!! Form::password('password', ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('password_confirmation', 'Confirm Password:') !!}
			{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Reginter', ['class' => 'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
@stop