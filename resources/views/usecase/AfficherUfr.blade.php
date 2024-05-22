@extends('Dashboard.Dashboard')
@section('name-containt2')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
<div class="iq-card-body">
    <div class="table-responsive">
        <div class="container">
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
    <button class="btn btn-success"><a href="{{route('dash')}} ">Retourner</a></button>
 </div>
</div>
@endsection
