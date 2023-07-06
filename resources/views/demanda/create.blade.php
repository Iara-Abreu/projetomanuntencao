@extends('layout.default')
@section('main')
    <style>
        #map {
            height: 400px;
            width: 100%;
            margin-bottom: 20px;
        }
    </style>
    <h1>Pesquisar Endereço no Mapa</h1>
    {!! Form::open(['route' => 'getCoordinates', 'method' => 'GET', 'id' => 'addressForm']) !!}

    <div class="row">
        <div class="col-md-4">
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
                {{ Form::text('bairro', null, ['class' => 'form-control', 'id' => 'neighborhood']) }}
            </div>
            <div class="form-group">
                {{ Form::label('cep', 'CEP') }}
                {{ Form::text('cep', null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('municipio', 'Município') }}
                {{ Form::text('municipio', null, ['class' => 'form-control', 'id' => 'city']) }}
            </div>
        </div>
    </div>
    {{ Form::submit('Pesquisar', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}

    <div id="map"></div>

    <div class="col-md-12 col-lg-6">
        <div class="form-group">
            {{ Form::label('coordenada', '') }}
            {{ Form::text('coordenada', null, ['class' => 'form-control', 'id' => 'coordinates']) }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />

    <script>
        $(document).ready(function() {
            var mymap = L.map('map').setView([0, 0], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org">OpenStreetMap</a> contributors'
            }).addTo(mymap);

            var marker;

            $('#addressForm').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();
                $.ajax({
                    url: '{{ route("getCoordinates") }}',
                    type: 'GET',
                    data: formData,
                    success: function(response) {
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
                        $('#coordinates').val('Latitude: ' + latitude + ', Longitude: ' + longitude);
                    },
                    error: function() {
                        $('#coordinates').val('Erro ao buscar o endereço.');
                    }
                });
            });
        });
    </script>
@endsection
