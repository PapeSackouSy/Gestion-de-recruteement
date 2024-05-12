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
       <table id="datatable" class="table table-striped table-bordered" >
            <thead>
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
    <a href="{{route('dash')}} ">Retourner</a>
 </div>
</div>
@endsection
