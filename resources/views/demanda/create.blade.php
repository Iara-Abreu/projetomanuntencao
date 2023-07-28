@extends('layout.default')

@section('main')
    <style>
        #map {
            height: 400px;
            width: 100%;
            margin-bottom: 20px;
        }
    </style>

    <div class="container border col-md-7">
        <div class="box">
            <div class="box-title">
                <h3>{{ $title }}</h3>
            </div>
            {!! Form::open([
            'class' => 'form-horizontal',
            'method' => 'POST',
            'route' => 'demanda.store',
            'enctype' => 'multipart/form-data',
            ]) !!}
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            {{ Form::label('ds_demanda', 'Descrição') }}
                            {{ Form::textarea('ds_demanda', null, ['class' => 'form-control', 'id' => 'address']) }}
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('coordenada', '') }}
                                    {{ Form::text('coordenada', null, ['class' => 'form-control', 'id' => 'coordinates']) }}
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                {{ Form::label('tipoDemanda', 'Tipo de Demanda') }}
                                {{ Form::select('tipoDemanda', ['Selecione o tipo'] + $tipoDemandas, null, ['class' => 'form-control c', 'id' => 'neighborhood']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('imagem', 'Imagem', ['class' => 'control-label col-md-3 col-lg-2']) !!}
                            {!! Form::file('imagem', ['class' => 'form-control']) !!}
                        </div>

                        <div class="row">
                            {{ Form::submit('Publicar', ['class' => 'btn btn-primary', 'type' => 'submit']) }}
                        </div>

                        {{ Form::hidden('id_bairro', null, ['id' => 'id_bairro']) }}

                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-5">
                        <div class="container border mt-3 mb-3">
                            <h3 class="mt-3">Pesquisar Endereço no Mapa</h3>
                            {!! Form::open(['route' => 'getCoordinates', 'method' => 'GET', 'id' => 'addressForm']) !!}

                            <div class="row">
                                <div class="form-group col-md-6">
                                    {{ Form::label('rua', 'Logradouro') }}
                                    {{ Form::text('rua', null, ['class' => 'form-control', 'id' => 'address']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    {{ Form::label('nr_endereco', 'Número') }}
                                    {{ Form::text('nr_endereco', null, ['class' => 'form-control chosen', 'id' => 'number']) }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    {{ Form::label('bairro', 'Bairro') }}
                                    {{ Form::select('bairro', ['Selecione'] + $bairros, null, ['class' => 'form-control c', 'id' => 'neighborhood']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    {{ Form::label('municipio', 'Município') }}
                                    {{ Form::text('municipio', 'Porto Velho', ['class' => 'form-control', 'id' => 'city']) }}
                                </div>
                            </div>

                            <div id="map"></div>

                            <div class="row">
                                {{ Form::submit('Pesquisar', ['class' => 'btn btn-success']) }}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="fotos-container">
        <!-- Additional content if needed -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />

    <!-- Map Script -->
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
                    url: '{{ route('getCoordinates') }}',
                    type: 'GET',
                    data: formData,
                    success: function(response) {
                        var latitude = parseFloat(response.latitude);
                        var longitude = parseFloat(response.longitude);

                        // Remove the previous marker, if exists
                        if (marker) {
                            mymap.removeLayer(marker);
                        }

                        // Create a new marker with the coordinates
                        marker = L.marker([latitude, longitude]).addTo(mymap);

                        // Center the map on the marker's coordinates
                        mymap.setView([latitude, longitude], 13);

                        // Display the coordinates in the text field
                        $('#coordinates').val('Latitude: ' + latitude + ', Longitude: ' +
                            longitude);
                    },
                    error: function() {
                        $('#coordinates').val('Erro ao buscar o endereço.');
                    }
                });
            });
        });
    </script>
    <!-- Image Upload Script -->
    <script>
        $(document).ready(function() {
            $('#imagem').change(function() {
                var formData = new FormData();
                var files = $('#imagem')[0].files;

                for (var i = 0; i < files.length; i++) {
                    formData.append('imagem[]', files[i]);
                }

                $.ajax({
                    url: '{{ route('uploadImage') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        var imageUrls = response.image_urls;

                        for (var i = 0; i < imageUrls.length; i++) {
                            var imageUrl = imageUrls[i];

                            var imageElement = $('<img>').attr('src', imageUrl);
                            $('#fotos-container').append(imageElement);
                        }
                    },
                    error: function() {
                        alert('Erro ao enviar as imagens.');
                    }
                });
            });
        });
    </script>
@endsection
