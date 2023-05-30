@extends('layout.default')

@section('content')
    <header>
        <nav>
            <!-- Seu código HTML para a barra de navegação -->
        </nav>
    </header>

    <section class="hero">
        <div class="container">
            <h1>Bem-vindo ao HELP PVH</h1>
            <p>A plataforma de colaboração para melhorias da cidade</p>
            <a href="#" class="btn btn-primary">Comece agora</a>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <h2>Recursos Principais</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature">
                        <i class="fas fa-users"></i>
                        <h3>Colaboração</h3>
                        <p>Colabore com outros cidadãos para melhorar a sua cidade.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature">
                        <i class="fas fa-map-marked-alt"></i>
                        <h3>Localização</h3>
                        <p>Encontre e compartilhe informações sobre melhorias em locais específicos.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature">
                        <i class="fas fa-cogs"></i>
                        <h3>Gestão</h3>
                        <p>Acompanhe o progresso das melhorias e colabore com a gestão.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta">
        <div class="container">
            <h2>Junte-se a nós e faça a diferença!</h2>
            <a href="#" class="btn btn-primary">Cadastre-se agora</a>
        </div>
    </section>
@endsection
