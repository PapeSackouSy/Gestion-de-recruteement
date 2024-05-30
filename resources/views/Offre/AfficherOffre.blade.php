<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Offres</title>
    <link rel="stylesheet" href="{{asset('Auth/Asset2/css/bootstrap.min.css')}}">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .offre {
            border: 1px solid #ccc;
            padding: 16px;
            margin-bottom: 16px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .offre h2 {
            margin-top: 0;
        }
         img {
            width: 445px;
            height: 300px;
            display: block;
            margin-bottom: 16px;
        }
        .offre p {
            margin: 4px 0;
        }
    </style>
</head>
<body>
    <h1>Liste des Offres</h1>
    <a class="btn btn-primary fw-bold ms-2" href="{{route('logout')}}">Retourner</a>
   <div class="container">
    <div class="row">
        @foreach ($offres as $offre)
                 @if(\Carbon\Carbon::parse($offre->Date_close) >= \Carbon\Carbon::now())
                    <div class="col-md-5 mb-4">
                        <div class="card">
                            @if($offre->photos)
                                <img src="{{ asset('storage/photos/'.$offre->photos) }}" alt="Offre photo">
                            @else
                                <p>Aucune photo disponible.</p>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $offre->libelle }}</h5>
                                <p class="card-text">{{ Str::limit($offre->description, 100, '...') }}</p>
                                <a href="{{route('Avis',$offre->id)}}" class="btn btn-primary">Avis de Recrutement</a>
                                <a href="{{route('Postuler',$offre->id)}}" class="btn btn-success">Postuler</a>
                            </div>
                        </div>
                    </div>
                @endif
        @endforeach
    </div>
</div>
</body>
</html>

