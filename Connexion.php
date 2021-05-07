<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.0.0-beta3-dist/css/ma-feuille-de-style.css">
  </head>



    <div class="container-fluid text-center mt-4">
        <h3> Je suis ... </h3>
        <form method="GET" name="connexion">
        
        <div class="text-center mt-4">
            <button type="submit" class=" btn btn-lg text-center btn-custom" name="enseignant">Enseignant</button>

            <?php 
            if(isset($_GET['enseignant'])){
                echo "<br><br> insérer un formulaire de connexion";
            }
            ?>

            <button type="submit" class=" btn btn-lg text-center btn-custom" name="etudiant">Etudiant</button>

            <?php 
            if(isset($_GET['etudiant'])){
                echo "<br><br> insérer un formulaire de connexion avec liste déroulante pour les 3 personae";
            }
            ?>
        </form>

        </div> 
    </div>

</html>
