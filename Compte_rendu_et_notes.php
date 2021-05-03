<!doctype html>
<html lang="en">
<body>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap-5.0.0-beta3-dist/css/ma-feuille-de-style.css">
  <title>Compte rendu enseignant</title>
  </head>
  <!-- Header-->
  <?php include "header.php" ?>


  <!-- MENU -->
  <div class="container-fluid" id="menu">
    <p class="mt-3 ml-3"><A HREF="page-accueil.php">Accueil</A></li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
    </svg>
    <A HREF=#>Compte rendu et notes</A></p>
    <!-- insérer à la place de #, l'onglet compte-rendu -->
  
    


<!-- CONTENU DU SITE WEB -->
    <div class="card card-custom-text text-center">
        <h2 class="card-title mt-4"> Compte rendu et notes </h2>
        <p class="card-text text-center mt-2"> Vous trouverez ci-dessous un lien pour télécharger le compte rendu du TD et pour avoir accès à votre note.
        <br><br>
        <A HREF=#>Télécharger mon compte rendu</A></p> <!-- lier au CR étudiant -->
    </div>
  </div>

<!-- PIED DE PAGE GENERAL (à insérer avec un include) -->
  <?php include "PiedDePageTD.php" ?>

</body>
</html>
