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
            <form method="post" action="{{route('storeAvis',$offre->id)}}" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="form-group">
                    <label for="composition_dossier">Composition du Dossier de Candidature :</label>
                    <textarea class="form-control" id="composition_dossier" name="composition_dossier" rows="2" required></textarea>
                </div>

                <div class="form-group">
                    <label for="depot_candidature">Dépôt de Candidature :</label>
                    <textarea class="form-control" id="depot_candidature" name="depot_candidature" rows="2" required></textarea>
                </div>
              <div class="mb-2">
                <label for="date_open" class="form-label">Date du Debut</label>
                <input type="date" class="form-control" id="datedebut" name="datedebut" required>
              </div>
              <div class="mb-2">
                <label for="date_fin" class="form-label">Date de fin</label>
                <input type="date" class="form-control" id="datefin" name="datefin" required>
              </div>
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
