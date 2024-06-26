@include('Dashboard.Dashboard')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
data-sidebar-position="fixed" data-header-position="fixed">
<div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex flex-column">
  <div class="d-flex align-items-center justify-content-center flex-grow-1">
    <div class="row justify-content-center w-100">
      <div class="col-md-5 col-lg-7 col-xxl-2 mt-2 " style="margin-top: 50px;">
        <div class="card mb-4">
          <div class="card-body">
            <h2>LISTE DES UFR AVEC LEURS DIRECTEURS</h2>
         <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Rechercher">
        <table id="dataTable">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>ID_DIRECTEUR_UFR</th>
                    <th>EDITER</th>
                    <th>SUPPRIMER</th>
                </tr>
            </thead>
            <tbody>

                    @foreach ($tab as $tabs)
                    <tr>
                        <td>{{$tabs->id}}</td>
                        <td>{{$tabs->nom}}</td>
                        <td>{{$tabs->responsable_ufr_id}}</td>
                        <td><a href="{{route('editerufr',$tabs->id)}}" class="btn btn-success">Editer</a></td>
                        <td><a href="{{route('DropUfr',$tabs->id)}}" class="btn btn-danger">Supprimer</a></td>
                    </tr>
                     @endforeach

            <tbody>
</table>

 </div>
 </div>
</div>
</div>
</div>
</div>
