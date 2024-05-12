@extends('Dashboard.Dashboard')
@section('name-containt2')
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
                        <td><a href="http://" class="btn btn-success">Editer</a></td>
                        <td><a href="http://" class="btn btn-danger">Supprimer</a></td>
                    </tr>
                     @endforeach

            <tbody>
</table>
    </div>
    <a href="{{route('dash')}} ">Retourner</a>
 </div>
@endsection
