<html>
<head>
	<!-- informations sur le type et la version du fichier hltm et informations diverses à destination notament des robos -->
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css.css" />
</head>

<body>
<?php include "../interface/fonctions/connexion_BDD.php"; ?>


<?php

//Cette section permet de mettre à jour les données dans la base de donnée
//Elle s'exécute seulement si le bouton submit du premier cadre est cliqué

if(isset($_GET["test"])){  //Condition sur l'existence du bouton submit

	$cat=$_GET["categorie"]; 	//on récupère la catégorie de la question qui a été transmise par le bouton submit
	$quest_selec=$_GET['caché']; //on récupère le numero de la question transmis par le bouton submit
	$SQL_id_cat="SELECT id_categorie FROM categorie WHERE categorie.lib_categorie='$cat'";  //requète SQL pour récupérer id_catégorie correspondant a la catégorie de la question à modifier
	$typeques=$_GET["typequestion"]; //on récupère le type de la question transmis par le bouton submit
	$SQL_id_type_question="SELECT id_type_question FROM type_question WHERE type_question='$typeques'"; //requète SQL pour récupérer type_question correspondant a la question à modifier

	$result_cat= mysqli_query($link, $SQL_id_cat); //envois de la requete au serveur
	$tab_cat= mysqli_fetch_all($result_cat);  //Mise en forme tableau du résultat
	$val_id_cat=$tab_cat[0][0]; //on récupère la valeur dans une variable

	$result_type= mysqli_query($link, $SQL_id_type_question); //envois de la requete au serveur
	$tab_type= mysqli_fetch_all($result_type);  //Mise en forme tableau du résultat
	$val_id_type=$tab_type[0][0]; //on récupère la valeur dans une variable

	$queryinput="UPDATE question SET id_type_question='$val_id_type' WHERE numero_question='$quest_selec'";
	$queryinput2="UPDATE question SET id_categorie= '$val_id_cat' WHERE numero_question='$quest_selec'";

	$envois= mysqli_query($link, $queryinput);
	$envois2=mysqli_query($link, $queryinput2);
}?>


<?php

//Sébastien
//NAVIGATION QUESTION
// on selectionne le texte de toutes les questions et on les met dans un tableau 
	$query_liste= "SELECT numero_question FROM question";
	$result_liste= mysqli_query($link, $query_liste);
	$tab_liste= mysqli_fetch_all($result_liste);


	// on compte le nombre de question dans la table
	$query_n= "SELECT COUNT(numero_question) FROM question";
	$result_n= mysqli_query($link, $query_n);
	$tab_n= mysqli_fetch_all($result_n);


	// on créé autant de bouton qu'il y a de question en leur donnant le nom de la question à laquelle ils correspondent

	for($i=0 ; $i<$tab_n[0][0] ; $i=$i+1){
		echo '<form method="GET" action="Page test.php">' ;
			echo '<input type="hidden" question_selec="'.$tab_liste[$i][0].'"> ' ;
			echo '<input type="submit" name="bouton1" value="'.$tab_liste[$i][0].'" >' ;
		echo '</form>' ;
	}

 ?>

 <!--PREMIER CADRE-->


<?php if(isset($_GET['bouton1'])){ ?>

<form action="Page test.php" name= "premier cadre" method= "GET" >
<?php $val=$_GET['bouton1']; ?>

Identifiant :

<?php $query= "SELECT id_question FROM question WHERE numero_question='$val'";

	$result= mysqli_query($link, $query);
	$tab= mysqli_fetch_all($result);
	$nbligne = mysqli_num_rows($result);
	$nbcol = mysqli_num_fields($result) ;
	$i=0;
	while ($i< $nbligne)         {
	$j=0;
	while ($j< $nbcol)         {
	echo $tab[$i][$j];
	$j++;         }
	$i++;
	}
?>
	 <br><br>



Catégorie:

<?php	// Requète SQL pour récupérer toutes les catégories existantes dans une liste //
	$nom_quest=$_GET["bouton1"]; //on recupère la valeur de bouton 1 (question que l'on veut modifier)//
	$query2="	SELECT categorie.lib_categorie, question.id_categorie, categorie.id_categorie, question.numero_question
				FROM categorie, question
				WHERE question.numero_question='$nom_quest'
				AND question.id_categorie= categorie.id_categorie"; //on fait une requête SQL pour récupérer le nom de la ctégorie correspondant à la question choisi//
	$result2= mysqli_query($link, $query2);
	$tab_categorie_question_selec= mysqli_fetch_all($result2); //résultat de la première requête sous forme de tableau
	$query3="SELECT COUNT(*) FROM categorie"; //on compte le nb de catégories existantes //
	$result3= mysqli_query($link, $query3);
	$tab_nb_categories= mysqli_fetch_all($result3); //résultat de la seconde requête
	$query4="SELECT lib_categorie FROM categorie"; //on récupère toute les catégories existantes dans la table catégorie//
	$result4= mysqli_query($link, $query4);
	$tab_toutes_categories= mysqli_fetch_all($result4);
	$categorie_question_selec=$tab_categorie_question_selec[0][0];
	$nb_categorie=$tab_nb_categories[0][0]; ?>
<select name="categorie">
	<?php for	($i=0; $i<$nb_categorie; $i=$i+1){
		if ($categorie_question_selec==$tab_toutes_categories[$i][0]){
			echo '<option value="'.$tab_toutes_categories[$i][0].'" selected>'.$categorie_question_selec.'</option>' ;
		}
		else{
			echo '<option value="'.$tab_toutes_categories[$i][0].'"> '.$tab_toutes_categories[$i][0].' </option>' ;
		}

	} ?>
</select>

<?php /* echo $value=$_GET["bouton1"];
			echo "<FORM name='form_observateur' method='GET'>";

			// Bouton pour ajouter une catégorie
			echo "<br>";
			echo " <input type='hidden' bouton1='".$value."'>";
			echo "<INPUT type='submit' value='+' name='bt_ajouter_categorie'>";
			//Formulaire d'ajout
			if(isset($_GET["bt_ajouter_categorie"])){
				echo "<FORM name='form_observateur' method='GET'>";
				Echo '<input type="text" name="nouv_categorie" size="30" value="Entrer une nouvelle catégorie..">';
				echo "<INPUT type='submit' value='Valider' name='bt_valider_nouv_categorie'>";
				echo "</form>";
				if(isset($_GET["bt_valider_nouv_categorie"])){
					$nouvelle_categorie=$_GET["nouv_categorie"];
				}
			}
			echo "</FORM>";
	 */
?>
<br><br>

<?php // TYPE DE QUESTION

echo "Type de question :";
echo "<br>";

	$query2bis="SELECT question.id_type_question, type_question.id_type_question, question.numero_question,type_question.type_question
			FROM type_question, question
			WHERE question.id_type_question= type_question.id_type_question
			AND question.numero_question='$nom_quest' ";

	$result2bis= mysqli_query($link, $query2bis);
	$tab2bis= mysqli_fetch_all($result2bis);

	$query3bis="SELECT COUNT(*) FROM type_question";
	$result3bis= mysqli_query($link, $query3bis);
	$tab3bis= mysqli_fetch_all($result3bis);


	$query4bis="SELECT type_question FROM type_question";
	$result4bis= mysqli_query($link, $query4bis);
	$tab4bis= mysqli_fetch_all($result4bis);


	$type_question_selec_bis=$tab2bis[0][3];
	$nb_catégorie_bis=$tab3bis[0][0];
	echo '<select name="typequestion">' ;
	for	($i=0; $i<$nb_catégorie_bis; $i=$i+1){
		if ($type_question_selec_bis==$tab4bis[$i][0]){
			echo '<option value="'.$tab4bis[$i][0].'" selected>'.$type_question_selec_bis.'</option>' ;
		}
		else{
			echo '<option value="'.$tab4bis[$i][0].'"> '.$tab4bis[$i][0].' </option>' ;
		}
	}

	echo '</select>';
	echo "<input type='hidden' name='caché' value='".$_GET['bouton1']."'>" ;
	echo "<input type='submit' name= 'test' value='valider' >";
	echo "</form>";


//DEUXIEME CADRE

		//Code nom question

$val=$_GET['bouton1'];
$query5= "SELECT nom_question FROM question WHERE numero_question='$val'";
			$result5= mysqli_query($link, $query5);
			$tab5= mysqli_fetch_all($result5);

    echo'<form method="Post" action="autrefichier.php">';
      echo "Nom de la question : ";
        echo '<input type="text" name="nom" size="100" value="'.$tab5[0][0].'"> <br>' ;
    echo "</form>";


//Code consigne de la question

$val=$_GET['bouton1'];
$query6= "SELECT consigne_question FROM question WHERE numero_question='$val'";
			$result6= mysqli_query($link, $query6);
			$tab6= mysqli_fetch_all($result6);


    echo '<form method="Post" action="autrefichier.php">';
      echo 'Consigne de la question :';
       echo '<input type="text" name="nom" size="100" value="'.$tab6[0][0].'"> <br>';
    echo "</form>";


//Code insérez un lien

$val=$_GET['bouton1'];
$query7= "SELECT lien FROM question WHERE numero_question='$val'";
			$result7= mysqli_query($link, $query7);
			$tab7= mysqli_fetch_all($result7);


    echo '<form method="Post" action="autrefichier.php">';
    echo 'Insérez un lien :';
     echo   '<input type="text" name="nom" size="100" value="'.$tab7[0][0].'"> <br>';
    echo '</form>';



//Code intitulé de la question

$val=$_GET['bouton1'];
$query8= "SELECT cplmt FROM question WHERE numero_question='$val'";
			$result8= mysqli_query($link, $query8);
			$tab8= mysqli_fetch_all($result8);


    echo '<form method="Post" action="autrefichier.php">';
    echo   'Intitulé de la question :';
        echo '<input type="text" name="nom" size="100" value="'.$tab8[0][0].'"> <br>';
    echo '</form>';





	echo "Insérer un tableau: ";
	echo "<br>";

	// affichage du nombre de colonne du tableau sous forme de liste déroulante
	echo "Nombre de colonnes:";

	// Récupération de la valeur de la question sélectionnée
	$nom_quest=$_GET["bouton1"];

	// Requête pour afficher le nb de colonnes du tableau de la question sélectionnée
	$querycolonnes2="SELECT question.nb_colonnes,question.numero_question
	FROM question
	WHERE question.numero_question='$nom_quest'";
	$resultcolonnes2= mysqli_query($link, $querycolonnes2);
	$tabcolonnes2= mysqli_fetch_all($resultcolonnes2);
	$nb_colonnes_selec= array('0','1','2','3','4','5','6');
	echo '<select name="colonne">' ;
	for	($i=0; $i<count($nb_colonnes_selec) ; $i=$i+1){
		if ($nb_colonnes_selec[$i][0]==$tabcolonnes2[0][0]){
			echo '<option value="'.$tabcolonnes2[$i][0].'" selected>'.$tabcolonnes2[$i][0].'</option>' ;
		}
		else{
			echo '<option value="'.$nb_colonnes_selec[$i][0].'"> '.$nb_colonnes_selec[$i][0].' </option>' ;
			// La liste déroulante contient les différents nb de colonnes différents
			// Le nb de colonnes de la question sélectionnée est affiché
		}
	}

	// Affichage du nombre de ligne du tableau sous forme de liste déroulante
	echo "<br>";
	echo "Nombre de lignes:";

	// Récupération de la valeur de la question sélectionnée
	$nom_quest=$_GET["bouton1"];

	// Requête pour afficher le nb de lignes du tableau de la question sélectionnée
	$querylignes2="SELECT question.nb_lignes
	FROM question
	WHERE question.numero_question='$nom_quest'";
	$resultlignes2= mysqli_query($link, $querylignes2);
	$tablignes2= mysqli_fetch_all($resultlignes2);

	// Requête pour compter le nombre de tableaux
	$querylignes3="SELECT COUNT(nb_lignes)
	FROM question";
	$resultlignes3= mysqli_query($link, $querylignes3);
	$tablignes3= mysqli_fetch_all($resultlignes3);

	// Requête pour afficher les différents nb de lignes différents dans la liste déroulante
	$querylignes4="SELECT nb_lignes
	FROM question";
	$resultlignes4= mysqli_query($link, $querylignes4);
	$tablignes4= mysqli_fetch_all($resultlignes4);
	$nb_lignes_selec=$tablignes2[0][0];
	$nb_tot_lignes=$tablignes3[0][0];
	echo '<select name="ligne">' ;
	for	($i=0; $i<$nb_tot_lignes; $i=$i+1){
		if ($nb_lignes_selec==$tablignes4[$i][0]){
			echo '<option value="'.$tablignes4[$i][0].'" selected>'.$nb_lignes_selec.'</option>' ;
		}
		else{
			echo '<option value="'.$tablignes4[$i][0].'"> '.$tablignes4[$i][0].' </option>' ;
			// La liste déroulante contient les différents nb de lignes différents
			// Le nb de lignes de la question sélectionnée est affiché
		}
	}


}
		?>

</body>
</html>
