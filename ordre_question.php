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



<?php

// Récupération du numéro des questions
$total_question="SELECT num_question FROM question WHERE num_question!='1'";
$result_total_qst= mysqli_query($link,$total_question) or die("ATTENTION, l'une de vos données est erronée. Merci de les corriger");
$tab2=mysqli_fetch_all($result_total_qst);
$nbquestion=count($tab2);

// mise à jour de la BDD
if(isset($_GET["valider_ordre"])){
    $requete= "SELECT id_question FROM question WHERE num_question!='1'";
        $result= mysqli_query($link,$requete) or die("ATTENTION, l'une de vos données est erronée. Merci de les corriger");
        $tab=mysqli_fetch_all($result);
    $tab_ord=$_GET["ordre_question"];
    for($i=0;$i<$nbquestion;$i++){
        $val = $i+2;
        $num=$tab_ord[$i];
        
        //var_dump($tab[0][0]);

        $j=$i+1;
        $identifiant=$tab[$i][0];

        $queryordre="UPDATE question SET num_question='$num' WHERE id_question='$identifiant'";
        echo "<br>";
        mysqli_query($link,$queryordre) or die(mysqli_error($link));
    }
}


// Remise à joure des numéros des questions
$total_question="SELECT num_question FROM question WHERE num_question!='1'";
$result_total_qst= mysqli_query($link,$total_question) or die("ATTENTION, l'une de vos données est erronée. Merci de les corriger");
$tab2=mysqli_fetch_all($result_total_qst);
$nbquestion=count($tab2);


?>

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



<!-- AUTRES QUESTIONS -->
<?php 




for($i=0;$i<$nbquestion;$i++){
    $requete= "SELECT nom_question,id_question FROM question WHERE num_question=".$tab2[$i][0];
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
        
        $identifiant=$tab[0][1];
         $requete1= "SELECT num_question FROM question WHERE id_question=".$identifiant;
         $result1= mysqli_query($link,$requete1) or die("ATTENTION, l'une de vos données est erronée. Merci de les corriger");
         $tab1=mysqli_fetch_all($result1);
         $numquestion= $tab1[0][0];
         

        echo "<select name='ordre_question[".$i."]'>" ;            
        for($k=0;$k<$nbquestion;$k++){
            $j=$k+2;
            if($j==$numquestion)
                echo '<option value="'.$j.'" selected>'.$j.'</option>';
            else
                echo '<option value="'.$j.'">'.$j.'</option>';

        }
            ?>
        </select>

    </div>
    </div>
    <br>

<?php
}
?>

<!-- BOUTON POUR VALIDER-->
<br>
<div class="row">
<nav class="boutons">
    <input type="submit" class="btn btn-lg text-center btn-custom-valider" name="valider_ordre" value="Valider"></input>
</nav>
</div>
</form>



</body>
</html>