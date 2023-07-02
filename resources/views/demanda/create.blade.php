@extends('layout.default')
<style>
    #map {


        #map {



            #map {
                height: 400px;
                width: 100%;
                margin-bottom: 20px;
            }
</style>
<h1>Pesquisar Endereço no Mapa</h1>
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

<div id="map"></div>


<!-- Exibir coordenadas aqui -->
<div id="coordinatesResult"></div>

<script>
    var map;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: -23.5505199,
                lng: -46.6333094
            },
            zoom: 15
        });
    }

    $(document).ready(function() {
                $('#addressForm').on('submit', function(e) {
                            e.preventDefault();
                            var formData = $(this).serialize();

                            $.ajax({
                                        type: 'POST',
                                        url: '{{ route('getCoordinates') }}',
                                        data: formData,
                                        success: function(response) {
                                                if (response.success) {
                                                    var coordinates = response.coordinates;
                                                    var location = {
                                                        lat: parseFloat(coordinates.lat),
                                                        lng: parseFloat(coordinates.lng)
                                                    };
                                                    map.setCenter(location);

                                                    var marker = new google.maps.Marker({
                                                        position: location,
                                                        map: map,
                                                        title: response.address
                                                    });

                                                    // Exibir coordenadas na tela
                                                    var coordinatesResult = 'Latitude:

                                                    var map;

                                                    function initMap() {
                                                        map = new google.maps.Map(document.getElementById('map'), {
                                                            center: {
                                                                lat: -23.5505199,
                                                                lng: -46.6333094
                                                            },
                                                            zoom: 15
                                                        });
                                                    }

                                                    $(document).ready(function() {
                                                                $('#addressForm').on('submit', function(e) {
                                                                            e.preventDefault();
                                                                            var formData = $(this).serialize();

                                                                            $.ajax({
                                                                                        type: 'POST',
                                                                                        url: '{{ route('getCoordinates') }}',
                                                                                        data: formData,
                                                                                        success: function(response) {
                                                                                                if (response.success) {
                                                                                                    var coordinates =
                                                                                                        response
                                                                                                        .coordinates;
                                                                                                    var location = {
                                                                                                        lat: parseFloat(
                                                                                                            coordinates
                                                                                                            .lat
                                                                                                            ),
                                                                                                        lng: parseFloat(
                                                                                                            coordinates
                                                                                                            .lng
                                                                                                            )
                                                                                                    };
                                                                                                    map.setCenter(
                                                                                                        location);

                                                                                                    var marker =
                                                                                                        new google.maps
                                                                                                        .Marker({
                                                                                                            position: location,
                                                                                                            map: map,
                                                                                                            title: response
                                                                                                                .address
                                                                                                        });

                                                                                                    // Exibir coordenadas na tela
                                                                                                    var coordinatesResult =
                                                                                                        'Latitude

                                                                                                    var map;

                                                                                                    function initMap() {
                                                                                                        map = new google
                                                                                                            .maps.Map(
                                                                                                                document
                                                                                                                .getElementById(
                                                                                                                    'map'
                                                                                                                    ), {
                                                                                                                    center: {
                                                                                                                        lat: -
                                                                                                                            23.5505199,
                                                                                                                        lng: -
                                                                                                                            46.6333094
                                                                                                                    },
                                                                                                                    zoom: 15
                                                                                                                });
                                                                                                    }

                                                                                                    $(document).ready(
                                                                                                            function() {
                                                                                                                $('#addressForm')
                                                                                                                    .on('submit',
                                                                                                                        function(
                                                                                                                            e
                                                                                                                            ) {
                                                                                                                            e
                                                                                                                        .preventDefault();
                                                                                                                            var formData =
                                                                                                                                $(
                                                                                                                                    this)
                                                                                                                                .serialize();

                                                                                                                            $.ajax({
                                                                                                                                        type: 'POST',
                                                                                                                                        url: '{{ route('getCoordinates') }}',
                                                                                                                                        data: formData,
                                                                                                                                        success: function(
                                                                                                                                                response
                                                                                                                                                ) {
                                                                                                                                                if (response
                                                                                                                                                    .success
                                                                                                                                                    ) {
                                                                                                                                                    var coordinates =
                                                                                                                                                        response
                                                                                                                                                        .coordinates;
                                                                                                                                                    var location = {
                                                                                                                                                        lat: parseFloat(
                                                                                                                                                            coordinates
                                                                                                                                                            .lat
                                                                                                                                                            ),
                                                                                                                                                        lng: parseFloat(
                                                                                                                                                            coordinates
                                                                                                                                                            .lng
                                                                                                                                                            )
                                                                                                                                                    };
                                                                                                                                                    map.setCenter(
                                                                                                                                                        location
                                                                                                                                                        );

                                                                                                                                                    var marker =
                                                                                                                                                        new google
                                                                                                                                                        .maps
                                                                                                                                                        .Marker({
                                                                                                                                                            position: location,
                                                                                                                                                            map: map,
                                                                                                                                                            title: response
                                                                                                                                                                .address
                                                                                                                                                        });

                                                                                                                                                    // Exibir coordenadas na tela
                                                                                                                                                    var coordinatesResult =
                                                                                                                                                        'Latitude: ' +
                                                                                                                                                        coordinates
                                                                                                                                                        .lat +
                                                                                                                                                        '<

                                                                                                                                                    var
                                                                                                                                                    map;

                                                                                                                                                    function initMap() {
                                                                                                                                                        map =
                                                                                                                                                            new google
                                                                                                                                                            .maps
                                                                                                                                                            .Map(
                                                                                                                                                                document
                                                                                                                                                                .getElementById(
                                                                                                                                                                    'map'
                                                                                                                                                                    ), {
                                                                                                                                                                    center: {
                                                                                                                                                                        lat: -
                                                                                                                                                                            23.5505199,
                                                                                                                                                                        lng: -
                                                                                                                                                                            46.6333094
                                                                                                                                                                    },
                                                                                                                                                                    zoom: 15
                                                                                                                                                                }
                                                                                                                                                                );
                                                                                                                                                    }

                                                                                                                                                    $(document)
                                                                                                                                                        .ready(
                                                                                                                                                            function() {
                                                                                                                                                                $('#addressForm')
                                                                                                                                                                    .on('submit',
                                                                                                                                                                        function(
                                                                                                                                                                            e
                                                                                                                                                                            ) {
                                                                                                                                                                            e
                                                                                                                                                                        .preventDefault();
                                                                                                                                                                            var formData =
                                                                                                                                                                                $(
                                                                                                                                                                                    this)
                                                                                                                                                                                .serialize();

                                                                                                                                                                            $.ajax({
                                                                                                                                                                                type: 'POST',
                                                                                                                                                                                url: '{{ route('getCoordinates') }}',
                                                                                                                                                                                data: formData,
                                                                                                                                                                                success: function(
                                                                                                                                                                                    response
                                                                                                                                                                                    ) {
                                                                                                                                                                                    if (response
                                                                                                                                                                                        .success
                                                                                                                                                                                        ) {
                                                                                                                                                                                        var coordinates =
                                                                                                                                                                                            response
                                                                                                                                                                                            .coordinates;
                                                                                                                                                                                        var location = {
                                                                                                                                                                                            lat: parseFloat(
                                                                                                                                                                                                coordinates
                                                                                                                                                                                                .lat
                                                                                                                                                                                                ),
                                                                                                                                                                                            lng: parseFloat(
                                                                                                                                                                                                coordinates
                                                                                                                                                                                                .lng
                                                                                                                                                                                                )
                                                                                                                                                                                        };
                                                                                                                                                                                        map.setCenter(
                                                                                                                                                                                            location
                                                                                                                                                                                            );

                                                                                                                                                                                        var marker =
                                                                                                                                                                                            new google
                                                                                                                                                                                            .maps
                                                                                                                                                                                            .Marker({
                                                                                                                                                                                                position: location,
                                                                                                                                                                                                map: map,
                                                                                                                                                                                                title: response
                                                                                                                                                                                                    .address
                                                                                                                                                                                            });

                                                                                                                                                                                        // Exibir coordenadas na tela
                                                                                                                                                                                        var coordinatesResult =
                                                                                                                                                                                            'Latitude: ' +
                                                                                                                                                                                            coordinates
                                                                                                                                                                                            .lat +
                                                                                                                                                                                            '<br>Longitude: ' +
                                                                                                                                                                                            coordinates
                                                                                                                                                                                            .lng;
                                                                                                                                                                                        $('#coordinatesResult')
                                                                                                                                                                                            .html(
                                                                                                                                                                                                coordinatesResult
                                                                                                                                                                                                );
                                                                                                                                                                                    } else {
                                                                                                                                                                                        alert
                                                                                                                                                                                            (
                                                                                                                                                                                                'Endereço não encontrado.');
                                                                                                                                                                                    }
                                                                                                                                                                                },
                                                                                                                                                                                error: function() {
                                                                                                                                                                                    alert
                                                                                                                                                                                        (
                                                                                                                                                                                            'Ocorreu um erro ao processar a solicitação.');
                                                                                                                                                                                }
                                                                                                                                                                            });
                                                                                                                                                                        }
                                                                                                                                                                        );
                                                                                                                                                            }
                                                                                                                                                            );
</script>
