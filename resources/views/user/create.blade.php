@extends('layout.default')

@section('main')
<div class="container border col-5 col-xs-4 col-sm-4 col-lg-3 col-md-4 mt-5 bg-dark text-light">
    <div class="box mt-2">
        <div class="box-header">
            <div class="box-title">
                <h1>{{$title}}</h1>
            </div>
            <br>
        </div>
    </div>
    {{ Form::open(['class' => 'form-horizontal','method' => 'POST', 'route' => 'user.store',
        'enctype' => 'multipart/form-data']) }}
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('username', 'Username', ['class' => 'control-label col-md-3 col-lg-2']) }}
            <input type="text" id="username" name="username" class="form-control" value="" oninput="addAtSymbol(this)">
            @if($errors->has('username'))
            <div class="alert alert-warning">
                {!! $errors->first('username') !!}
            </div>
            @endif
        </div>

    </div>
    <div class="form-group">
        {{ Form::label('name', 'Nome completo', ['class' => 'control-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
        @if($errors->has('name'))
        <div class="alert alert-warning">
            {!! $errors->first('name')!!}
        </div>
        @endif

    </div>
    <div class="form-group">
        {{ Form::label('email', 'Email', ['class' => 'control-label col-md-3 col-lg-2']) }}
        {{ Form::text('email', null, ['class' => 'form-control', 'rows' => 4]) }}
        @if($errors->has('email'))
        <div class="alert alert-danger">
            {!! $errors->first('email')!!}
        </div>
        @endif

    </div>
    <div class="form-group">
        {!! Form::label('password', 'Senha') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
        @if($errors->has('password'))
        <div class="alert alert-danger">
            {{ $errors->first('password') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('password_confirmation', 'Confirme a senha') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        @if($errors->has('password'))
        <div class="alert alert-danger">
            {{ $errors->first('password') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        {!! Form::label('imagem', 'Foto de perfil', ['class' => 'control-label ']) !!}
        {!! Form::file('imagem', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {{ Form::select('id_perfil', $perfis, $id_perfil ?? null, ['autofocus']) }}
    </div>
    <br>
    <a href="{{route('user.login')}}">Ja sou cadastrado</a>

    <div class="box-footer mb-2 text-end">
        <br>
        <button type="submit" class="btn btn-primary btn-submit ">CADASTRAR</button>
    </div>
    {{ Form::close() }}
</div>
</div>
@endsection