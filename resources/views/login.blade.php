@extends('Template.Temp1')
@section('name-containt')
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-9 col-lg-7 col-xxl-7">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                    <img src="{{asset('Auth/assets/img/logo uabd.jpg')}}" width="180"  alt="">
                </a>
                <p class="text-center">Your Social Campaigns</p>
                <form action="{{route('authentifier')}}" method="POST">
                    @csrf
                    @method('post')
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remeber this Device
                      </label>
                    </div>
                    <a class="text-primary fw-bold" href="./index.html">Mot de pass Oublier ?</a>
                  </div>
                  <button  type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Connexion</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Cree un Compte?</p>
                    <a class="text-primary fw-bold ms-2" href="{{route('register')}}">S'Inscrire</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="col-sm-6 text-center">
        <div class="sign-in-detail text-white">
            <a class="sign-in-logo mb-3" href="#"><img src="{{asset('Auth/assets/img/logo uabd.jpg')}}" class="img-fluid" alt="logo"></a>
            <div class="slick-slider11">
                <div class="item">
                    <img src="{{asset('Auth/Asset2/images/login/1.png')}}" class="img-fluid mb-2" alt="logo">
                    <h4 class="mb-1 text-white">Manage your orders</h4>
                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                </div>
                <div class="item">
                    <img src="{{asset('Auth/Asset2/images/login/1.png')}}" class="img-fluid mb-2" alt="logo">
                    <h4 class="mb-1 text-white">Manage your orders</h4>
                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                </div>
                <div class="item">
                    <img src="{{asset('Auth/Asset2/images/login/1.png')}}" class="img-fluid mb-2" alt="logo">
                    <h4 class="mb-1 text-white">Manage your orders</h4>
                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                </div>
            </div>
        </div>
    </div>
    </div>
  </div>

@endsection