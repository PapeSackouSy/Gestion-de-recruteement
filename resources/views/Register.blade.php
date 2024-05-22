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
                <a href="{{route('layout')}}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="{{asset('Auth/assets/img/logo uabd.jpg')}}" width="180"  alt="">
                </a>
                <p class="text-center text-primary mb-8"></p>
                <form method="post" action="{{route('registerApp')}}">
                    @csrf
                    @method('post')
                  <div class="mb-2">
                    <label for="exampleInputtext1" class="form-label">Nom</label>
                    <input type="text"  name="nom" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
                  </div>
                  <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">Prenom</label>
                    <input type="text"  name="prenom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">Address</label>
                    <input type="text"  name="adresse" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">Telephone</label>
                    <input type="text"  name="telephone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                    <input type="email"  name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-2">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="mb-2">
                    <select name="role" >
                          <option value="administrateur">Administrateur</option>
                          <option value="DRH">DRH</option>
                          <option value="Vice_Recteur">Vice-Recteur</option>
                          <option value="Directeur_UFR">Directeur D'UFR</option>
                          <option value="responsable_departement">responsable_departement</option>
                          <option value="Candidat">Candidat</option>
                    </select>
                  </div>
                  <div class="mb-2">
                    <button  type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Inscription</a>
                  </div>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Vous Avez deja un compte?</p>
                    <a class="text-primary fw-bold ms-2" href="{{route('login')}}">Se connecte</a>
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
