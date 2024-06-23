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
    <h1>Liste des Commissions</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Mandat</th>
                <th>Date de Création</th>
                <th>Date d'Expiration</th>
                <th>Actions</th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($commissions as $commission)
            <tr>
                <td>{{ $commission->nom }}</td>
                <td>{{ $commission->mandat }}</td>
                <td>{{ $commission->date_creation }}</td>
                <td>{{ $commission->date_expiration }}</td>
                <td>
                    <a href="{{route('editCommission',$commission->id)}}" class="btn btn-primary">Éditer</a>
                </td>
                <td>

                    <a href="{{ route('destroyCommissiom',$commission->id) }}"  class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette commission ?')">Supprimer</a>

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

