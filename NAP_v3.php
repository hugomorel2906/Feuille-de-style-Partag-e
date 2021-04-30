 <?php
// session_start() //accède àla session
// $login = $_SESSION["login"] //récupère le login stocké dans la session
$login=6;
// ?>

<!doctype html>
<html lang="en">

<?php
	include ("connexion_bdd.php");
	include ("Recherche_bdd.php");
	include ("Verif_Saisie_NAP.php");
	// Création d'un tableau de 0, en parcourant les lignes et les colonnes
	$val=Cptetab($link,"NAP","id_utilisateur=$login");
	$liste_ligne=array('A','B','C','D','E','F','Total (h)');		// On créé la liste des intitulés des lignes
	if ($val==0){		// Si aucune valeur n'est remplie
		for ($ligne=0;$ligne<count($liste_ligne)-1 ;$ligne++) {		// On parcourt les lignes du tableau
			for ($col=0;$col<=6 ; $col++) {						// On parcourt les colonnes du tableau
				$duree_NAP=0;									// On remplit la case avec un 0
				$requete= "insert into NAP(duree_NAP,id_jour,id_type_NAP, id_utilisateur) values($duree_NAP, $col,'$liste_ligne[$ligne]', $login)";
				$result= mysqli_query($link,$requete) or die("ATTENTION, l'une de vos données est érronnée. Merci de les corriger");
			}
		}
	}
?>

<body>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap-5.0.0-beta3-dist/css/ma-feuille-de-style.css">

  <title> Saisir NAP </title>
</head>

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


<!-- contenu de la page-->

  <!-- Encadré avec les consignes -->
  <div class="container-fluid">

    <div class="card card-custom-text">

      <h4 class="card-title "> Bienvenue dans l'onglet Saisie du Niveau d'Activité Physique </h4>
      <p class="card-text lead">
        Chaque jour, saisissez le nombre d'heures correspondant à votre Niveau d'Activité Physique (NAP). Les correspondances sont renseignées dans le premier tableau ci-dessous
        <br><br> PS : attention la somme des activités journalières doit faire 24, il n'y a pas plus ou moins d'heure dans une journée (de minuit à minuit)
      </p>
    </div>
  <br>

  <!-- Tableau -->
  <?php
  if (isset ($_GET["Valider"])){      // Conditions de fonctionnement du bouton "Valider"
		 for ($ligne=0;$ligne<count($liste_ligne)-1 ;$ligne++) {    // Réalisation d'une boucle qui parcourt toutes les valeurs entrées
			 for ($col=0;$col<=6 ; $col++) {
					$duree_NAP = $_GET["NAP$ligne$col"];
<<<<<<< HEAD

					$requete = "UPDATE NAP SET duree_NAP =$duree_NAP WHERE id_utilisateur=$login AND id_jour=$col AND id_type_NAP='$liste_ligne[$ligne]'";		// On met à jour les données dans la base de données
					$result= mysqli_query($link,$requete) or die("ATTENTION, l'une de vos données est érronnée. Merci de les corriger");

			}

		}
	}
	// Vérification que la somme des heures d'activité d'une journée soit égale à 24h
	$ligne_total=array();
	for ($col=0;$col<=6 ; $col++) {
=======
					
					$requete = "UPDATE NAP SET duree_NAP =$duree_NAP WHERE id_utilisateur=$login AND id_jour=$col AND id_type_NAP='$liste_ligne[$ligne]'";		// On met à jour les données dans la base de données 
					$result= mysqli_query($link,$requete) or die("ATTENTION, l'une de vos données est érronnée. Merci de les corriger");

			}
		
		}
	}	
	// Vérification que la somme des heures d'activité d'une journée soit égale à 24h
	$ligne_total=array();
	for ($col=0;$col<=6 ; $col++) { 
>>>>>>> ef7be6690f25e19f3362f7af8c77381c107acf21
				$rech=rechdom($link,'sum(duree_NAP)', 'NAP', "id_utilisateur=".$login . " and  id_jour= '".$col."'");
				$ligne_total[]=$rech;
			}
	$verif=Verif_Saisie_NAP($ligne_total);
	if ($verif=='Vos données ont été enregistrées.'){
		echo "<div class='alert alert-success' role='alert' id='' value=''>";
		echo $verif;
		echo "</div>";
		echo"<br>";
	}
	else{
		echo "<div class='alert alert-danger' role='alert' id ='' value=''>";
		echo $verif;
		echo "</div>";
	}
  ?>
<<<<<<< HEAD

=======
  
>>>>>>> ef7be6690f25e19f3362f7af8c77381c107acf21
  <!--	création des intitulés des colonnes (jours de la semaine, puis total et moyenne par type d'activité -->
  <div class="table-responsive">
  <FORM method="get" name="Formulaire_NAP" >
    <table class="table table-bordered table-custom">
      <thead class="thead-dark">
        <tr style="text-align:center">
          <th scope="col">Niveau d'activité</th>
          <th scope="col">Lundi</th>
          <th scope="col">Mardi</th>
          <th scope="col">Mercredi</th>
          <th scope="col">Jeudi</th>
          <th scope="col">Vendredi</th>
          <th scope="col">Samedi</th>
          <th scope="col">Dimanche</th>
          <th scope="col">Total (nb h/sem)</th>
          <th scope="col">Moyenne (nb h /sem)</th>
        </tr>
      </thead>

  <!-- CODE : pouvoir récupérer les informations saisies -->
    <section class="table table-bordered">
      <tbody>
         <!--faire des boucles pour les input, faire des if isset-->
<<<<<<< HEAD


		   <?php     // Codes pour garder les valeurs remplies affichées

=======
          
		  
		   <?php     // Codes pour garder les valeurs remplies affichées
		  
>>>>>>> ef7be6690f25e19f3362f7af8c77381c107acf21
		  $liste_ligne=array('A','B','C','D','E','F','Total (h)');

		  for ($ligne=0;$ligne<count($liste_ligne)-1 ;$ligne++) {
			  echo "<tr>";
			  echo "<td scope='row'>".$liste_ligne[$ligne]."</td>";
<<<<<<< HEAD

			  for ($col=0;$col<=6 ; $col++) {
				$valeur=rechdom ($link,"duree_NAP", "NAP", "id_utilisateur=$login and id_jour=$col and id_type_NAP='$liste_ligne[$ligne]'");  // récupération de la donnée
				echo " <td><input name='NAP".$ligne."".$col."' value='".$valeur."' type='int'></td> ";
			  }

				// colonne 7 : total
				$rech=rechdom($link,'sum(duree_NAP)', 'NAP', "id_utilisateur=".$login . " and  id_type_NAP= '".$liste_ligne[$ligne]."'");
				echo "<td>".$rech."</td>";

				// colonne 8 : moyenne

				$rech=rechdom($link,'avg(duree_NAP)', 'NAP', "id_utilisateur=".$login . " and  id_type_NAP= '".$liste_ligne[$ligne]."'");
				echo "<td>".$rech."</td>";

=======
			  
			  for ($col=0;$col<=6 ; $col++) {	
				$valeur=rechdom ($link,"duree_NAP", "NAP", "id_utilisateur=$login and id_jour=$col and id_type_NAP='$liste_ligne[$ligne]'");  // récupération de la donnée
				echo " <td><input name='NAP".$ligne."".$col."' value='".$valeur."' type='int'></td> ";
			  }
			  
				// colonne 7 : total
				$rech=rechdom($link,'sum(duree_NAP)', 'NAP', "id_utilisateur=".$login . " and  id_type_NAP= '".$liste_ligne[$ligne]."'");
				echo "<td>".$rech."</td>";
				
				// colonne 8 : moyenne
				
				$rech=rechdom($link,'avg(duree_NAP)', 'NAP', "id_utilisateur=".$login . " and  id_type_NAP= '".$liste_ligne[$ligne]."'");
				echo "<td>".$rech."</td>";	
			
>>>>>>> ef7be6690f25e19f3362f7af8c77381c107acf21
			  echo "</tr>";
		  }
		  // dernière ligne
		   echo "<td scope='row'>".$liste_ligne[count($liste_ligne)-1]."</td>";
<<<<<<< HEAD
			for ($col=0;$col<=6 ; $col++) {
				$rech=rechdom($link,'sum(duree_NAP)', 'NAP', "id_utilisateur=".$login . " and  id_jour= '".$col."'");
				echo "<td>".$rech."</td>";
			}

=======
			for ($col=0;$col<=6 ; $col++) { 
				$rech=rechdom($link,'sum(duree_NAP)', 'NAP', "id_utilisateur=".$login . " and  id_jour= '".$col."'");
				echo "<td>".$rech."</td>";	
			}
		 
>>>>>>> ef7be6690f25e19f3362f7af8c77381c107acf21


    echo"</tbody>";
    echo"</section>";
    echo"</table>";
<<<<<<< HEAD

// Création d'un bouton "Valider"
=======
	
// Création d'un bouton "Valider" 
>>>>>>> ef7be6690f25e19f3362f7af8c77381c107acf21
	echo "<INPUT TYPE='SUBMIT' name='Valider' value='Valider'>";

echo "</FORM>";


<<<<<<< HEAD
?>


  </div>
  <br>

=======
?>		
	
	
  </div>
  <br>
 
>>>>>>> ef7be6690f25e19f3362f7af8c77381c107acf21
    <!-- CODE : fonction qui permet de sauvegarder les données quand on click sur le retour au menu -->
  <nav class="boutons text-center">
    <button type="button" class="btn btn-lg text-center btn-custom"> <a href="./page-accueil.html"> retour au menu </a></button>
  </nav>
  <p><br></p>


      <!-- CODE : insérer "Pied de page général" sur chacune des pages (via include?)-->
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
