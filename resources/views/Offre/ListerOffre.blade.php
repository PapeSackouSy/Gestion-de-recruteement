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
    <table id="offres-table" class="table table-striped " style="width:100% " >
        <thead>
            <tr>
                <th>Titre</th>
                <th style="width:27%">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($offres as $offre)
                <tr>
                    <td>{{ $offre->libelle }}</td>
                    <td>
                        <a href="{{$offre->id}}" class="btn btn-primary">Edit</a>
                        <a href="#" class="btn btn-danger">Delete</button>
                        <a href="#" class="btn btn-success">Voir Tous</a>
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
    </tbody>
  </table>
@endsection
