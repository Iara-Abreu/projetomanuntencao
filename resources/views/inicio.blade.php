@extends('layout.default')

@section('main')
    <div class="container border col-12 bg-primary text-light text-center">
        <div class="box mt-2">
            <div class="box-header">
                <div class="box-title">
                    <h1>Help PVH</h1>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="box-body text-center">
        <div class="box-header with-border">
            <div class="form-group">
                <h1>Bem-vindo ao HELP PVH</h1>
                <br>
            </div>
            <div class="box-body">
                <div class="container container">
                <div class="row">
                    <div class="col col-md-6">
                        <img src={{asset('img/mapalocal.png')}}
                                     width="700" height="650"
                             style="border: 5px solid #ccc; border-radius: 15px;">
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
        {{--                <div class="container">--}}
        {{--                    <p>A plataforma de colaboração para melhorias da cidade</p>--}}
        {{--                    <a href="#" class="btn btn-primary">Comece agora</a>--}}
        {{--                </div>--}}
    </div>
</div>
@endsection


