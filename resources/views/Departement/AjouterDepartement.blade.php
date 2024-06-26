@include('Dashboard.Dashboard')
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-4 col-lg-3 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="{{asset('Auth/assets/img/logo uabd.jpg')}}" width="180"  alt="">
                </a>
                <p class="text-center text-primary mb-8"></p>
                @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif
<form action="{{route('AjouterDep')}}" method="POST">
    @method('post')
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nom du Departement:</label>
        <input  type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="responsable_departement_id" >Responsable:</label>
           <select id="responsable_departement_id" name="responsable_departement_id">
                 <option value="">-- Sélectionnez un responsable --</option>
                        @foreach ($users as $user)
                           <option value="{{ $user->id }}">{{ $user->nom }} {{ $user->email }}</option>
                        @endforeach
            </select>
        @error('responsable_departement_id')
            <span>{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
    <label for="id_ufr">UFR:</label>
    <select name="id_ufr" id="id_ufr">
      <option value="">Choisir une UFR</option>
      @foreach ($ufrs as $ufr)
            <option value="{{ $ufr->id }}">{{ $ufr->nom }}</option>
      @endforeach
    </select>
     </div>
     <button  type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Ajouter  Departement</button>

  </form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
