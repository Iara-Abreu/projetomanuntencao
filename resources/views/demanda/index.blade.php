@extends('layout.default')

@section('main')
    <div class="container mt-2 pb-5 ">
        <div class="container-fluid mt-2 ml-3 mr-3">
            <div class="box">
                <div class="box-header d-flex justify-content-between align-items-center">
                    <div class="box-title">
                        <h1>{{ $title }}</h1>
                    </div>
                    <div>
                        <a href="{{ route('demanda.create') }}" class="btn btn-success">Adicionar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid gedf-wrapper">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="h5">{{ Auth::user()->name }}</div>
                            <div class="h7 text-muted">Fullname : Miracles Lee Cross</div>
                            <div class="h7">Developer of web applications, JavaScript, PHP, Java, Python, Ruby, Java,
                                Node.js,
                                etc.
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="h6 text-muted">Followers</div>
                                <div class="h5">5.2342</div>
                            </li>
                            <li class="list-group-item">
                                <div class="h6 text-muted">Following</div>
                                <div class="h5">6758</div>
                            </li>
                            <li class="list-group-item">Vestibulum at eros</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 gedf-main">

                    @foreach ($demanda as $dem)
                        <div class="mt-3 pb-5">
                            <div class="card gedf-card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="mr-2">
                                                <img class="rounded-circle" width="45" src="https://picsum.photos/50/50"
                                                    alt="">
                                            </div>
                                            <div class="ml-2">
                                                <div class="h5 m-0"></div>
                                                <div class="h7 text-muted">{{ $dem->bairro->ds_bairro }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>10 min ago</div>
                                        <p class="card-text">
                                         {{$dem->ds_demanda}}
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>
                                        <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
                                        <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
                                    </div>
                                </div>
                    @endforeach
                </div>
            </div>
        @endsection
