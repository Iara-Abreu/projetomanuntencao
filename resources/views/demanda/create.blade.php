@extends('layout.default')
<div class="row">
    <div class="col-md-4 col-lg-4">
        <div class="col-md-9">
            <div class="form-group">
                {{ Form::label('rua', 'Logradouro') }}
                {{ Form::text('rua', null, ['class' => 'form-control']) }}

            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                {{ Form::label('nr_endereco', 'Número') }}
                {{ Form::text('nr_endereco', null, ['class' => 'form-control']) }}

            </div>
        </div>

        <div class="col-md-8">
            <div class="form-group">
                {{ Form::label('bairro', 'Bairro') }}
                {{ Form::text('bairro', null, ['class' => 'form-control']) }}
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
                {{ Form::label('complemento', 'Complemento') }}
                {{ Form::text('complemento', null, ['class' => 'form-control']) }}

            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="form-group">
                {{ Form::label('municipio', 'Município') }}
                {{ Form::text('municipio', null, ['class' => 'form-control']) }}

            </div>
        </div>

        <div class="col-md-7 col-lg-6">
            <div class="form-group">
                <button id="btnProcurar" type="button" data-loading-text="Aguarde..."
                    class="btn btn-success btn-block">
                    PROCURAR COORDENADA <span class="hidden-md"> DO ENDEREÇO</span>
                </button>
            </div>
            <div class="col-md-5 col-lg-6">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Coordenada</div>
                        <input type="text" class="form-control" id="coordenada" name="coordenada" readonly
                            value="{{ old('coordenada') }}">
                    </div>
                </div>
            </div>
            <hr class="hidden-lg">
        </div>
        <div class="col-md-4 col-lg-4">
            <div id="map" class="img-rounded"></div>
        </div>



        <script src="https://unpkg.com/leaflet@1.9.1/dist/leaflet.js"
            integrity="sha256-NDI0K41gVbWqfkkaHj15IzU7PtMoelkzyKp8TOaFQ3s=" crossorigin></script>
        <script>
            let $btnProcurar = $('#btnProcurar');
            let $rua = $('#rua');
            let $nr_casa = $('#nr_endereco');
            let $bairro = $('#bairro');
            let $cep = $('#cep');
            let $municipio = $('#municipio');
            let $coordenada = $('#coordenada');

            let map = L.map('map').setView([-8, -63], 6);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(map);

            let marker = L.marker([-8, -63], {
                draggable: true
            }).addTo(map);

            $btnProcurar.on('click', function() {
                let endereco = $rua.val() + ', ' + $nr_casa.val() + ' - ' + $bairro.val() + ' - ' + $cep.val() + ' - ' +
                    $municipio.val();
                let urlGeocoder = '{{ route('geocoder.search') }}';

                $btnProcurar.button('loading');

                $.ajax({
                    method: 'GET',
                    url: urlGeocoder,
                    data: {
                        address: endereco
                    },
                    success: function(body) {
                        if (body.meta.code === 200 && body.addresses[0].hasOwnProperty('geometry')) {
                            let location = [
                                body.addresses[0].latitude,
                                body.addresses[0].longitude,
                            ];

                            $coordenada.val(JSON.stringify(location));

                            const latlon = [body.addresses[0].latitude, body.addresses[0].longitude];
                            marker.setLatLng(latlon);

                            map.panTo(latlon);
                            map.setView(location, 16);
                        } else {
                            alert('Não encontramos a coordenada do endereço informado.');
                            $coordenada.val('');
                        }
                    },
                    error: function(err) {
                        console.error(err);
                        alert('Não encontramos a coordenada do endereço informado.');
                        $coordenada.val('');
                    }
                })

                setTimeout(function() {
                    $btnProcurar.button('reset');
                }, 1000);
            });
        </script>
