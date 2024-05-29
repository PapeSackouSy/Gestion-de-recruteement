@extends('Offre.TempOffre')
@section('container3')
<div class="container">
    <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
        <img src="{{asset('Auth/assets/img/logo uabd.jpg')}}" width="170"  alt="">
      </a>
    <form action="{{route('UpdateOffre',$offres->id)}}" method="POST" enctype="multipart/form-data">
       @csrf
       @method('post')
       <div class="form-group">
        <label for="photos">Photos</label>
        <input type="file" class="form-control" id="photos" name="photos" required>
      </div>
        <div class="form-group">
            <label for="libelle">Libelle</label>
            <input type="text" class="form-control" id="libelle" name="libelle" value="{{$offres->libelle}}">
        </div>

        <div class="form-group">
            <label for="profil_poste">Profil du Poste</label>
            <input type="text" class="form-control" id="profil_poste" name="profil_poste" value="{{$offres->profil_poste}}">
        </div>

        <div class="form-group">
            <label for="diplomes_requis">Diplômes Requis</label>
            <input type="text" class="form-control" id="diplomes_requis" name="diplomes_requis" value="{{$offres->diplomes_requis}}">
        </div>

        <div class="form-group">
            <label for="experience_professionnelle">Expérience Professionnelle</label>
            <input type="text" class="form-control" id="experience_professionnelle" name="experience_professionnelle" value="{{$offres->experience_professionnelle}}">
        </div>

        <div class="form-group">
            <label for="details">Détails</label>
            <textarea class="form-control" id="details" name="details" rows="2" >{{$offres->details}}</textarea>
        </div>

        <div class="form-group">
            <label for="profils_competences">Description</label>
            <textarea class="form-control" id="Description" name="description" rows="4" >{{$offres->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="profils_competences">Profils et Compétences du Candidat</label>
            <textarea class="form-control" id="profils_competences" name="profils_competences" rows="4">{{$offres->profils_competences}}</textarea>
        </div>

        <div class="form-group">
            <label for="composition_dossier">Composition du Dossier de Candidature</label>
            <textarea class="form-control" id="composition_dossier" name="composition_dossier" rows="2" >{{$offres->composition_dossier}}</textarea>
        </div>

        <div class="form-group">
            <label for="depot_candidature">Dépôt de Candidature</label>
            <textarea class="form-control" id="depot_candidature" name="depot_candidature" rows="2" >{{$offres->depot_candidature}}</textarea>
        </div>
        <div class="form-group">
            <label for="profils_competences">Photos</label>
            <input type="file" class="form-control" id="photo" name="photo" value="{{$offres->photo}}">
        </div>
        <div class="form-group mr-2">
            <label for="status" class="sr-only">Status</label>
            <select name="status" id="status" class="form-control" aria-describedby="textHelp">
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
              <option value="pending">En attente</option>
            </select>
          </div>
        <div class="form-group mr-2">
          <label for="Date_open" class="sr-only">Date Open</label>
          <input type="date" name="Date_open" id="Date_open" class="form-control" aria-describedby="textHelp" value="{{$offres->Date_open}}">
        </div>
        <div class="form-group mr-2">
          <label for="Date_close" class="sr-only">Date Close</label>
          <input type="date" name="Date_close" id="Date_close" class="form-control" aria-describedby="textHelp" value="{{$offres->Date_open}}" >
        </div>
        <div class="align-center">
          <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Modifier Offre</button>
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <p class="fs-5 mb-0 fw-bold">Vous pouvez </p><div>&numsp;&numsp;</div>
            <a class="text-primary fw-bold ms-2" href="{{route('dash')}}">Retourner</a>
          </div>

        </form>
</div>
@endsection

