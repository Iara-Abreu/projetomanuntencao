@extends('layout.default')
@section('main')
    <style>
        #map {
            height: 400px;
            width: 100%;
            margin-bottom: 20px;
        }
    </style>

    <div class="container border justify-content-between">
        <div class="box">
            <div class="box-title">
                <h3>{{ $title }}</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            {{ Form::label('descricao', 'Descrição') }}
                            {{ Form::textarea('descricao', null, ['class' => 'form-control', 'id' => 'address']) }}
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="container border">
                            <h3 class="mt-3">Pesquisar Endereço no Mapa</h3>
                            {!! Form::open(['route' => 'getCoordinates', 'method' => 'GET', 'id' => 'addressForm']) !!}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('rua', 'Logradouro') }}
                                        {{ Form::text('rua', null, ['class' => 'form-control', 'id' => 'address']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('nr_endereco', 'Número') }}
                                        {{ Form::text('nr_endereco', null, ['class' => 'form-control', 'id' => 'number']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('bairro', 'Bairro') }}
                                        {{ Form::select('bairro',$bairros, ['class' => 'form-control', 'id' => 'neighborhood']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('municipio', 'Município') }}
                                        {{ Form::text('municipio', 'Porto Velho', ['class' => 'form-control', 'id' => 'city']) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="map"></div>
                                </div>
                            </div>
                            {{ Form::submit('Pesquisar', ['class' => 'btn btn-primary']) }}
                            {!! Form::close() !!}

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('coordenada', '') }}
                                    {{ Form::text('coordenada', null, ['class' => 'form-control', 'id' => 'coordinates']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::open(['route' => 'uploadImage', 'method' => 'GET', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {!! Form::label('imagem[]', 'Imagem', ['class' => 'control-label col-md-3 col-lg-2']) !!}
                    {!! Form::file('imagem[]', ['class' => 'form-control', 'multiple' => true]) !!}
                </div>
                {!! Form::close() !!}


            </div>
        </div>
    </div>
    <div id="fotos-container">
    </div>

    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css"/>

    <script>
        $(document).ready(function () {
            var mymap = L.map('map').setView([0, 0], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org">OpenStreetMap</a> contributors'
            }).addTo(mymap);

            var marker;

            $('#addressForm').submit(function (event) {
                event.preventDefault();

                var formData = $(this).serialize();
                $.ajax({
                    url: '{{ route('getCoordinates') }}',
                    type: 'GET',
                    data: formData,
                    success: function (response) {
                        var latitude = parseFloat(response.latitude);
                        var longitude = parseFloat(response.longitude);

                        // Remove o marcador anterior, se existir
                        if (marker) {
                            mymap.removeLayer(marker);
                        }

                        // Cria um novo marcador com as coordenadas
                        marker = L.marker([latitude, longitude]).addTo(mymap);

                        // Centraliza o mapa nas coordenadas do marcador
                        mymap.setView([latitude, longitude], 13);

                        // Exibe as coordenadas no campo de texto
                        $('#coordinates').val('Latitude: ' + latitude + ', Longitude: ' +
                            longitude);
                    },
                    error: function () {
                        $('#coordinates').val('Erro ao buscar o endereço.');
                    }
                });
            });
        });
        $(document).ready(function() {
            $('#imagem').change(function() {
                var formData = new FormData();
                formData.append('imagem', $('#imagem')[0].files[0]);

                $.ajax({
                    url: '{{ route("uploadImage") }}',
                    type: 'GET',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        var imageUrl = response.image_url;

                        var imageElement = $('<img>').attr('src', imageUrl);
                        $('#fotos-container').append(imageElement);
                    },
                    error: function() {
                        alert('Erro ao enviar a imagem.');
                    }
                });
            });
        });

    </script>
@endsection
