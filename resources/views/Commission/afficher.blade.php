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
    <h1>Créer une Nouvelle Commission</h1>
    <form action="{{route('createCommission')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom de la Commission</label>
            <input type="text" name="nom" class="form-control" id="nom" required>
        </div>
        <div class="form-group">
            <label for="mandat">Mandat</label>
            <textarea name="mandat" class="form-control" id="mandat" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="id_departement">Departement :</label>
            <select name="id_departement" id="id_departement" class="form-control">
                <option value="">Sélectionner un Departement </option>
                @foreach($departements as $departement)
                    <option value="{{ $departement->id }}">{{ $departement->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="offres">Sélectionnez les Offres d'Emploi</label><br>
            @foreach($offres as $offre)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="offres[]" id="offre_{{ $offre->id }}" value="{{ $offre->id }}" {{ in_array($offre->id, old('offres', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="offre_{{ $offre->id }}">
                        {{ $offre->Profil }}
                    </label>
                </div>
            @endforeach
        </div>

        <div class="form-group">
            <label for="date_creation">Date de Création</label>
            <input type="date" name="date_creation" class="form-control" id="date_creation" required>
        </div>
        <div class="form-group">
            <label for="date_expiration">Date d'Expiration</label>
            <input type="date" name="date_expiration" class="form-control" id="date_expiration" required>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
</div>
</div>
</div>
</div>
</div>

