@include('Dashboard.Dashboard')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
<div class="container mt-5">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <h3>Liste Utilisateur</h3>
    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Rechercher" class="mb-3">
    <table id="dataTable" class="table table-striped">
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
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->nom }}</td>
                <td>{{ $user->prenom }}</td>
                <td>{{ $user->adresse }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->telephone }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <div class="flex align-items-center list-user-action">
                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('editeruser', $user->id) }}">
                            <i class="ri-pencil-line"></i>
                        </a>
                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="Delete" href="{{ route('deleteApp', $user->id) }}">
                            <i class="ri-delete-bin-line"></i>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
</div><div></div></div>
