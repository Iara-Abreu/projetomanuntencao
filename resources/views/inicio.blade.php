@extends('layout.default')

@section('main')

<div class="">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="#">Sobre</a>
                    <a class="nav-link" href="{{ route('user.create', ['id_perfil' => 'Cidadão']) }}">Sou cidadão</a>
                    <a class="nav-link" href="{{ route('user.create', ['id_perfil' => 'Orgão']) }}">Sou Órgão</a>
                    <a class="nav-link" href="{{route('user.login')}}">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="box-body text-center">
        <div class="box-header with-border">
            <div class="box-body">
                <div class="row">
                    <div class="col col-md-6">
                        <img src={{asset('img/mapalocal.png')}}
                                     width="700" height="650" style="border: 5px solid #ccc; border-radius: 15px;">
                    </div>
                        <div class="col-md-6 text-right">
                            <h2>Recursos Principais:</h2>
                            <br>
                            <h3>Colaboração</h3>
                            <p>Colabore com outros cidadãos para melhorar a sua cidade.</p>
                            <h3>Localização</h3>
                            <p>Encontre e compartilhe informações sobre melhorias em locais específicos.</p>
                            <h3>Gestão</h3>
                            <p>Acompanhe o progresso das melhorias e colabore com a gestão.</p>
                            <br>
                            <h2>Junte-se a nós e faça a diferença!</h2>
                            <a href="#" class="btn btn-primary">Cadastre-se agora</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection


