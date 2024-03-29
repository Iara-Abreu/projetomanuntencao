<!DOCTYPE html>
<html>

<head>
    <!-- Seus outros elementos head -->

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />


    <!-- Seus outros arquivos CSS -->

    <!-- Estilo para a cor de fundo da página -->
    <style>
        body {
            background-color: #B0E0E6;
            /* Substitua pela cor que você deseja usar */
        }
    </style>

    <!-- Scripts JS do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&libraries=places"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        function addAtSymbol(input) {
            // Verifica se o valor começa com "@", caso contrário, adiciona-o
            if (!input.value.startsWith('@')) {
                input.value = '@' + input.value;
            }
        }
    </script>

</head>

<body>
    <header class="mb-3">
        <nav class="navbar navbar-expand-lg navbar-light fixed" style="background-color: #48d1cc;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">HELP PVH</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto"> <!-- Use ms-auto instead of ml-auto -->
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                        <a class="nav-link" href="{{ route('sobre.index') }}">Sobre</a>
                        @guest
                        <a class="nav-link" href="{{ route('user.create', ['id_perfil' => 'Cidadão']) }}">Sou
                            cidadão</a>
                        <a class="nav-link" href="{{ route('user.create', ['id_perfil' => 'Orgão']) }}">Sou Órgão</a>
                        @else
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" id="orgaoDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="icon-container">
                                    <img class="rounded-circle" width="35" src="{{ Auth::user()->url_imagem }}" alt="">

                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orgaoDropdown">
                                <a class="dropdown-item" href="#">
                                    <span class="icon-container">
                                        <img class="rounded-circle" width="35" src="{{Auth::user()->url_imagem}}" alt="">

                                    </span>
                                    {{Auth::user()->name}}
                                </a>
                                <a class="dropdown-item" href="{{route('user.logout')}}">Sair</a>
                            </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="container col-md-6">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
    </div>
    @yield('main')

</body>

</html>