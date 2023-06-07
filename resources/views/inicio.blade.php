@extends('layout.default')

@section('main')

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #87cefa;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Help PVH</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link active" href="#">Sobre</a>
                    <a class="nav-link active" href="{{ route('user.create', ['id_perfil' => 'Cidadão']) }}">Sou cidadão</a>
                    <a class="nav-link active" href="{{ route('user.create', ['id_perfil' => 'Orgão']) }}">Sou Órgão</a>
                    <a class="nav-link active" href="{{route('user.login')}}">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="box-body text-center">
        <div class="row">
{{--            <div class="col col-md-6">--}}
{{--                <img src={{asset('img/mapalocal.png')}}--}}
{{--                         width="700" height="650" style="border: 5px solid #ccc; border-radius: 15px;">--}}
{{--            </div>--}}
            <div class="col-md-6 text-right">
                <h2>Com o Help PVH, você faz a diferença: junte-se a nós e transforme a cidade em um lugar melhor!</h2>
                <br>
                <h3>Colaboração</h3>
                <p>Colabore com outros cidadãos para melhorar a sua cidade.</p>
                <h3>Localização</h3>
                <p>Encontre e compartilhe informações sobre melhorias em locais específicos.</p>
                <h3>Gestão</h3>
                <p>Com o Help PVH você faz a diferença!</p>
                <br>
                <p>Faça parte da transformação da nossa cidade. Junte-se a nós!</p>
                <a href="#" class="btn btn-primary">Cadastre-se agora</a>
            </div>
        </div>
    </div>
@endsection


