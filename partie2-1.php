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

  <!-- insérer l'entête-->
  <?php include "header.php" ?>

  <div class="container-fluid">

    <h2 class="mt-5" style="color:#E62719"> II. Estimation de vos besoins nutritionnels </h2>
    <p class="mt-4"> <br><b>Question 3 : Calcul de votre métabolisme de base </b><br>
    <br>
    Le métabolisme de base correspond aux besoins énergétiques de l'organisme, c’est-à-dire la dépense d'énergie minimum quotidienne permettant à l'organisme de survivre. Il s'exprime en joules ou en calories par jour. <br><br>
    Il dépend de la taille, du poids, de l’âge, du sexe et de l’activité thyroïdienne. Il peut être influencé par la température extérieure. C'est l'alimentation qui permet de subvenir à ces besoins énergétiques. <br><br>
    Il existe de nombreuses équations qui définissent le métabolisme de base établies au fil des siècles. Les deux plus importantes sont les formules de Harris et Benedict ainsi que les formules de Black. <br>
	<br><b>Formule de Harris et Bennedict </b></p>
    
    <img src="formule_H_B.23.45.png" class="img-fluid" >

    <p class="fs-6" style="color:#4B75F9"> <em>A vous de jouer ! </em></p>

    <p><b> Entrez vos paramètres personnels </b></p>
	
	<form method="GET" name="donnees_perso" onsubmit="return Verif_Nombre()">
		<div class="row g-2 align-items-center">

		  <div class="col-auto">
			<p> Sélectionner votre sexe : </p>
			<br>
		  </div>
		<br>

			<?php
				$MB_HB=0;
				$MB_BA=0;
				if(isset($_GET["donnees"])||isset($_GET["metabo"])){	//si on a appuyer sur valider on récupère les données saisie
					$sexe=$_GET['sexe'];
					$age=$_GET['age'];
					$taille=$_GET['taille'];
					$poids=$_GET['poids'];
					
				}
				else{				// valeurs par défaut
					$sexe=NULL;
					$age=NULL;
					$taille=NULL;
					$poids=NULL;
				}
				
			echo"<div class='col-auto'>";
				echo"<select class='form-select' name='sexe' aria-label='Default select example' type='large:5em' name='' value='".$sexe."'>";
					echo"<option> Sélectionner votre sexe </option>";
					if($sexe==1)
						echo"<option value='1' selected> H </option>";
					else
						echo"<option value='1'> H </option>";
					if($sexe==2)
					echo"<option value='2' selected> F </option>";
					else 
						echo"<option value='2'> F </option>";
				echo"</select>";
		  echo "</div>";
		"</div>";

	echo "<p>Saisir votre âge (A) : <input name='age' value='".$age."'> ans </p><br>";

			?> 

	<script type="text/javascript">

		function Verif_Nombre(){

		  // si la valeur du champ n'est pas numérique
		  if(isNaN(document.donnees_perso.age.value)||isNaN(document.donnees_perso.taille.value)||isNaN(document.donnees_perso.poids.value)) {
			alert("Rentrez des valeurs numériques");
			// et on indique de ne pas envoyer le formulaire
			return false;
		  }
		  else {
		  // les données sont ok, on peut envoyer le formulaire    
			return true;
		  }
		}

	</script>
		
		
		
		<br><p class="fs-6" style="color:#4B75F9"> <em> Veuillez saisir votre taille en mètre, au centième près (2 chiffres après le <b>POINT</b>) </em></p>

	<?php
		echo "<p>Saisir votre taille (T) : <input id='' type='' name='taille' value='".$taille."'> m </p>"; 
		echo "<br>";
		echo "<p>Saisir votre poids (P) : <input id='' type='' name='poids' value='".$poids."'> kg </p>";
	?>	
	
	
		
		<div class="text-left mt-4 mb-5">
		  <button type="submit" class=" btn btn-lg text-center btn-custom-valider" name="donnees"> Valider </button>
        </div>
		
	</form>

    <p> A l'aide de l'article suivant : <a href="Bouchard_et_Bellanger_2005.pdf" target=_blank> Lien vers l'article </a></p>

    <p class="fs-6" style="color:#4B75F9"> <em> Vous pourrez télécharger et consulter plus en détail cet article lorsque vous aurez fini le TD </em></p>

    <p> Retrouvez la formule de Black et al. pour calculer votre métabolisme de base en fonction de votre âge, votre poids et votre taille et remplissez la ligne dédiée dans le tableau suivant : </p>

	<form method="GET" >
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


			<tbody>
		<?php
			include "../bdd/connexion_bdd.php";						//On se connecte à la base de données
			echo"<input type='hidden' name='age' value=".$age.">";			//On récupère les données du 1er formulaire
			echo"<input type='hidden' name='taille' value=".$taille.">";
			echo"<input type='hidden' name='poids' value=".$poids.">";
			echo"<input type='hidden' name='sexe' value=".$sexe.">";
			$id_utilisateur=1;

			if(isset($_GET["donnees"])||isset($_GET['metabo'])){	
				$query_add_sexe=" UPDATE Utilisateurs 
								SET id_sexe=".$sexe.",age_utilisateur=".$age.",taille_utilisateur=".$taille.",poids_utilisateur=".$poids."			
								WHERE id_utilisateur=".$id_utilisateur; 		//On met à jour les données de lutilisateur dans la BDD
						mysqli_query($link,$query_add_sexe)or die('Impossible de sélectionner la base de données'. mysqli_error($link));
				
				if($sexe==1){
					$MB_HB=round(0.276+0.0573*$poids+2.073*$taille-0.017*$age,2);
					$MB_BA=round(1.083*(pow($poids,0.48))*(pow($taille,0.5))*(pow($age,-0.13)),2);}	
				else{
					$MB_HB=round(2.741+0.0402*$poids+0.711*$taille-0.0197*$age,2);
					$MB_BA=round(0.963*pow($poids,0.48)*pow($taille,0.5)*pow($age,(-0.13)),2);}
					
			echo "<tr>";
				echo "<th scope='row'>Selon Harris et Benedict</th>"; 
				echo "<td contenteditable='false' name='HB[0]' type=''>".$MB_HB." </td>";
					$val1=round($MB_HB/24,2);
					echo "<td contenteditable='false' name='HB[1]' type=''>".$val1." </td>";
					$val2=round($MB_HB*239,2);
					echo "<td contenteditable='false' name='HB[2]' type=''>".$val2." </td>";
					$val3=round($MB_HB*239/24,2);
					echo "<td contenteditable='false' name='HB[3]' type=''>".$val3." </td>";
		
			echo"</tr>";}
	
			$BA=array();
			$BA[0]=NULL;
			$BA[1]=NULL;
			$BA[2]=NULL;
			$BA[3]=NULL;
			if(isset($_GET["metabo"])){
				$BA=$_GET['BA'];}
						
						echo"<tr>
							<th scope='row'>Selon Black and al.</th>
							<td> <input name='BA[0]' value='".$BA[0]."'></td>
							<td> <input name='BA[1]' value='".$BA[1]."'></td>				  
							<td> <input name='BA[2]' value='".$BA[2]."'></td>	
							<td> <input name='BA[3]' value='".$BA[3]."'></td>				
						</tr>";
		?>

				</tbody>
			</table>
		</div>

		<div class="col-4">
			<p class="fs-6" style="color:#4B75F9"> <em> Saisir vos valeurs avec 2 chiffres après le <b>POINT</b>.
			<br><br> Chercher sur internet la conversion de kcal en MJ. 
			<br><br> Les calculs se font automatiquement pour la formule de Harris et Benedict</em></p>
		  </div>

		</div>

		<div class="boutons mt-4">
		  <button type="submit" class="btn btn-lg text-center btn-custom-valider" name="metabo"> Valider </bitton>
		</div>
	</form>
	
	
    <!-- messages d'erreur à personnaliser selon les types d'erreurs -->
<?php
	
	
	if(isset($_GET["metabo"])){
		$BA=$_GET['BA'];
		//Valeurs attendues
		$MB1=round($MB_BA/24,2);
		$MB2=round($MB_BA*239,2);
		$MB3=round($MB2/24,2);
		if($BA[0]!=$MB_BA){
			echo "<br><div class='alert alert-danger align-items-center' role='alert' id='' value=''>";
			echo "RÉPONSE FAUSSE :";
			echo "La formule à utiliser est : <img src='black.19.28.png' class='img-fluid' style='width:20em'>";
			echo "<br> Avec avec le poids en kg, la taille en m et l'âge en année.";
			echo "</div>";
			//mettre en rouge
		}
		else{
			//mettre en vert
			if($BA[1]!=$MB1){
				echo "<br><div class='alert alert-danger' role='alert' id='' value=''>";
				echo "RÉPONSE FAUSSE :";
				echo "Pour passer de jour en heure, il faut diviser par 24.";
				echo "</div>";
				//mettre en rouge
				}
			else{
				//mettre en vert
				if($BA[2]!=$MB2){ 
					echo "<br><div class='alert alert-danger align-items-center' role='alert' id='' value=''>";
					echo "RÉPONSE FAUSSE :";
					echo "Les valeurs pour la conversion sont : <img src='conversions.19.33.png' class='img-fluid' style='width:7em'>";
					echo "</div>";
					//mettre en rouge
					}
				else{
					//Mettre en vert
					if($BA[3]!=$MB3){
						echo "<br><div class='alert alert-danger' role='alert' id='' value=''>";
						echo "RÉPONSE FAUSSE :";
						echo "Pour passer de jour en heure, il faut diviser par 24.";
						echo "</div>";
						//mettre en rouge
						}
					else{
						//mettre en vert
						echo "<br><div class='alert alert-success' role='alert' id='' value=''>"; //si tout bon
						echo "POUR EN SAVOIR PLUS:";
						echo "<br>- On constate que les valeurs obtenus grâce à la formule de Harris et Benedict sont différentes des valeurs que vous avez obtenues avec la formule de Black!";
						echo "<br>- En effet, la formule de Harris et Benedict est moins précise: les valeurs obtenues s'écartent de 10% de la réalité.";
						echo "<br>- Notions de cours à insérer avec la correction, à développer par M. Sauvant";
						echo "</div>";
					}
				}
			}
		}
	}
?>
  </div>
</div>

  <?php include "Evolution_TD.php" ?>
  <?php include "PiedDePageTD.php"?>
  
