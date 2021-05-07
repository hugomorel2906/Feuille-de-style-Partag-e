<?php
// session_start() //accède àla session
// $login = $_SESSION["login"] //récupère le login stocké dans la session
$login=1;
//Auteurs : Charlotte, Mailys, Mathilde, Nils
include ("./bdd/connexion_bdd.php");
include ("./fonctions/Recherche_bdd.php");
//Entête
include("header.html");
?>

<!-- Contenu du site-->

<div class="container-fluid">

<br><br>
  <h2  style="color:#E62719"> <br> IV. Adéquation entre vos "menus hebdomadaires" et vos besoins</h2>
  <p> <br><b>Question 7 : Analyse d'une ration alimentaire au cours d'une journée</b>
  <br> </p>

  <p> Vous avez entré les informations relatives à vos repas et vous allez maintenant les analyser. </p>
  <p> Après avoir choisi la journée à analyser, vous aurez des tableaux à remplir. Certaines cases seront complétées automatiquement si les cases que vous avez remplies sont correctes. Les six autres jours de la semaine seront calculées automatiquement également.</p>
  <br>
<!-- Affichage des boutons de la semaine-->
  <!-- CODE: mettre les boutons d'une certaine couleur en fonction de si oui ou non, le tableau est analysable (class="btn btn-outline-danger m-2")-->
  <FORM method="get" name="Formulaire_q4.1" >
  <div class="d-md-block text-center boutons"> 
    <input name="jour" type="submit" class="btn btn-outline-success m-2" value="Lundi"> <!--bouton vert-->
    <input name="jour" type="submit" class="btn btn-outline-success m-2" value="Mardi"> <!--bouton vert-->
    <input name="jour" type="submit" class="btn btn-outline-success m-2" value="Mercredi"> <!--bouton vert-->
    <input name="jour" type="submit" class="btn btn-outline-success m-2" value="Jeudi"> <!--bouton rouge-->
    <input name="jour" type="submit" class="btn btn-outline-success m-2" value="Vendredi"> <!--bouton vert-->
    <input name="jour" type="submit" class="btn btn-outline-success m-2" value="Samedi"> <!--bouton vert-->
    <input name="jour" type="submit" class="btn btn-outline-success m-2" value="Dimanche"> <!--bouton vert--> 
  </div>
  </form>
  <br>
<?php
//L'ELEVE CHOISI UN JOUR
if (isset($_GET["jour"])){ //récupération du nom du jour sélectionné
	$jour=$_GET["jour"];
	echo "Vous avez choisi d'analyser vos repas de <i><b>".$jour.".</b></i><br><br>";
	
//envoyer des 0 pour les reponses et num_tentative
	//calcul du nombre de repas dans la journée
	$requete="SELECT id_type_repas FROM repas_etudiant r JOIN jour j ON r.id_jour=j.id_jour WHERE id_utilisateur=$login AND lib_jour='$jour'";
	$result=mysqli_query($link,$requete);
	$type_repas = mysqli_fetch_all($result); // récupération de l'ensemble des identifiants des repas de ce jour
	$nb_repas=mysqli_num_rows($result); //nb_lignes du résultat de la requete= nb de repas

	//récupération de l'id_examen_etudiant à partir de l'id_utilisateur
	$req="SELECT id_examen_etudiant FROM examen_etudiant WHERE id_utilisateur=$login";
	$r=mysqli_query($link,$req);
	$tb = mysqli_fetch_row($r);
	$id_examen_etudiant=$tb[0];

	//verification si des réponses ont déjà été envoyées SINON ON RENTRE DES DONNEES PAR DEFAUTS
	$id_question=13;
	$val=Cptetab($link,"reponse_etudiant","id_examen_etudiant=$id_examen_etudiant AND id_question=$id_question");
	$num_tentatives=0;
	$reponse_juste=0;
	$reponse_libre='Pas de réponses saisies';
	if ($val==0){
		for ($i=0;$i<$nb_repas;$i++){
			$requete= "INSERT INTO reponse_etudiant(id_question,id_examen_etudiant,num_tentatives,reponse_juste,reponse_libre,temps_question)
			VALUES($id_question, $id_examen_etudiant, $num_tentatives, $reponse_juste, '".$reponse_libre."',NULL)";
			$result= mysqli_query($link,$requete) or die("ATTENTION, l'une de vos données est érronnée. Merci de les corriger".mysqli_error($link));
		}
	}
	//Recuperation des id_reponse associees à l'etudiant et à la question dans la base de donnees
	$requete="SELECT id_reponse FROM reponse_etudiant WHERE id_examen_etudiant=$id_examen_etudiant AND id_question=$id_question";
	$result=mysqli_query($link,$requete);
	$id_reponses = mysqli_fetch_all($result);
	
	function calcul_apport($kcal,$qte){
		$apport=($kcal*$qte)/100;
		return $apport;
	}
	
	if (isset ($_GET["Valider"])){ 
		//MISE A JOUR DES DONNEES ET VERIFICATION DES REPONSES
		$reponses_correctes=TRUE;
		for ($i=0;$i<$nb_repas;$i++){
			$reponse_juste=1;//Initialisation à 1 = True
			$id_reponse=$id_reponses[$i][0];
			$num_tentative=rechdom ($link,'num_tentatives', 'reponse_etudiant',"id_examen_etudiant=".$id_examen_etudiant." AND id_question=".$id_question." AND id_reponse=$id_reponse")+1;
			$reponse_libre= $_GET["Apport$i"];
			$kcal_aliment=$_GET["kcal$i"];//valeur kcal pour un aliment
			$qte_aliment=$_GET["qte$i"];//valeur qte pour un aliment
			if ($_GET["Apport$i"]!=calcul_apport($kcal_aliment,$qte_aliment)){
				$reponses_correctes=False; // $reponses_correctes = à False
				$reponse_juste=0;
			}
			//UPDATER TOUTES LES REPONSES MEME CELLES QUI SONT BONNES SINON CODE AFFICHAGE BOUTON NE MARCHERA PLUS
			$requete = "UPDATE reponse_etudiant SET reponse_libre='".$reponse_libre."',num_tentatives=$num_tentative, reponse_juste=$reponse_juste WHERE id_examen_etudiant=$id_examen_etudiant AND id_question=$id_question AND id_reponse=$id_reponse";
			$result= mysqli_query($link,$requete) or die("ATTENTION, l'une de vos données est érronnée. Merci de les corriger");
		}
			if ($reponses_correctes==FALSE){
				echo "<div class='alert alert-danger mx-4' role='alert'>";
				echo "Mauvaise réponse.";
				echo "</div>";
				echo "<div class='alert alert-danger mx-4' role='alert'>";
				echo "Aide : Il faut prendre en compte l'énergie pour 100g et la quantité consommée, et faire un produit en croix.";
				echo "</div>";
			}
		}
		
	echo "<p><u> Vous avez indiqué avoir consommé les aliments suivants: </u></p>"; 

?>

<div class="table-responsive">
  <FORM method="get" name="Formulaire_calcul_calories" >

<?php
for ($i=0;$i<$nb_repas;$i++){
	//affichage d'un tableau des aliments de la journée pour chaque repas
	$id_type_repas=$type_repas[$i][0]; //récupération de l'identifiant du repas
	$requete_repas="SELECT type_repas, alim_nom_fr, Energie__Reglement_UE_N°_1169_2011__kcal_100_g_,quantite, Glucides__g_100_g_, Proteine_Nx6_25,Lipides_g_100g
	FROM aliment a join quantite q on a.alim_code = q.alim_code join repas_etudiant r on r.id_repas_etudiant=q.id_repas_etudiant join jour j on r.id_jour=j.id_jour join type_repas t ON r.id_type_repas=t.id_type_repas
	WHERE id_utilisateur=$login AND lib_jour='$jour' AND t.id_type_repas=$id_type_repas";
	$resultat=mysqli_query($link,$requete_repas);
	$tab=mysqli_fetch_all($resultat);
	$nb_aliments=mysqli_num_rows($resultat);
	$nbcol=7;
?>
	<table class="table table-bordered table-custom">
      <thead class="thead-dark">
        <tr style="text-align:center">
<?php //Affichage des entêtes du tableau
          echo"<th scope='col'>".$tab[0][0]."</th>";
?>
          <th scope="col">Kcal / 100g</th>
          <th scope="col">Quantité</th>
          <th scope="col">Glucides (g/100g)</th>
          <th scope="col">Protéines (g/100g)</th>
          <th scope="col">Lipides (g/100g)</th>
		  <th scope="col">Apports Kcal</th>
        </tr>
      </thead>
<?php	
// TABLEAUX (Un par repas)
	echo"<section class='table table-bordered'>";
		echo "<tbody>";
		for ($j=0; $j < $nb_aliments; $j++)                //boucle parcourant chaque ligne du recordset, 
        {
            echo ("<TR>");
            for ($h=1; $h < $nbcol; $h++)            //boucle parcourant chaque colonne du recordset (début à 1 car à 0 c'est le type repas qu'on n'affiche pas
            {
                    echo "<TD><center>" . $tab[$j][$h]  . "</center></TD>";    // affichage des valeurs du tableau
			}
			if ($j==0){
				$id_reponse=$id_reponses[$i][0];
				$valeur_saisie=rechdom ($link,'reponse_libre', 'reponse_etudiant',"id_examen_etudiant=".$id_examen_etudiant." AND id_question=".$id_question." AND id_reponse=$id_reponse");
				if ($valeur_saisie=='Pas de réponses saisies'){
					$valeur=0;
				}
				else {
					$valeur=$valeur_saisie;
				}
				echo " <TD><input name='Apport".$i."' value='".$valeur."' style='text-align:center;' type='int'></TD> ";
				echo "</TR>";
				//récupération de la valeur kcal pour le premier aliment de ce repas
				echo"<INPUT TYPE='hidden' name='kcal".$i."' value='".$tab[$j][2]."'>";
				//récupération de la valeur qte pour le premier aliment de ce repas
				echo"<INPUT TYPE='hidden' name='qte".$i."' value='".$tab[$j][3]."'>";
			}
			else{//Verification dans la bdd que l'étudiant a toutes les bonnes réponses
				echo "<TD><center> - </center></TD>";
			}
			
        } 
		echo "</tbody>";
	}
	echo"</section>";
	echo"</table>";

	echo"<INPUT TYPE='hidden' name='jour' value='".$jour."'>";	
	echo "<br>";
	
	$nombre_tentative=rechdom ($link,'nombre_tentatives','question','id_question='.$id_question); //nombre de tentatives autorisées
	$num_tentative=rechdom ($link,'num_tentatives','reponse_etudiant','id_question='.$id_question.' AND id_examen_etudiant='.$id_examen_etudiant.' AND id_reponse='.$id_reponses[0][0]); //nombre de tentatives de l'étudiant
	$reponses_correctes=TRUE;
	for ($i=0;$i<$nb_repas;$i++){
		$id_reponse=$id_reponses[$i][0];
		$reponse_juste=rechdom($link,'reponse_juste','reponse_etudiant','id_question='.$id_question.' AND id_examen_etudiant='.$id_examen_etudiant.' AND id_reponse='.$id_reponse);
		if ($reponse_juste==0){
			$reponses_correctes=FALSE;
		}
	}
	//AFFICHAGE DU BOUTON VALIDER SI LE NOMBRE DE TENTATIVE N'EST PAS DEPASSE ET QUE L'ETUDIANT N'A PAS TROUVE LES BONNES REPONSES
	if ($num_tentative<$nombre_tentative AND $reponses_correctes==FALSE){
		echo"<center> <INPUT TYPE='SUBMIT' name='Valider' value='Valider le tableau'></center>";
	}
	//SINON MESSAGE pour expliquer pq le bouton ne s'affiche plus
	elseif ($reponses_correctes==FALSE){
		echo"<div class='alert alert-danger mx-4' role='alert'>";
		echo "<center>Vous avez utilisé toutes vos tentatives.</center>";
		echo"</div>";
		echo "<br>Passez à la question suivante en cliquant sur question suivante en bas de la page.";
	}
	//MESSAGE BONNES REPONSES
	else {
		echo "<div class='alert alert-success' role='alert' id='' value=''>";
		echo "Bonnes réponses.";
		echo "</div>";
		echo "<br><center>Passez à la question suivante en cliquant sur question suivante en bas de la page.</center>";
	}
	
	echo"</FORM>";
	echo"</div>";
}
?>
<br><br>
<nav class="boutons text-center">
    <button type="button" class="btn btn-lg text-center btn-custom"> <a href="partie4-1b.php"> Question suivante </a></button>
</nav>
<br>
<?php
//Pied de page
include("PiedDePageTD.html");
?>
  
</body>
</html>
