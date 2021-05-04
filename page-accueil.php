<!doctype html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.0.0-beta3-dist/css/ma-feuille-de-style.css">
    
    <title>Page de Connexion</title>
  </head>

<!-- Contenu du site-->

  <body>
    <?php include "header.php" ?>

    <!-- content-->
    <div class="container-fluid mb-5">

      <h2 class="mt-4 mb-4 text-center"> TD n°2 : Alimentation et Santé de l'Homme
      <br> "Calcul du besoin et analyse d'une ration alimentaire" </h2>

      <div class="card card-custom-text">
        <h4 class="card-title mb-2">Voici les règles du jeu </h4>
        
        <p class="card-text" style="text-align: justify;"> <br>
          Vous avez jusqu’au début du TD, soit environ trois semaines, pour saisir vos Données dans l’onglet « Saisir mes données », cela permettra d’avoir des données plus fiables et de gagner du temps sur la réalisation du TD. <br><br>
          Vous pourrez ensuite commencer le TD avec les données préalablement fournies. Attention : lorsque vous cliquez sur "Commencer le TD", le chronomètre est lancé, et vous avez 2 heures pour effectuer le TD. Vous aurez 3 essais par question. <br><br>
          Vous pourrez ensuite télécharger un compte rendu personnalisé où figureront votre note et les détails apports/dépenses de votre semaine type.
        </p>
      </div>
    
      <div class="d-grid gap-2 d-md-block text-center boutons">
        <a class="btn btn-lg text-center btn-custom" href="./menu-saisies-donnees.php">Saisir mes données</a>
        <a class="btn btn-lg text-center btn-custom" data-bs-toggle="modal" data-bs-target="#commencer_td"> Commencer le TD </a>
        
        <!-- Modal, permet d'afficher une fenetre js pour confirmer le choix-->
        <div class="modal fade" id="commencer_td" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title w-100 text-center" id="staticBackdropLabel">Attention</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Voulez-vous vraiment commencer le TD ? <br> Le chronomètre sera lancé dès que vous cliquerez sur "Oui"
              </div>
              <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                <button type="button" class="btn btn-primary"><a href="./partie1-1.php">Oui</a></button> <!--Bouton Oui, il faut rajouter le code pour démarer le chrono et il faut changer et mettre ./partie1-1.php -->
              </div>
            </div>
          </div>
        </div>
        
        <a class="btn btn-lg text-center btn-custom" href="./Compte_rendu_et_notes.html">Accéder à mon compte rendu et mes notes</a>
      </div>
    </div>


    <!-- Bas de page -->
    <?php include "PiedDePageTD.php"?>
   
   <!-- end Bas de page -->


    <!-- Appel des feuilles de style js (ne pas déplacer dans /head) -->
    <script src="bootstrap-5.0.0-beta3-dist/js/bootstrap.min.js"></script>
    <script src="bootstrap-5.0.0-beta3-dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>