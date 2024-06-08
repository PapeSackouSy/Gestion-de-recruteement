@include('Dashboard.Dashboard')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
data-sidebar-position="fixed" data-header-position="fixed">
<div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex flex-column">
  <div class="d-flex align-items-center justify-content-center flex-grow-1">
    <div class="row justify-content-center w-100">
      <div class="col-md-4 col-lg-4 col-xxl-4 mt-6 " style="margin-top: 150px;">
        <div class="card mb-2">
          <div class="card-body">
            <a href="{{route('layout')}}" class="text-nowrap logo-img text-center d-block py-3 w-100">
              <img src="{{asset('Auth/assets/img/logo uabd.jpg')}}" width="180"  alt="">
            </a>
            <p class="text-center text-primary mb-8"></p>
            @if(session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
            @endif
            @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
            <form method="post" action="{{route('storePergs')}}" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="mb-2">
                    <label for="photos" class="form-label">PHOTOS :</label>
                    <input type="file" class="form-control" id="photos" name="photos">
                </div>
              <div class="mb-2">
                <label for="libelle" class="form-label">Titre</label>
                <input type="text" class="form-control" id="titre" name="Titre" required>
            </div>
              <div class="mb-2">
                <label for="profil_poste" class="form-label">Profil du Poste</label>
                <input type="text" class="form-control" id="profil_poste" name="Profil" required>
              </div>
              <div class="mb-2">
                <label for="exigence" class="form-label">Diplômes Requis</label>
                <input type="text" class="form-control" id="exigence" name="Exigence" required>
              </div>
              <div class="mb-2">
                <label for="experience_professionnelle" class="form-label">Expérience Professionnelle</label>
                <input type="text" class="form-control" id="experience_professionnelle" name="Experience" required>
              </div>
              <div class="mb-2">
                <label for="details" class="form-label">Détails</label>
                <textarea class="form-control" id="details" name="Details" rows="2" required></textarea>
              </div>
              <div class="mb-2">
                <label for="profils_competences" class="form-label">Description</label>
                <textarea class="form-control" id="Description" name="Description" rows="4" required></textarea>
              </div>

              <div class="mb-2">
                <button  type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Envoyer</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
