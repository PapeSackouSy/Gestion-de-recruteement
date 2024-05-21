<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Appel à Candidatures - Université Alioune Diop de Bambey</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header, .footer,h1,p {
            text-align: center;

            margin: 20px 0;
        }
        .content {
            margin: 20px;
        }
        .content p {
            margin: 10px 0;
        }
        .content h2 {
            text-decoration: underline;
        }
        span{
            color: rgb(29, 77, 200);
        }
    </style>
</head>
<body>
    <div class="header">

        <p>REPUBLIQUE DU SENEGAL<br>
        MINISTERE DE L’ENSEIGNEMENT SUPERIEUR ET DE LA RECHERCHE<br>
        UNIVERSITE ALIOUNE DIOP DE BAMBEY<br>
        « L’excellence est ma constance, l’éthique ma vertu »</p>
        <p>N°___________UADB/R.SG/DRH /AF/ssnd</p>
        <p>Bambey, le____________________________</p>
        <p>Le Recteur, Président du Conseil Académique de l’université</p>
    </div>

    <div class="content">
        <h1 >AVIS DE RECRUTEMENT</h1>
        <p>{{$offre->libelle}}</p>
        <h2>PROFIL DU POSTE :</h2>
        <p>{{$offre->profil_poste}}</p>

        <h2>DIPLOMES REQUIS :</h2>
        <p>{{$offre->diplomes_requis}}</p>

        <h2>EXPERIENCE PROFESSIONNELLE :</h2>
        <p>{{$offre->experience_professionnelle}}</p>

        <h2>DETAILS :</h2>
        <p>{{$offre->details}}</p>

        <h2>DESCRIPTION DU POSTE :</h2>
        <p>{{$offre->description}}</p>

        <h2>COMPOSITION DU DOSSIER DE CANDIDATURE :</h2>
        <p>{{$offre->profils_competences}}</p>

        <h2>DEPOT DE CANDIDATURE :</h2>
        <p>{{$offre->composition_dossier}}</p>

    <div class="footer">
        <p>Université Alioune Diop de Bambey<br>
        Tél. :<span>  (221) 33 973 30 86</span> <br>
        Fax : <span> (221) 33 973 30 93</span> <br>
        B.P. : 30 – Bambey (République du Sénégal)<br>
        Internet :<span>  www.uadb.edu.sn<br></span>
        Courriel : <span> rectorat@uadb.edu.sn</p></span>
    </div>
</body>
</html>
