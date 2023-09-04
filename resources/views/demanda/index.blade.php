@extends('layout.default')

@section('main')
<div class="container mt-2 pb-5 ">
    <div class="container-fluid mt-2 ml-3 mr-3">
        <div class="box">
            <div class="box-header d-flex justify-content-between align-items-center">
                <div class="box-title">
                    <h1>{{$title}}</h1>
                </div>
                <div>
                    <a href="{{ route('demanda.create') }}" class="btn btn-success">Adicionar</a>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3 pb-5">
        @foreach($demanda as $dem)
            <div class="card mb-4">
                <img class="card-img-top" src="{{ $dem->url_imagem }}" alt="Imagem do Card" style="height: 200px;">
                <div class="card-body" style="min-height: 140px">
                    <h5 class="card-title">
                        {{$dem->ds_demanda}}
                    </h5>
                </div>
                <div class="card-footer">
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
