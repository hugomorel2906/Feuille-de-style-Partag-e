<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

      <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.0.0-beta3-dist/css/ma-feuille-de-style.css">


  <!-- insérer l'entête par un include (équipe Bootstrap)-->
  <?php include "header.php";?>
  <div class="container-fluid">

    
    <h2 class="mt-4" style="color:#E62719"> III. Connaissance de la composition nutritionnelle des aliments </h2>

    
    
    <!-- Affichage de l'image-->
    <div class="w-75 p-3">
      <img src="ingredients_patisserie.png" class="img-fluid" width="150%" alt="Responsive image">
    </div>   

    <!--Affichage de la question et consigne-->
    <p> <br><b>Question 5 : Calculez la valeur énergétique de 100g de cette pâtisserie indutrielle (en kJ et en Kcal) de votre métabolisme de base </b>
    <br> </p>
    <p class="fs-6 mb-5" style="color:#4B75F9"> <em>Trouver les valeurs énergétiques des protéines, glucides et lipides sur internet, puis calculer la valeur énergétique de 100g de ce produit (à un chiffre après la virgule).</em></p>
   

    <!-- Premier tableau-->
    <!-- Dans le tableau tab[][] -> 1er crochet: colonne & 2e crochet: ligne-->

    <div class="row">
      <div class="col-6">
        <table class="table table-bordered table-responsive"> 
          <thead>
            <tr>
              <th scope="col"><b>Quantité de macronutriments</b></th>
              <th scope="col"><b>Equivalent en kcal</b></th>
            </tr>
          </thead>
          
          <tbody>
            <tr>
              <th scope="row">1g de protéines</th>
              <td contenteditable="true" name="tab[1][1]" type="int"> </td>     
            </tr>
            <tr>
              <th scope="row">1g de glucides</th>
              <td contenteditable="true" name="tab[1][2]" type="int"> </td>
            </tr>
            <tr>
              <th scope="row">1g de lipides</th>
              <td contenteditable="true" name="tab[1][3]" type="int"> </td>
            </tr>
            <tr>
              <th scope="row">1g d'alcool</th>
              <td contenteditable="true" name="tab[1][4]" type="int"> </td>
            </tr>
            <tr>
              <th scope="row">1g de fibres</th>
              <td contenteditable="true" name="tab[1][5]" type="int"> </td>
            </tr>
          </tbody>
        </table>
      </div>

    <!-- Affichage de l'ampoule'-->
      <div class="col-6">
          <br><br><br><br><br>
        <div class="text-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-lightbulb" viewBox="0 0 16 16">
          <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A5.984 5.984 0 0 1 2 6zm6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1z"/>
        </svg>
        <p class="fs-6 text-center" style="color:#be3a3a"> <em>Les conversions sont à connaitre !</em></p>
        </div>
      </div>
    </div>

    <!--Affichage du bouton valider-->
    <button type="submit" class="btn btn-lg text-center btn-custom-valider"> Valider </button>
    <br><br>

<!-- CODE: Le bouton valider ci-dessus doit vérifier que les cases tab[1][1] à tab[1][5] soient justes-->
<!-- Au bout de 3 essais faux, les bonnes réponses s'affichent -->

    <!-- Deuxième tableau-->
    <div class="row">
      <div class="col-5">
        <table class="table table-bordered table-responsive">
          <thead>
            <tr>
              <th scope="col"><b>Valeur énergetique pour 100g</b></th>
              <th scope="col" style="color:#FFFF"> Blablabla  </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">kJ</th>
              <td contenteditable="true" name="tab2[1][1]" type="int"> </td>
            </tr>
            <tr>
              <th scope="row">Kcal</th>
              <td contenteditable="true" name="tab2[1][2]" type="int"> </td>
            </tr>
          </tbody>
        </table>
     </div>

    <!-- Affichage de l'ampoule-->
      <div class="col-7 mb-5">

        <div class="text-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-lightbulb" viewBox="0 0 16 16">
            <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A5.984 5.984 0 0 1 2 6zm6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1z"/>
        </svg>
        <p class="fs-6 text-center" style="color:#4B75F9"> <em>1 kcal = 4,184 kJ</em></p>
        </div>
      </div>
    </div>

    <!-- Affichage du bouton valider-->
    <button type="submit" class="btn btn-lg text-center btn-custom-valider"> Valider </button>

<!-- CODE: Le bouton valider ci-dessus doit vérifier que les cases tab2[1][1] et tab2[1][2] soient justes-->
<!-- Au bout de 3 essais faux, les bonnes réponses s'affichent -->

  </div>

<!-- insérer le pied de page (équipe Bootstrap)-->

    <?php include "Evolution_TD.php";?>
    <?php include "PiedDePageTD.php";?>

  </body>
</html>
