<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Recrutement Enseignant</title>
    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="{{asset('Auth/Asset2/css/bootstrap.min.css')}}">
    <style>
        body {
            background-color: #f4f4f9;
            padding: 20px;
        }
        .form-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #fff;
        }
        .form-group {
            margin-top: 20px;
        }
        .remove-btn {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="text-center mb-4">Formulaire de Recrutement pour le Personnel Enseignant</h2>
            <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                <img src="{{asset('Auth/assets/img/logo uabd.jpg')}}" width="180"  alt="">
              </a>
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
            <form action="{{route('postulerPersA',$candidaturePers->id)}}" method="POST" enctype="multipart/form-data">
                @method('post')
                @csrf
                <div class="form-group">
                    <label for="cv">CV</label>
                    <input type="file" id="cv" name="cv" class="form-control-file" accept=".pdf,.doc,.docx" required>
                </div>
                <div class="form-group">
                    <label for="coverLetter">Lettre de motivation</label>
                    <input type="file" id="coverLetter" name="lettre" class="form-control-file" accept=".pdf,.doc,.docx" required>
                </div>
                <div class="form-group">
                    <label for="birthdate">Date de naissance</label>
                    <input type="date" id="birthdate" name="datenaissance" class="form-control" required>
                </div>

                <!-- Détails académiques -->
                <h3>Diplômes</h3>
                <div id="diplomas-container">

                </div>
                <button type="button" class="btn btn-primary add-diploma" onclick="addDiploma()">Ajouter un diplôme</button>

                <div class="form-group">
                    <label for="thesis">Thèse</label>
                    <input type="file" id="thesis" name="these" class="form-control-file" accept=".pdf,.doc,.docx" required>
                </div>

                <!-- Détails des publications -->
                <h3>Publications</h3>
                <div id="publications-container">

                </div>
                <button type="button" class="btn btn-primary add-publication" onclick="addPublication()">Ajouter une publication</button>
                <div class="form-section">
                    <h3>Expériences professionnelles</h3>
                    <div id="experiences-container">
                    </div>
                    <button type="button" class="btn btn-primary add-button" onclick="addExperience()">Ajouter une  expérience</button>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Postuler</button>
                </div>
                <div class="form-group">
                    <a type="submit" href="{{route('layout')}}" class="btn btn-success ">Retourner</a>
                </div>
            </form>
        </div>
    </div>


    <script src="{{asset('Auth/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="{{asset('Auth/Asset2/js/bootstrap.min.js')}}"></script>

    <!-- JavaScript for dynamic fields -->
    <script>
        // Fonction pour ajouter un nouveau groupe de diplôme
        function addDiploma() {
            const diplomaGroup = document.createElement('div');
            diplomaGroup.className = 'form-group diploma-group';

            diplomaGroup.innerHTML = `
                <label for="diploma-title">Titre du diplôme</label>
                <input type="text" name="pub_titre[]" class="form-control" placeholder="Titre du diplôme">

                <label for="diploma-institution">Institution</label>
                <input type="text" name="pub_institution[]" class="form-control" placeholder="Nom de l'institution">

                <label for="diploma-year">Année d'obtention</label>
                <input type="number" name="pub_annee[]" class="form-control" placeholder="Année d'obtention"  min="1900" max="2099" step="1">

                <label for="diploma-field">Domaine d'étude</label>
                <input type="text" name="pub_etude[]" class="form-control" placeholder="Domaine d'étude" >

                <button type="button" class="btn btn-danger remove-btn" onclick="removeDiploma(this)">Supprimer ce diplôme</button>
            `;

            document.getElementById('diplomas-container').appendChild(diplomaGroup);
        }

        // Fonction pour supprimer un groupe de diplôme
        function removeDiploma(button) {
            button.parentElement.remove();
        }

        // Fonction pour ajouter un nouveau groupe de publication
        function addPublication() {
            const publicationGroup = document.createElement('div');
            publicationGroup.className = 'form-group publication-group';

            publicationGroup.innerHTML = `
                <label for="publication-title">Titre de la publication</label>
                <input type="text" name="titre[]" class="form-control" placeholder="Titre de la publication" >

                <label for="publication-year">Année de publication</label>
                <input type="number" name="annee[]" class="form-control" placeholder="Année de publication"  min="1900" max="2099" step="1">

                <label for="publication-journal">Journal ou conférence</label>
                <input type="text" name="journal[]" class="form-control" placeholder="Nom du journal ou de la conférence" >

                <label for="publication-link">Lien vers la publication</label>
                <input type="url" name="lien[]" class="form-control" placeholder="URL de la publication" >

                <button type="button" class="btn btn-danger remove-btn" onclick="removePublication(this)">Supprimer cette publication</button>
            `;

            document.getElementById('publications-container').appendChild(publicationGroup);
        }

        // Fonction pour supprimer un groupe de publication
        function removePublication(button) {
            button.parentElement.remove();
        }
        function addExperience() {
            const experienceGroup = document.createElement('div');
            experienceGroup.className = 'experience-group form-group border p-3 mb-3';

            experienceGroup.innerHTML = `
                <label for="experience-title">Titre du poste</label>
                <input type="text" name="exp_titre[]" class="form-control" placeholder="Titre du poste" >

                <label for="experience-company">Entreprise</label>
                <input type="text" name="nom[]" class="form-control" placeholder="Nom de l'universite" >

                <label for="experience-duration">Durée</label>
                <input type="text" name="duree[]" class="form-control" placeholder="Durée (e.g., 2015-2018)" >

                <label for="experience-description">Description</label>
                <textarea name="ex_description[]" class="form-control" rows="3" placeholder="Description du travail" ></textarea>

                <button type="button" class="btn btn-danger remove-button" onclick="removeExperience(this)">Supprimer cette expérience</button>
            `;

            document.getElementById('experiences-container').appendChild(experienceGroup);
        }

        // Fonction pour supprimer un groupe d'expérience
        function removeExperience(button) {
            button.parentElement.remove();
        }
    </script>
</body>
</html>
