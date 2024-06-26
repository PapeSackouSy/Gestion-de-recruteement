@include('Dashboard.Dashboard')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
data-sidebar-position="fixed" data-header-position="fixed">
<div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex flex-column">
  <div class="d-flex align-items-center justify-content-center flex-grow-1">
    <div class="row justify-content-center w-100">
      <div class="col-md-4 col-lg-3 col-xxl-2 mt-2 " style="margin-top: 50px;">
        <div class="card mb-4">
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
          <form method="POST" action="{{route('ajouterufr')}}">
            @csrf
            <div>
         <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nom de l'UFR:</label>
            <input  type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" aria-describedby="emailHelp">
          </div>
        @error('nom')
            <span>{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="responsable_ufr_id" >Responsable UFR:</label>
           <select id="responsable_ufr_id" name="responsable_ufr_id">
                <option value="">-- Sélectionnez un responsable --</option>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">Mr ou Mme {{ $user->nom }}</option>
                        @endforeach
            </select>
        @error('responsable_ufr_id')
            <span>{{ $message }}</span>
        @enderror

    </div>
                <button  type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Ajouter l'UFR</button>
             </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

