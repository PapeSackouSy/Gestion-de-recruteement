<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dedails sur le Poste - Université Alioune Diop de Bambey</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header, .footer, h1, p {
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
        h2{
            text-align: center;
        }
        span {
            color: rgb(29, 77, 200);
        }
        .navbar {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }
        .navbar img {
            max-width: 100px;
            height: auto;
        }
        .pos{
            color:black;
        }
    </style>
</head>
<body>
    <div class="header">
        <p class="pos">REPUBLIQUE DU SENEGAL<br>
        MINISTERE DE L’ENSEIGNEMENT SUPERIEUR ET DE LA RECHERCHE<br>
        UNIVERSITE ALIOUNE DIOP DE BAMBEY<br>
        « L’excellence est ma constance, l’éthique ma vertu »</p>
        <p>N°___________UADB/R.SG/DRH /AF/ssnd</p>
        <p>Bambey, le____________________________</p>
        <p>Le Recteur, Président du Conseil Académique de l’université</p>
       <p><strong> RECTORAT</strong></p>
    </div>

    <div class="content">
        <h1>Details</h1>
        <p>{{ $offre->Titre }}</p>
        <h2>PROFIL DU POSTE :</h2>
        <p>{{ $offre->Profil }}</p>

        <h2>DIPLOMES REQUIS :</h2>
        <p>{{ $offre->Exigence }}</p>

        <h2>EXPERIENCE PROFESSIONNELLE :</h2>
        <p>{{ $offre->Experience }}</p>

        <h2>DETAILS :</h2>
        <p>{{ $offre->Details }}</p>

        <h2>DESCRIPTION DU POSTE :</h2>
        <p>{{ $offre->Description }}</p>
    </div>

    <div class="footer">
        <p>Université Alioune Diop de Bambey<br>
        Tél. :<span> (221) 33 973 30 86</span> <br>
        Fax :<span> (221) 33 973 30 93</span> <br>
        B.P. : 30 – Bambey (République du Sénégal)<br>
        Internet :<span> www.uadb.edu.sn<br></span>
        Courriel :<span> rectorat@uadb.edu.sn</p></span>
    </div>
</body>
</html>
