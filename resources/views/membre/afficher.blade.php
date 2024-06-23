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
    <h1>Ajouter un Membre</h1>
    <form action="{{route('createmembre')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" class="form-control" id="nom" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" class="form-control" id="prenom" required>
        </div>
        <div class="form-group">
            <label for="role">Rôle</label>
            <select name="role" class="form-control" id="role" required>
                <option>Selectionner le role</option>
                <option value="President">Président</option>
                <option value="Raporteur">Raporteur</option>
                <option value="membre">Membre</option>
            </select>
        </div>
        <div class="form-group">
            <label for="commission_id">Commission</label>
            <select name="commission_id" class="form-control" id="commission_id" required>
                @foreach($commissions as $commission)
                <option>Selectionner une Commission</option>
                    <option value="{{ $commission->id }}">{{ $commission->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" required>
        </div>
        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" class="form-control" id="telephone" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
