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
<!-- xs 576px	sm 768px md 992px lg 1200px	xl 1400px xxl  -->

    <!-- Header-->
    <div class="container-fluid">
      <div class="row header align-items-center py-2">
        <div class="col d-none d-sm-block">
          <img src="BSALOGO.png" alt="" width="100%"  class="img-fluid">
        </div>
        <div class="col text-center titre-header mx-4 my-4">
          NumTrition
        </div>
        <div class="col d-none d-sm-block my-4 text-end">
          <img src="ANSLOGO.PNG" alt="" width="90%" class="img-fluid " >
        </div>
      </div>
    </div>

<body>
    <!-- content-->
  <div class="container-fluid">

      <div class="container-fluid text-center">
        <h2 class="mt-4"> TD n°2 : Alimentation et Santé de l'Homme </h2>
        <h2 class="mt-7"> "Calcul du besoin et analyse d'une ration alimentaire" </h2>
        <br>
      </div>

    <div class="row gx-5 gy-4">
      <div class="col-md-6">
          <div class="d-grid gap-2 float-md-end boutons">
            <button type="button" class="btn btn-lg btn-custom"><a href="./saisie-menu.html">Saisir / Modifier mes repas </a></button>
            <button type="button" class="btn btn-lg text-center btn-custom" data-bs-toggle="modal" data-bs-target="#Supprimer_repas"> Supprimer mes repas </button>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-danger" name="btn_continuer">Continuer</button> <!--Bouton Continuer, il faut rajouter le code pour supprimer les données des repas de l'étudiant-->
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
                    <input type="submit" class="btn btn-danger active" name='continuer' method="GET" value="Continuer"> <!--Bouton Continuer, il faut rajouter le code pour supprimer les données des activités de l'étudiant-->
                    
                      <?php
                      #$supp_repas=$_GET["supp_repas"];
                        $test=5;	
                        if(isset($_GET["continuer"])){
                        #if($_GET["btn_continuer"]==TRUE) {
                          $test=10;
                          #unlink($test);
                          echo "$test";
                        } else {
                          echo "$test";}
                      ?>
                      
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div><br><br><br>
    </div>

      <div class="boutons text-center">
        <button type="button" class="btn btn-lg btn-custom"> <a href="./page-accueil.html">Retour au menu</a></button>
      </div><br>

      </div>
  </div>
</html>

      <!-- CODE : insérer "Pied de page général" sur chacune des pages (via include?)-->
      <html>
      <div class="row navbar container-fluid footer" style="margin:0">
        <div class="row">
          <p class="text-right small">
            Contact : <A HREF="mailto:patrick.sauvant@agro-bordeaux.fr">Patrick SAUVANT</A>
          </p>
        </div>
        <div class="row">
          <p class="text-left small">
                Bordeaux Sciences Agro &mdash; Projet NumTrition &mdash; <A HREF="mentionslegales.html">Mentions légales</A>
          </p>
        </div>
        <div class="row">
          <p class="text-right small">
                Copyright &copy 2020-2021 | Promo NUMAG 2020-2021
          </p>
        </div>
      </div>
    </html>
    <!-- fin du pied de page-->
</body>

    <!-- Appel des feuilles de style js (ne pas déplacer dans /head) -->
    <script src="bootstrap-5.0.0-beta3-dist/js/bootstrap.min.js"></script>
    <script src="bootstrap-5.0.0-beta3-dist/js/bootstrap.bundle.min.js"></script>