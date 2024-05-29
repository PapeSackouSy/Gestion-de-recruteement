@extends('Template.Temp1')
@section('name-containt')
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-4 col-lg-4 col-xxl-4">
            <div class="card mb-2">
              <div class="card-body">
                <a href="{{route('layout')}}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="{{asset('Auth/assets/img/logo uabd.jpg')}}" width="180"  alt="">
                </a>
                <p class="text-center text-primary mb-8"></p>
                <form method="post" action="#" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                  <div class="mb-2">
                    <label for="exampleInputtext1" class="form-label">PHOTOS</label>
                    <input type="file"  name="photo" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
                  </div>
                  <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">CV</label>
                    <input type="file"  name="cv" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">LETTRE DE MOTIVATION</label>
                    <input type="file"  name="motivation" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">DATE DE NAISSANCE</label>
                    <input type="date"  name="date_naissance" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">LIEU DE NAISSANCE</label>
                    <input type="text"  name="lieu_naissance" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-2">
                    <label for="exampleInputPassword1" class="form-label">NATIONALITE</label>
                    <input type="text" name="nationalite" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="mb-2">
                    <label for="exampleInputPassword1" class="form-label">SEXE  :</label>
                    <select name="sexe" >
                        <option value="masculine">masculine</option>
                        <option value="feminine">feminine</option>
                  </select>
                  </div>
                  <div class="mb-2">
                    <label for="exampleInputPassword1" class="form-label">Situation Matrimoniale  :</label>
                    <select name="situation_matrimoniale" >
                          <option value="Celibataire">Celibataire</option>
                          <option value="Marie">Marie</option>
                    </select>
                  </div>
                  <div class="mb-2">
                    <button  type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Envoyer</a>
                  </div>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Voulez-vous?</p>
                    <a class="text-primary fw-bold ms-2" href="{{route('layout')}}">Retourner</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 </div>
@endsection
