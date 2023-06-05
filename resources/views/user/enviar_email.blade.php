@extends('layout.default')

@section('main')
    <div class="container">
        <h1>Enviar Email</h1>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        {!! Form::open(['route' => 'user.store_email']) !!}

            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
            </div>

            {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
@endsection
