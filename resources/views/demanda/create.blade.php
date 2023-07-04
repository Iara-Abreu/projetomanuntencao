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
{{ Form::open(['route' => 'getCoordinates', 'method' => 'POST', 'id' => 'addressForm']) }}

<div class="row">
    <div class="col-md-4">
        <div class="col-md-9">
            <div class="form-group">
                {{ Form::label('rua', 'Logradouro') }}
                {{ Form::text('rua', null, ['class' => 'form-control', 'id' => 'address']) }}
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                {{ Form::label('nr_endereco', 'Número') }}
                {{ Form::text('nr_endereco', null, ['class' => 'form-control', 'id' => 'number']) }}
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                {{ Form::label('bairro', 'Bairro') }}
                {{ Form::text('bairro', null, ['class' => 'form-control', 'id' => 'neighborhood']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('cep', 'CEP') }}
                {{ Form::text('cep', null, ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="form-group">
                {{ Form::label('municipio', 'Município') }}
                {{ Form::text('municipio', null, ['class' => 'form-control', 'id' => 'city']) }}
            </div>
        </div>
    </div>
</div>

<form id="addressForm">
    @csrf
    <button type="submit">Pesquisar</button>
</form>
{{ Form::close() }}


<div id="map"></div>

<div class="col-md-12 col-lg-6">
    <div class="form-group">
        {{ Form::label('coordenada', '') }}
        {{ Form::text('coordenada', null, ['class' => 'form-control', 'id' => 'city']) }}
    </div>
</div>

<!-- Exibir coordenadas aqui -->
<div id="coordinatesResult"></div>

<script>
    var map;
    var marker;

    function setMap(lat, lng) {
        if (map) {
            map.remove();
        }
        map = L.map('map').setView([lat, lng], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        marker = L.marker([lat, lng]).addTo(map);
    }
</script>

<script>
    $(document).ready(function () {
        $('#addressForm').on('submit', function (e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: '{{ route('getCoordinates') }}',
                data: formData,
                success: function (response) {
                    if (response.success) {
                        var coordenadas = response.coordenadas;
                        setMap(parseFloat(coordenadas.lat), parseFloat(coordenadas.lng)); // Set the map and marker
                        var coordenadasResult = 'Latitude: ' + coordenadas.lat + '<br>Longitude: ' + coordenadas.lng;
                        $('#coordinatesResult').html(coordenadasResult);
                        $('#coordenada').val(coordenadas.lat + ', ' + coordenadas.lng);
                    } else {
                        alert('Endereço não encontrado.');
                    }
                },
                error: function (xhs,status,error) {
                    alert('Ocorreu um erro ao processar a solicitação.');
                }
            });
        });
    });
</script>
@endsection
