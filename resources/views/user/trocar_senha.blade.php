@extends('layout.default')

@section('main')
    <div class="container">
        <h1>Trocar Senha</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        {!! Form::open(['route' => ['user.trocar.senha.post', request('id')], 'method' => 'POST']) !!}


            <div class="form-group">
                {!! Form::label('password', 'Nova Senha') !!}
                {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
            </div>

            {!! Form::submit('Trocar Senha', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
@endsection
