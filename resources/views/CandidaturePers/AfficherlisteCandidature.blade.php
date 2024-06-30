@include('Dashboard.Dashboard')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex flex-column">
        <div class="d-flex align-items-center justify-content-center flex-grow-1">
            <div class="row justify-content-center w-100">
                <div class="col-md-7 col-lg-10 col-xxl-10 mt-3">
                    <div class="card mb-2">
                        <div class="card-body">
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
                            <h1>Liste des Candidatures avec leurs Offres</h1>
                            <td><a href="#" class="btn btn-success mb-4">Resultats</a></td>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Email</th>
                                        <th>Date de naissance</th>
                                        <th>Diplomes</th>
                                        <th>Experiences</th>
                                        <th>Publications</th>

                                        <th>Autres Informations</th>
                                        <th>Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($candidats as $index => $candidat)
                                        @php
                                            $user = $users[$index] ?? null;
                                        @endphp
                                        @if($user)
                                            <tr>
                                                <td>{{ $candidat->id }}</td>
                                                <td>{{ $user->nom }}</td>
                                                <td>{{ $user->prenom }}</td>
                                                <td>{{ $candidat->candidat->email }}</td>
                                                <td>{{ $candidat->candidat->datenaissance ?? 'Non disponible' }}</td>
                                                <td>
                                                    @foreach ($candidat->candidat->diplomes as $diploma)
                                                    <li>{{ $diploma->pub_titre }} - {{ $diploma->pub_institution }} ({{ $diploma->pub_annee }})</li>
                                                     @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($candidat->candidat->experiences as $experience)
                                                    <li>{{ $experience->exp_titre }} A {{ $experience->nom }} de {{ $experience->duree }} - {{ $experience->ex_description }}</li>
                                                   @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($candidat->candidat->publications as $publication)
                                                    <li>{{ $publication->titre }} - {{ $publication->journal }} ({{ $publication->annee }}) - <a href="{{ $publication->lien }}">{{ $publication->lien }}</a></li>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <strong>Adresse:</strong> {{ $user->adresse }} <br>
                                                    <strong>Téléphone:</strong> {{ $user->telephone }} <br>
                                                    <strong>Date de Création du Dossier:</strong> {{ $candidat->datedecreation }} <br>

                                                    @if($candidat->candidat->cv)
                                                        <strong>CV :</strong>
                                                        <a href="{{ route('download.cv', $candidat->id) }}">Télécharger CV</a><br>
                                                    @else
                                                        <strong>CV :</strong> Non disponible<br>
                                                    @endif

                                                    @if($candidat->candidat->lettre)
                                                        <strong>Lettre de Motivation :</strong>
                                                        <a href="{{ route('download.lettre', $candidat->id) }}">Télécharger Lettre</a><br>
                                                    @else
                                                        <strong>Lettre de Motivation :</strong> Non disponible<br>
                                                    @endif

                                                    @if($candidat->candidat->these)
                                                        <strong>Thèse :</strong>
                                                        <a href="{{ route('download.these', $candidat->id) }}">Télécharger Thèse</a><br>
                                                    @else
                                                        <strong>Thèse :</strong> Non disponible<br>
                                                    @endif
                                                </td>
                                                <td><a href="{{route('indexEva',$user->id)}}" class="btn btn-danger">Evaluation</a></td>

                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $candidats->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
