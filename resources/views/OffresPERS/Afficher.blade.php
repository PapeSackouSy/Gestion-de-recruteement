@include('Dashboard.Dashboard')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
data-sidebar-position="fixed" data-header-position="fixed">
<div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex flex-column">
  <div class="d-flex align-items-center justify-content-center flex-grow-1">
    <div class="row justify-content-center w-100">
      <div class="col-md-5 col-lg-7 col-xxl-2 mt-2 " style="margin-top: 50px;">
        <div class="card mb-4">
          <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif
                    <h2>Liste Offres Pers</h2>
                    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Rechercher">
                     <table id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Titre</th>
                                        <th style="width:27%">Action</th>
                                    </tr>
                                </thead>
                                 <tbody>
                                            @foreach ($offrespers as $offre)

                                                        <tr>
                                                            <td>{{ $offre->Titre }}</td>
                                                            <td>
                                                                <a href="#" class="btn btn-primary">editer</a>
                                                                <a href="#" class="btn btn-danger">supprimer</a>
                                                            </td>
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
</div>
</div>

