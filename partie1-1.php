<?php
// session_start() //accède à la session
// $login = $_SESSION["login"] //récupère le login stocké dans la session
$login=6;
// ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.0.0-beta3-dist/css/ma-feuille-de-style.css">

    <?php include("script1.php");
    include ("../bdd/connexion_bdd.php");?>

    <title>TD q1</title>
</head>

<body>

<!-- HEADER-->
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
<!-- END HEADER-->

<!-- Contenu de page-->
<div class="container-fluid">

<br>
<form action="partie1-1.php" method="GET">

<!-- PREMIERE QUESTION: COLLATION OU NON-->
<div>
    Prenez-vous habituellement une collation dans la journée ?
    <input type="radio" id="collationoui" name="collation" value="oui" <?php if(isset($_GET['collation'])) {if($_GET['collation']=="oui")echo ' checked="checked"';}?>>
    <label for="collationoui">Oui</label>
    <input type="radio" id="collationnon" name="collation" value="non" <?php if(isset($_GET['collation'])) {if($_GET['collation']=="non")echo ' checked="checked"';}?>>
    <label for="collationnon">Non</label>
</div>
<br>

<?php
if(isset($_GET["tentatives"])){
    echo "<br>";
}

else{
    ?>
    <!-- BOUTON POUR VALIDER-->
    <nav classe="boutons">
    <input type="submit" class="btn btn-lg text-center btn-custom-valider" name="valider_collation" value="Valider"></input>
    </nav>
    <?php
}



// LA SUITE S'AFFICHE SI LA PREMIERE QUESTION A ETE REALISEE
if(isset($_GET["collation"])){
    $collation=$_GET["collation"];
    
    //SI DEJA FAIT DES TENTATIVES: récupère la valeur dans l'URL
    if(isset($_GET["tentatives"])){
       $tentatives=$_GET["tentatives"];
    }
    
    //SI PAS ENCORE COMMENCE: tentatives=0
    else{
    $tentatives=0;
    }
    
    
    if($tentatives<3){
        $tentatives+=1;
        

        echo "<input type='hidden' name='tentatives' value =". $tentatives.">";


    //PAS DE COLLATION
    if ($collation == "non"){

        // REQUETE SPECIFIQUE POUR PAS DE COLLATION
        $requete= "select question.reponse FROM question WHERE num_question='1' AND consigne is NULL";
        ?>
        <input type="hidden" value=<?php $requete ?>>

        <!-- PAS DE COLLATION: 3 champs-->
        <input type="hidden" name="iddrop1" id="iddrop1" value="">
        <input type="hidden" name="iddrop2" id="iddrop2" value="">
        <input type="hidden" name="iddrop3" id="iddrop3" value="">
        
        <h2  style="color:#E62719"> <br> I. Connaissance des recommandations </h2>
        <p class="fs-6" style="color:#4B75F9"> Chercher sur internet les informations suivantes : </p>

        
        <p><br><b>Question 1 : Répartition des apports énergétiques au cours des différents repas de la journée, selon les recommendations nutritionnelles </b><br></p>
        <p> Il est conseillé de prendre 3 repas par jour.  </p>

        <!-- 3 DROPZONES-->
        <div class= align-items-center> La part moyenne des apports énergétiques conseillés est de <div class= "example-dropzone d-inline-flex" id="drop1" ondrop="drop_handler(event, 'drop1','iddrop1');" ondragover="dragover_handler(event);"></div> % pour le petit déjeuner,
        de <div class= "example-dropzone d-inline-flex" id="drop2" ondrop="drop_handler(event, 'drop2','iddrop2');" ondragover="dragover_handler(event);"></div> % pour le déjeuner
        et de <div class= "example-dropzone d-inline-flex" id="drop3" ondrop="drop_handler(event, 'drop3','iddrop3');" ondragover="dragover_handler(event);"></div> % pour le dîner. 
        </div>

        <!-- LES ETIQUETTES -->

        <div class="example-parent ">
          <div class="example-draggable m-2" draggable="true" id="src_copy1" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">5%</div>
          <div class="example-draggable m-2" draggable="true" id="src_copy1" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">7%</div>
          <div class="example-draggable m-2" draggable="true" id="src_copy2" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">10%</div>
          <div class="example-draggable m-2" draggable="true" id="src_copy3" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">15%</div>
          <div class="example-draggable m-2" draggable="true" id="src_copy4" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">20%</div>
          <div class="example-draggable m-2" draggable="true" id="src_copy5" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">25%</div>
          <div class="example-draggable m-2" draggable="true" id="src_copy6" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">28%</div>
          <div class="example-draggable m-2" draggable="true" id="src_copy1" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">30%</div>
          <div class="example-draggable m-2" draggable="true" id="src_copy1" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">40%</div>
          <div class="example-draggable m-2" draggable="true" id="src_copy1" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">45%</div>
          <div class="example-draggable m-2" draggable="true" id="src_copy1" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">55%</div>
          <div class="example-draggable m-2" draggable="true" id="src_copy1" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">64%</div>
          <div class="example-draggable m-2" draggable="true" id="src_copy1" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">70%</div>
        </div></p>

        <br>
        
        <!-- BOUTON VALIDER ET REINITIALISER-->
        <div class= "row">
        <div class="col-1">
            <nav classe="boutons">
            <button type="submit" name = "Valider_rep1_non" class="btn btn-lg text-center btn-custom-valider" > Valider </button>
            </nav>
        </div>
        <div class="col-11">
            <div class="btn btn-lg text-center btn-custom-effacer" onclick = "remove()" name="recharge"> Réinitialiser</div>
        </div>
        </div>

        <br>

    <?php        }

    //COLLATION
    if($collation =="oui"){
        $requete= "select question.reponse FROM question WHERE num_question='1' AND consigne is NOT NULL";
        ?>
        <input type=hidden value=<?php $requete ?>>

        <!-- COLLATION: 4 champs-->
        <input type="hidden" name="iddrop1" id="iddrop1" value="">
        <input type="hidden" name="iddrop2" id="iddrop2" value="">
        <input type="hidden" name="iddrop3" id="iddrop3" value="">
        <input type="hidden" name="iddrop4" id="iddrop4" value="">
        
        <h2  style="color:#E62719"> <br> I. Connaissance des recommandations </h2>
        <p class="fs-6" style="color:#4B75F9"> Chercher sur internet les informations suivantes : </p>

        
        <p> <br><b>Question 1 : Répartition des apports énergétiques au cours des différents repas de la journée, selon les recommendations nutritionnelles </b><br><br></p>
        
        <!-- 4 DROPZONES-->
        <div class= align-items-center> La part moyenne des apports énergétiques conseillés est de <div class= "example-dropzone d-inline-flex"  id="drop1" ondrop="drop_handler(event,'drop1','iddrop1');" ondragover="dragover_handler(event);"></div> pour le petit déjeuner,
        de <div class= "example-dropzone d-inline-flex" id="drop2" ondrop="drop_handler(event, 'drop2','iddrop2');" ondragover="dragover_handler(event);"></div> pour le déjeuner, 
        de <div class= "example-dropzone d-inline-flex" id="drop3" ondrop="drop_handler(event, 'drop3','iddrop3');" ondragover="dragover_handler(event);"></div> pour le goûter,
        et de <div class= "example-dropzone d-inline-flex" id="drop4" ondrop="drop_handler(event,'drop4','iddrop4');" ondragover="dragover_handler(event);"></div> pour le dîner. </div>

        <br>

        <!-- LES ETIQUETTES-->
        <div class="example-parent ">
          <div class="example-draggable m-2" draggable="true" id="src_copy1" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">5%</div>
          <div class="example-draggable m-2" draggable="true" id="src_copy1" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">7%</div>
          <div class="example-draggable m-2" draggable="true" id="src_copy2" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">10%</div>
          <div class="example-draggable m-2" draggable="true" id="src_copy3" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">15%</div>
          <div class="example-draggable m-2" draggable="true" id="src_copy4" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">20%</div>
          <div class="example-draggable m-2" draggable="true" id="src_copy5" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">25%</div>
          <div class="example-draggable m-2" draggable="true" id="src_copy6" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">28%</div>
          <div class="example-draggable m-2" draggable="true" id="src_copy7" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">30%</div>
          <div class="example-draggable m-2" draggable="true" id="src_copy8" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">40%</div>
          <div class="example-draggable m-2" draggable="true" id="src_copy9" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">45%</div>
          <div class="example-draggable m-2" draggable="true" id="src_copy10" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">55%</div>
          <div class="example-draggable m-2" draggable="true" id="src_copy11" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">64%</div>
          <div class="example-draggable m-2" draggable="true" id="src_copy12" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">70%</div>
        </div></p>

        <br>

        <!-- BOUTON VALIDER ET REINITIALISER-->
        
        <div class= "row">
        <div class="col-1">
            <nav classe="boutons">
            <button type="submit" name = "Valider_rep1_oui" class="btn btn-lg text-center btn-custom-valider"> Valider </button>
            </nav>
        </div>
        <div class="col-11">
        <div class="btn btn-lg text-center btn-custom-effacer" onclick = "remove()" name="recharge"> Réinitialiser</div>
        </div>
        </div>

        <br>
        <?php
        
      }

      // TRANSFORME LA REPONSE ATTENDUE STOQUEE DANS LA BASE DE DONNEE EN TABLEAU: la réponse est stoquée dans $tab
      $result= mysqli_query($link,$requete) or die("ATTENTION, l'une de vos données est erronée. Merci de les corriger");
      $tab=mysqli_fetch_all($result);
    }

    else{
        ?>
        <br>
        <div class="alert alert-danger" role="alert" id ="" value="">
        Vous avez effectué trop de tentatives: passez à la question suivante. <br>
        La répartition attendue était: <br>
        - si collation: Petit-déjeuner (25%), Déjeuner (40%), Goûter (5%), Dîner (30%).<br>
        - sans collation: Petit-déjeuner (25%), Déjeuner (40%), Dîner (35%).
        </div>
        <?php
        $tentatives+=1;
    }
}

if(isset($_GET["tentatives"])){
if($tentatives<=3){
    // SI COLLATION: 4 valeurs dans $tab
    if(isset($_GET["Valider_rep1_oui"])){
        $tab_rep=array();
        $tab_rep[0]=substr("iddrop1",2,6);
        $tab_rep[1]=substr($_GET['iddrop1'],0,3);
        $tab_rep[2]=substr("iddrop2",2,6);
        $tab_rep[3]=substr($_GET['iddrop2'],0,3);
        $tab_rep[4]=substr("iddrop3",2,6);
        $tab_rep[5]=substr($_GET['iddrop3'],0,3);
        $tab_rep[6]=substr("iddrop4",2,6);
        $tab_rep[7]=substr($_GET['iddrop4'],0,3);

        $tab_fin="[".$tab_rep[0].','.$tab_rep[1].','.$tab_rep[2].','.$tab_rep[3].','.$tab_rep[4].','.$tab_rep[5].','.$tab_rep[6].','.$tab_rep[7].']'; // Tableau avec les valeurs des étiquettes placées

        // SI L'ELEVE A MIS LA BONNE REPONSE
        if ($tab_fin== $tab[0][0]) {
        ?>
       
        <div class="alert alert-success" role="alert" id="" value="">
        Vous avez les bonnes réponses ! Vous pouvez passez à la question suivante. 
        </div>
        <?php
        }
      
        // SI l'ELEVE N'A PAS MIS LA BONNE REPONSE
        else{?>
        <div class="alert alert-danger" role="alert" id ="" value="">
        REPONSE(S) FAUSSE(S) : Attention vous avez fait une (ou des) erreur(s) !
        </div>
       
        <?php
        
      }
    }

    
    // SI PAS DE COLLATION: 3 valeurs dans $tab
    if(isset($_GET["Valider_rep1_non"])){
        $tab_rep=array();
        $tab_rep[0]=substr("iddrop1",2,6);
        $tab_rep[1]=substr($_GET['iddrop1'],0,3);
        $tab_rep[2]=substr("iddrop2",2,6);
        $tab_rep[3]=substr($_GET['iddrop2'],0,3);
        $tab_rep[4]=substr("iddrop3",2,6);
        $tab_rep[5]=substr($_GET['iddrop3'],0,3);
  
        $tab_fin="[".$tab_rep[0].','.$tab_rep[1].','.$tab_rep[2].','.$tab_rep[3].','.$tab_rep[4].','.$tab_rep[5].']'; // Tableau avec les valeurs des étiquettes placées
        
        // SI L'ELEVE A MIS LA BONNE REPONSE
        if ($tab_fin== $tab[0][0]) {
        ?>
        <div class="alert alert-success" role="alert" id="" value="">
        Vous avez les bonnes réponses ! Cette répartition est à connaître !
        </div>
        <?php
        }
        
        // SI l'ELEVE N'A PAS MIS LA BONNE REPONSE
        else{?>
        <div class="alert alert-danger" role="alert" id ="" value="">
        REPONSE(S) FAUSSE(S) : Attention vous avez fait une (ou des) erreur(s) !
        </div>
        <?php
        }
    }
}
}
    ?>


</div>
</form>


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