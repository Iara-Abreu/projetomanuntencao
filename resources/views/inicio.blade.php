@extends('layout.default')

@section('main')

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('img/testeimagemcel.png')}}" class="d-block mx-auto" alt="50" width="800" height="500">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Teste de texto</h5>
                    <p>Textando o texto</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('img/testeimagemcel.png')}}" class="d-block mx-auto" alt="50" width="800" height="500">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Teste de texto</h5>
                    <p>Textando o texto</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('img/testeimagemcel.png')}}" class="d-block mx-auto" alt="50" width="800" height="500">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Teste de texto</h5>
                    <p>Textando o texto</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <br>
    </div>
    <div class="card text-center" style="width: 50rem; margin: 0 auto; display: flex; justify-content: center; align-items: center;">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <img src="{{asset('img/testeimagemcel.png')}}" class="card-img-top" alt="50">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="{{asset('img/testeimagemcel.png')}}" class="card-img-top" alt="50">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="{{asset('img/testeimagemcel.png')}}" class="card-img-top" alt="50">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


