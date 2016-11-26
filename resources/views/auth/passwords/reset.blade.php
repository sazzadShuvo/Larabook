@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1>Reset Your Password</h1>

            @include('layouts.partials.errors')

            {!! Form::open(['route' => 'auth.password.reset']) !!}

                {!! Form::hidden('token', $token) !!}

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
                    {!! Form::submit('Reset Password', ['class' => 'btn btn-primary form-control']) !!}
                </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop