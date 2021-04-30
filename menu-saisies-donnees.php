<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap-5.0.0-beta3-dist/css/ma-feuille-de-style.css">

  <title>Menu saisie données</title>
</head>
<body>

    <!-- Header-->
  <?php include "header.php"?>
    
  <div class="container-fluid">

    <!-- début du code-->
    <h2 class="mt-4 mb-4 text-center"> TD n°2 : Alimentation et Santé de l'Homme
    <br> "Calcul du besoin et analyse d'une ration alimentaire" </h2>



    <div class="row mb-5 mt-5">
      <div class="col-md-6">
        <div class="d-grid gap-2 float-md-end boutons">
          <a class="btn btn-lg btn-custom" href="./saisie-menu.php">Saisir / Modifier mes repas </a>
          <a class="btn btn-lg text-center btn-custom" data-bs-toggle="modal" data-bs-target="#Supprimer_repas"> Supprimer mes repas </a>
          
          <!-- Modal, permet d'afficher une fenetre js pour confirmer le choix-->
          <div class="modal fade" id="Supprimer_repas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Supprimer_repasLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title w-100 text-center" id="Supprimer_repasLabel">Attention !</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                  Si vous cliquez sur "Continuer", vous entraînerez la supression de l'ensemble de vos données saisies sur les repas.
                </div>
                <div class="modal-footer justify-content-center">
                  <a class="btn btn-secondary" data-bs-dismiss="modal">Annuler</a>
                  <!--Bouton Continuer, il faut rajouter le code pour supprimer les données des repas de l'étudiant-->
                  <a class="btn btn-danger">Continuer</a> 
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    <div class="col-md-6">
        <div class="d-grid gap-2 float-md-start boutons">
          <button type="button" class="btn btn-lg btn-custom"> <a href="./Tableau-NAP.html">Saisir / Modifier mes activités</a></button>
          <button type="button" class="btn btn-lg text-center btn-custom" data-bs-toggle="modal" data-bs-target="#Supprimer_activites"> Supprimer mes activités </button>
          <!-- Modal, permet d'afficher une fenetre js pour confirmer le choix-->
          <div class="modal fade" id="Supprimer_activites" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Supprimer_activitesLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title w-100 text-center" id="Supprimer_activitesLabel">Attention !</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                  Si vous cliquez sur "Continuer", vous entraînerez la supression de l'ensemble de vos données saisies sur les activités sportives.
                </div>
                <div class="modal-footer justify-content-center">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                  <button type="button" class="btn btn-danger active">Continuer</button> <!--Bouton Continuer, il faut rajouter le code pour supprimer les données des activités de l'étudiant-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="text-center">
      <a class="btn btn-lg btn-custom text-center" href="./page-accueil.php">Retour au menu</a>
    </div>
  </div>

    <!-- Evolution du TD -->
    <?php include "Evolution_TD.php" ?>
  
    <!-- pied de page-->
    <?php include "PiedDePage.php" ?>

    <!-- Appel des feuilles de style js (ne pas déplacer dans /head) -->
    <script src="bootstrap-5.0.0-beta3-dist/js/bootstrap.min.js"></script>
    <script src="bootstrap-5.0.0-beta3-dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
