@extends('Dashboard.Dashboard')
@section('name-containt2')
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-10 d-flex align-items-center justify-content-center">

      <div class="col-md-7 col-lg-7 col-xxl-4">
                @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif
        <div class="container">
        <h2>Liste Utilisateur</h2>
  <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Rechercher">
    <table id="dataTable">
    <thead>
        <tr>
           <th>ID</th>
           <th>Nom</th>
           <th>Prenom</th>
           <th>Adresse</th>
           <th>Email</th>
           <th>Telephone</th>
           <th>Role</th>
           <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $users)
        <tr>
            <td>{{$users->id}}</td>
            <td>{{$users->nom}}</td>
            <td>{{$users->prenom}}</td>
            <td>{{$users->adresse}}</td>
            <td>{{$users->email}}</td>
            <td>{{$users->telephone}}</td>
            <td>{{$users->role}}</td>
            <td>
               <div class="flex align-items-center list-user-action">
                  <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{route('editeruser',$users->id)}}"><i class="ri-pencil-line"></i></a>
                  <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{route('deleteApp',$users->id)}}"><i class="ri-delete-bin-line"></i></a>
               </div>
            </td>
         </tr>
        @endforeach
</div>
</div>
</div>
    </tbody>
  </table>
  <div class="btn btn-success">
     <a href="{{route('dash')}} ">Retourner</a>
</div>
@endsection
