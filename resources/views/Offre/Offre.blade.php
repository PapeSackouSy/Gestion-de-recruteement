@extends('Template.Temp1')
@section('name-containt')
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
           <form action="{{route('AjouterOffre')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="mb-2">
                    <label for="exampleInputtext1" class="form-label">Titre :</label>
                    <input type="text"  name="titre" id="titre" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
                  </div>
                <div class="mb-2">
                    <label for="description" class="form-label">Description :</label>
                    <textarea name="description" id="description"  class="form-control" aria-describedby="textHelp" required></textarea>
                </div>
                <div class="mb-2">
                    <label for="image" class="form-label">Image :</label>
                    <input type="file" name="image" id="image" class="form-control" aria-describedby="textHelp">
                </div>
                <div class="mb-2">
                    <label for="status" class="form-label">Status :</label>
                    <select name="status" id="status"  aria-describedby="textHelp">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="pending">En attente</option>
                    </select>
                </div>
                <button  type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Ajouter OFFRE</button>
                <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-5 mb-0 fw-bold">Voulez-vous?</p>
                    <a class="text-primary fw-bold ms-2" href="{{route('dash')}}">Retourner</a>
                  </div>
</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
</div>
@endsection
