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

    <h1>Modifier le membre</h1>
    <form action="{{route('updatemembre',$membres->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ $membres->nom }}" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom:</label>
            <input type="text" name="prenom" id="prenom" class="form-control" value="{{ $membres->prenom }}" required>
        </div>
        <div class="form-group">
            <label for="role">Rôle:</label>
            <select name="role" id="role" class="form-control" required>
                <option value="President" {{ $membres->role == 'President' ? 'selected' : '' }}>President</option>
                <option value="Rapporteur" {{ $membres->role == 'Rapporteur' ? 'selected' : '' }}>Rapporteur</option>
                <option value="membre" {{ $membres->role == 'membre' ? 'selected' : '' }}>Membre</option>
            </select>
        </div>
        <div class="form-group">
            <label for="commission_id">Commission:</label>
            <select name="commission_id" id="commission_id" class="form-control">
                <option value="">Aucune</option>
                @foreach($commissions as $commission)
                    <option value="{{ $commission->id }}" {{ $membres->commission_id == $commission->id ? 'selected' : '' }}>{{ $commission->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $membres->email }}" required>
        </div>
        <div class="form-group">
            <label for="telephone">Téléphone:</label>
            <input type="text" name="telephone" id="telephone" class="form-control" value="{{ $membres->telephone }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
