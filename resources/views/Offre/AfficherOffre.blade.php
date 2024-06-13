<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offres</title>
    <link href="{{asset('Auth/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <style>
        .content-section {
            display: none;
        }
        .active {
            display: block;
        }
        .card img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div id="app" class="container mt-5">
        <h1 class="text-center mb-4">Bienvenue</h1>
        <div class="d-flex justify-content-center mb-4">
            <button id="offres-per-button" class="btn btn-primary me-3">Offre de recrutement des Personnels Administrative (path) </button>
            <button id="offres-path-button" class="btn btn-secondary">Offre  de recrutement des Personnels Enseignants (Pers)</button>
            <a href="{{route('logout')}}" class="btn btn-primary fw-bold ms-2">Retourner</a>
        </div>
        <div id="offres-per" class="content-section">
            <h2 class="text-center mb-4">Offre des Personnels Administrative (path)</h2>
            <div class="row">
                @foreach ($offres as $offre)
                    @if(\Carbon\Carbon::parse($offre->Date_close) >= \Carbon\Carbon::now())
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                @if($offre->photos)
                                    <img src="{{ asset('storage/photos/'.$offre->photos) }}" alt="Offre photo" class="card-img-top">
                                @else
                                    <img src="https://via.placeholder.com/445x300" alt="Image par défaut" class="card-img-top">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $offre->libelle }}</h5>
                                    <p class="card-text">{{ Str::limit($offre->description, 100, '...') }}</p>
                                    <a href="{{ route('Avis', $offre->id) }}" class="btn btn-primary">Avis de Recrutement</a>
                                    <a href="{{ route('Postuler', $offre->id) }}" class="btn btn-success">Postuler</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div id="offres-path" class="content-section">
            <h2 class="text-center mb-4">Offre des Personnels Enseignants (Pers)</h2>
            <div class="row">
                @foreach ($offrespers as $offre)
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            @if($offre->photos)
                                <img src="{{ asset('storage/' . $offre->photos) }}" alt="Offre photo" class="card-img-top">
                            @else
                                <img src="https://via.placeholder.com/445x300" alt="Image par défaut" class="card-img-top">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $offre->Titre }}</h5>
                                <p class="card-text">{{ Str::limit($offre->Description, 100, '...') }}</p>
                                <a href="#" class="btn btn-primary">Avis de Recrutement</a>
                                <a href="#" class="btn btn-success">Postuler</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="{{asset('Auth/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#offres-per-button').on('click', function() {
                $('#offres-path').removeClass('active').hide();
                $('#offres-per').addClass('active').show();
            });
            $('#offres-path-button').on('click', function() {
                $('#offres-per').removeClass('active').hide();
                $('#offres-path').addClass('active').show();
            });
            $('#offres-per').addClass('active').show();
        });
    </script>
</body>
</html>
