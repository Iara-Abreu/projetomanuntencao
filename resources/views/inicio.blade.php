@extends('layout.default')

@section('main')

    <div class="box-body text-center">
        <div class="row">
            <div class="col col-md-6">
                <img src={{asset('img/mapalocal.png')}}
                         width="700" height="650" style="border: 5px solid #ccc; border-radius: 15px;">
            </div>
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


