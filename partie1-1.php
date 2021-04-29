<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">

      <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.0.0-beta3-dist/css/ma-feuille-de-style.css">

    <?php include("script1.php");?>

    <title>TD q1</title>
  </head>

<body>

  <!-- CODE : insérer "header" sur cahque page (include?)-->
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
  <!-- fin entête-->

  <!-- Contenu de page-->
  <div class="container-fluid">

  <br>
  <!-- CODE : dans le value, mettre du code pour que quand la case est cochée, la case collation apparaît dans la q1 -->
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
    <label class="form-check-label" for="flexCheckDefault">
      Prenez-vous habituellement une collation dans la journée ?
      <br>
    </label>
    </div>

    <h2  style="color:#E62719"> <br> I. Connaissance des recommandations </h2>
    <p class="fs-6" style="color:#4B75F9"> Chercher sur internet les informations suivantes : </p>

    <!-- CODE : ce paragraphe apparaît si la case collation n'est pas cochée-->
    <p> <br><b>Question 1 : Répartition des apports énergétiques au cours des différents repas de la journée, selon les recommendations nutritionnelles </b>
    <br> </p>
    <!-- CODE : lier les input avec les étiquettes et faire des messages d'erreurs si pas la bonne étiquette-->
    <p> Il est conseillé de prendre 3 repas par jour. <br><br> </p>

    <p>La part moyenne des apports énergétiques conseillés est de <div class= "example-dropzone" id="dest_copy" ondrop="drop_handler(event);" ondragover="dragover_handler(event);"></div> % pour le petit déjeuner,
    de <div class= "example-dropzone" id="dest_copy" ondrop="drop_handler(event);" ondragover="dragover_handler(event);"></div> % pour le déjeuner
    et de <div class= "example-dropzone" id="dest_copy" ondrop="drop_handler(event);" ondragover="dragover_handler(event);"></div> % pour le dîner. </p>

    <!-- CODE : insérer le code pour les visualiser les étiquettes à placer -->

  <div class="example-parent ">
		<div class="example-draggable m-2" draggable="true" id="src_copy1" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">
			10%
		</div>
		<div class="example-draggable m-2" draggable="true" id="src_copy2" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">
      40%
    </div>
    <div class="example-draggable m-2" draggable="true" id="src_copy3" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">
      40%
    </div>
    <div class="example-draggable m-2" draggable="true" id="src_copy4" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">
      40%
    </div>
    <div class="example-draggable m-2" draggable="true" id="src_copy5" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">
      40%
    </div>
    <div class="example-draggable m-2" draggable="true" id="src_copy6" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">
      40%
    </div>
  </div>

  <div class="btn btn-lg text-center btn-custom-valider" onclick = "remove()"> Réinitialiser

  </div>


    <!-- CODE : 2e version si la case collation est cochée en haut -->
    <br> </p>
    <!-- lier les input avec les étiquettes et faire des messages d'erreurs si pas la bonne étiquette-->
    <p> Il est conseillé de prendre 3 repas par jour. <br><br> La part moyenne des apports énergétiques conseillés est de <input id="" type="" name="" value="" onclick=""> % pour le petit déjeuner, de <input type="" name="" value="" onclick=""> % pour le déjeuner, <input type="" name="" value="" onclick=""> % pour le goûter et de <input type="" name="" value="" onclick=""> % pour le dîner. </p>

    <nav classe="boutons">
      <!-- CODE : inclure une requête pour valider et passer à la page suivante-->
      <button type="button" class="btn btn-lg text-center btn-custom-valider"> Valider </button>
    </nav>

    <nav classe="boutons">
      <button type="button" class="btn btn-lg text-center btn-custom-valider"> Effacer </button>
    </nav>

    <br>
    <!-- CODE : faire apparaître si erreur -->
    <div class="alert alert-danger" role="alert" id ="" value="">
      REPONSE(S) FAUSSE(S) : Attention vous avez fait une (ou des) erreur(s) !
    </div>

    <br>
    <!-- CODE : faire apparaître aucune erreur -->
    <div class="alert alert-success" role="alert" id="" value="">
      Vous avez les bonnes réponses !
    </div>


    <br>
    <!-- CODE : faire apparaître aucune erreur -->
    <div class="alert alert-danger" role="alert" id="" value="">
      Cette répartition est à connaître !
    </div>

  </div>


  <!-- CODE : insérer "Pied de page général" sur chacune des pages (via include?)-->
  <br><br>
  <div class="row align-items-center">

    <div class="col text-center" >  <!-- chronomètre -->
      <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
        <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
        <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
        <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
      <!-- CODE : insérer fonction chrono -->
      </svg>
    </div>

    <div class="col text-center"> <!-- question suivante-->
      <nav class="boutons">
        <button type="button" class="btn btn-lg text-center btn-custom" value=""> <a href="fonction question suivante"> Question suivante <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
  <!-- CODE : insérer fonction question suivante -->
  </svg> </a></button>
      </nav>
    </div>
    <div class="col text-center"> <!-- progression -->
      Progression
      <!-- CODE : insérer fonction progression -->
    </div>
  </div>

  <br>
  <div class="row">
    <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <li class="page-item" value=""><a class="page-link" href="#">Page 1</a></li> <!-- insérer à la place du "Page 1" la fonction page -->
    </ul>
  </nav>
  </div>

  <br>
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
  <!-- fin du pied de page-->

  </body>
</html>
