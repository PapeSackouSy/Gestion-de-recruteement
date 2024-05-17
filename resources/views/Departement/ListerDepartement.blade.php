@extends('Dashboard.TempDash')
@section('containe2-page2')
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-7 col-lg-7 col-xxl-4">
            <div class="card mb-0">
              <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif
<table id="user-list-table" class="table table-striped table-borderless mt-6" role="grid" aria-describedby="user-list-page-info">
    <thead>
        <tr>
           <th>ID</th>
           <th>Nom</th>
           <th>ID_RESPONSABLE</th>
           <th>ID_UFR</th>
           <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dep as $deps)
        <tr>
            <td>{{$deps->id}}</td>
            <td>{{$deps->nom}}</td>
            <td>{{$deps->responsable_departement_id}}</td>
            <td>{{$deps->id_ufr}}</td>
            <td>
               <div class="flex align-items-center list-user-action">
                  <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>
                  <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
               </div>
            </td>
         </tr>
        @endforeach
</div>

</div>
</div>
</div>
</div>
</div>
</div>
    </tbody>
  </table>
@endsection
