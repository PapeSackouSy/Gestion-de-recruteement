@include('Dashboard.Dashboard')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex flex-column">
        <div class="d-flex align-items-center justify-content-center flex-grow-1">
            <div class="row justify-content-center w-100">
                <div class="col-md-7 col-lg-10 col-xxl-10 mt-3" style="margin-top: 30px;">
                    <div class="card mb-2">
                        <div class="card-body">
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                            @endif
                            <h1>Liste des Offres </h1>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Titre</th>
                                         <th>Listes Des Candidatures</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($offres as $offre)
                                        <tr>
                                          <td>{{$offre->id}}</td>
                                          <td>{{$offre->Profil}}</td>
                                          <td><a href="{{route('AfficherListCandidat',$offre->id)}}" class="btn btn-success ">Voire Candidature</a></td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
