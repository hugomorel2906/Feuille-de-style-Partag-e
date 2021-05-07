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
    include ("connexion_bdd.php");?>

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


<h2  style="color:#E62719"> <br> Gestion de l'ordre des questions </h2><br>

<form action="ordre_question.php" method="GET">

<!-- PREMIERES QUESTIONS (collation OUI) -->
<div class="row">
<div class="col-2">
Nom de la question
</div>
<div class = "col-5">
    <input type="text" name="intitule_qst" value="Question 1: Répartition des apports énergétiques au cours des différents repas de la journée selon les recommandation nutritionnelles (COLLATION: OUI)" size="60px">
</div>
<div class="col-5">

    <label> N° de question: </label>
    <select name="numero_question">
        <option value="">1</option>
    </select>
</div>
</div> <br>

<!-- PREMIERES QUESTIONS (collation OUI) -->
<div class="row">
<div class="col-2">
</div>
<div class = "col-5">
    <input type="text" name="intitule_qst" value="Question 1: Répartition des apports énergétiques au cours des différents repas de la journée selon les recommandation nutritionnelles (COLLATION: NON)" size="60px">
</div>
<div class="col-5">

    <label> N° de question: </label>
    <select name="numero_question">
        <option value="">1</option>
    </select>
</div>
</div> <br>

<!-- REQUETE SQL-->
<?php
$total_question="SELECT COUNT(nom_question) FROM question WHERE num_question!='1'";
$result_total_qst= mysqli_query($link,$total_question) or die("ATTENTION, l'une de vos données est erronée. Merci de les corriger");
$tab2=mysqli_fetch_all($result_total_qst);

?>


<!-- AUTRES QUESTIONS -->
<?php 
for($i=0;$i<$tab2[0][0];$i++){
    
    $requete= "SELECT nom_question FROM question WHERE num_question!='1' AND num_question=$i+2";
    $result= mysqli_query($link,$requete) or die("ATTENTION, l'une de vos données est erronée. Merci de les corriger");
    $tab=mysqli_fetch_all($result);
   
    ?>
    <div class="row">
    <div class="col-2">
    </div>
    <div class = "col-5">
        <?php
        echo '<input type="text" name="intitule_qst" value="'.$tab[0][0].'" size="60px">';
        ?>
    </div>
    <div class="col-5">

        <label> N° de question: </label>
        <?php
        echo '<select name="numero_question'.$i.'">';
        ?>
            <option value="">--Choisir un n° de question--</option>
            <?php
            for($k=0;$k<$tab2[0][0];$k++){
                $j=$k+2;
                echo '<option value="'.$j.'">'.$j.'</option>';
            }
            ?>
        </select>

    </div>
    </div>
    <br>
    

<?php
echo '<input type="hidden" name="numero_question'.$i.'">';
}
?>

<!-- BOUTON POUR VALIDER-->
<br>
<div class="row">
<nav class="boutons">
    <input type="submit" class="btn btn-lg text-center btn-custom-valider" name="valider_ordre" value="Valider"></input>
</nav>
</div>
