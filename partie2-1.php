<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

      <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.0.0-beta3-dist/css/ma-feuille-de-style.css">

    <title></title>
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

<!-- Détail des consignes -->
    <h2  style="color:#E62719"> <br> II. Estimation de vos besoins nutritionnels </h2>
    <p> <br><b>Question 3 : Calcul de votre métabolisme de base </b>
    <br> </p>
    <p> Le métabolisme de base correspond aux besoins énergétiques de l'organisme, c’est-à-dire la dépense d'énergie minimum quotidienne permettant à l'organisme de survivre. Il s'exprime en joules ou en calories par jour. <br><br>
      Il dépend de la taille, du poids, de l’âge, du sexe et de l’activité thyroïdienne. Il peut être influencé par la température extérieure. C'est l'alimentation qui permet de subvenir à ces besoins énergétiques. <br><br>
      Il existe de nombreuses équations qui définissent le métabolisme de base établies au fil des siècles. Les deux plus importantes sont les formules de Harris et Benedict ainsi que les formules de Black. <br></p>

    <p> <br><b>Formule de Harris et Bennedict </b></p>

    <!-- Formule de Harris et Benedict en image -->
    <div class="navbar container-fluid">
      <img src="formule_H_B.23.45.png" class="img-fluid" >
    </div>

    <p class="fs-6" style="color:#4B75F9"> <em>A vous de jouer ! </em></p>

    <p><b> Entrez vos paramètres personnels </b></p>

    <div class="row g-2 align-items-center">

      <div class="col-auto">
        <p> Sélectionner votre sexe : </p>
        <br>
        <p> Sélectionner votre âge (A) :</p>
      </div>
    <br>

    <!-- Conserver les valeurs entrées pour la page suivante -->
      <div class="col-auto">
          <select class="form-select" name="sexe" aria-label="Default select example" type="large:5em" value="">
            <option selected> Sélectionner votre sexe </option>
            <option value="1"> F </option>
             <option value="2"> H </option>
           </select>

          <br>
      <!-- CODE : liste déroulante sur les ages, à conserver pour après -->
          <select class="form-select" name="age" type="" arial-label="Default select example" id="" value="">
            <option selected> Sélectionner votre age </option>
            <option value="19"> 19 </option>
            <option value="20"> 20 </option>
          </select>
      </div>
    </div>

    <br><p class="fs-6" style="color:#4B75F9"> <em> Veuillez saisir votre taille en mètre, au centième près (2 chiffres après la virgule) </em></p>

      <!-- Conserver les données pour la page suivante -->
    <p>Saisir votre taille (T) :<input class="text-align-right" id="" type="" name="taille" value=""> m </p> <!-- mettre des tests pour vérifier qu'il s'agit d'un chiffre-->
    <br>
    <p>Saisir votre poids (P) :<input id="" type="" name="poids" value=""> kg </p>

    <nav class="boutons">
      <br>
      <!-- CODE : bouton qui enregistre les données -->
      <button type="button" class="btn btn-lg text-center btn-custom-valider" value="<?php 
      
      ?>"> Valider </button>
    </nav>
    <br>
    <p> A l'aide de l'article suivant : <a href="https://fr.wikipedia.org/wiki/Article"> Lien vers l'article </a></p>

    <p class="fs-6" style="color:#4B75F9"> <em> Vous pourrez télécharger et consulter plus en détail cet article lorsque vous aurez fini le TD </em></p>

    <p> Retrouvez la formule de Black et al. pour calculer votre métabolisme de base en fonction de votre âge, votre poids et votre taille et remplissez la ligne dédiée dans le tableau suivant : </p>

    <div class="row align-items-center">

      <div class="col-8 table-responsive">

        <table class="table table-bordered table-custom">
          <thead class="thead-dark">
            <tr style="text-align:center">
              <th scope="col"> Votre métablolisme de base</th>
              <th scope="col">MJ/jour</th>
              <th scope="col">MJ/h</th>
              <th scope="col">kcal/j</th>
              <th scope="col">kcal/h</th>
            </tr>
          </thead>

          <section class="table table-bordered ">
            <tbody>
              <tr>
          <!-- CODE : dans les value mettre le code pour calculer le métabolisme avec les données personnelles d'avant-->
                <th scope="row">Selon Harris et Benedict</th>
                <td contenteditable="false" name="HB[0]" type="" value=""> </td>
                <td contenteditable="false" name="HB[1]" type="" value=""> </td>
                <td contenteditable="false" name="HB[2]" type="" value=""> </td>
                <td contenteditable="false" name="HB[3]" type="" value=""> </td>
            </tr>

            <tr>
          <!-- CODE : Vérifier que la formule entrée est bonne -->
              <th scope="row">Selon Black and al.</th>
              <td contenteditable="true" name="BA[0]" type="" value="" id=""> </td>
              <td contenteditable="true" name="BA[1]" type="" value="" id=""> </td>
              <td contenteditable="true" name="BA[2]" type="" value="" id=""> </td>
              <td contenteditable="true" name="BA[3]" type="" value="" id=""> </td>
            </tr>

          </tbody>
        </section>
        </table>
      </div>

      <div class="col-4">
        <p class="fs-6" style="color:#4B75F9"> <em> Saisir vos valeurs avec 2 chiffres après la virgule </em></p>
        <p class="fs-6" style="color:#4B75F9"> <em> Chercher sur internet la conversion de kcal en MJ </em></p>
        <p class="fs-6" style="color:#4B75F9"> <em> Les calculs se font automatiquement pour la formule de Harris et Benedict</em></p>
      </div>

    </div>

    <nav class="boutons">
      <!-- CODE : vérifier les réponses saisies -->
      <button type="button" class="btn btn-lg text-center btn-custom-valider" value=""> Valider </button>
    </nav>

    <!-- CODE : messages d'erreur à afficher et personnaliser selon les types d'erreurs -->
    <br><div class="alert alert-danger" role="alert" id="" value="">
      RÉPONSE FAUSSE :
      Pour passer de jour en heure, il faut diviser par 24.
    </div>

    <br><div class="alert alert-danger align-items-center" role="alert" id="" value="">
      RÉPONSE FAUSSE :
      Les valeurs pour la conversion sont : <img src="conversions.19.33.png" class="img-fluid" style="width:7em">
    </div>

    <br><div class="alert alert-danger align-items-center" role="alert" id="" value="">
      RÉPONSE FAUSSE :
      La formule à utiliser est : <img src="black.19.28.png" class="img-fluid" style="width:20em">
      <br> Avec avec le poids en kg, la taille en m et l'âge en année.
    </div>

    <!-- CODE : message à faire apparaître quand tout est bon -->
    <br><div class="alert alert-success" role="alert" id="" value="">
      POUR EN SAVOIR PLUS:
        <br>- On constate que les valeurs obtenus grâce à la formule de Harris et Benedict sont différentes des valeurs que vous avez obtenues avec la formule de Black!
        <br>- En effet, la formule de Harris et Benedict est moins précise: les valeurs obtenues s'écartent de 10% de la réalité.
        <br>- Notions de cours à insérer avec la correction, à développer par M. Sauvant
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
