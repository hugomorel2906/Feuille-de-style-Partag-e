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
          Vous avez jusqu’au début du TD, soit environ trois semaines, pour saisir vos Données dans l’onglet <b>"Saisir mes données"</b>. Cette démarche est nécessaire pour le déroulé du TD. Ainsi, vous vous devez de remplir sérieusement vos informations personnelles de repas et niveau d'activité sportive sur une semaine. Si vous décidez de ne pas remplir l'intégralité de vos données, <b>vous perdrez 3 point sur le résultat final</b> (votre TD sera noté sur 17). <br><br>
          Sur le créneau de TD qui vous est dédié, vous aurez accès à <b>"Commencer le TD"</b>. Une fois confirmé, vous n'aurez plus la possibilité de revenir en arrière avant la fin du TD. Vous disposez de 3 essais par question, au delà desquels vous obtiendrez 0 à la question. Sur les deux premières tentaives fausses, vous perdez 0.15 point et un message d'aide apparaît pour vous guider vers le résultat attendu. <br><br>
          Une fois le TD fini, vous aurez accès à votre compte rendu personnalisé et illustré avec les points de cours essentiels et votre note. Ce dernier sera accessible dans l'onglet <b>"Accéder à mon compte rendu et mes notes"</b>.
        </p>
      </div>
    
      <div class="d-grid gap-2 d-md-block text-center boutons">
        <a class="btn btn-lg text-center btn-custom" href="./menu-saisies-donnees.php">Saisir mes données</a>

        <!-- Modal, permet d'afficher une fenetre js pour RGPD-->
        <!-- Actuellement soucis car s'affiche à chaque fois que l'on clique sur le bouton "saisir mes données" -->
        <div class="modal fade" id="accord_rgpd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title w-100 text-center" id="staticBackdropLabel">Attention</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Acceptez vous de saisir vos habitudes alimentaires et physiques ? <br> Vous retrouverez ces informations sur votre compte-rendu personnel. Ces dernières ne seront stockées que jusqu'à la fin du TD, vous aurez ensuite la possibilité de les supprimer. 
                
                <br><br> Si vous refusez de saisir vos habitudes alimentaire et physique, vous bénéficierez d'un jeu de données type et acceptez de perdre 3 points sur la note finale. 
              </div>
              <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Refuser</button>
                <button type="button" class="btn btn-primary"><a href="./partie1-1.php">Accepter</a></button>
              </div>
            </div>
          </div>
        </div>

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
                Voulez-vous vraiment commencer le TD ? <br> Vous ne pourrez plus revenir en arrière avant la fin du TD dès que vous cliquerez sur "Oui"
              </div>
              <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                <button type="button" class="btn btn-primary"><a href="./partie1-1.php">Oui</a></button>
              </div>
            </div>
          </div>
        </div>
        
        <a class="btn btn-lg text-center btn-custom" href="./Compte_rendu_et_notes.php">Accéder à mon compte rendu et mes notes</a>
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