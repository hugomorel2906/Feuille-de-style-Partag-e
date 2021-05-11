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
 
if(isset($_POST["test"])){  //Condition sur l'existence du bouton submit 
	
	$cat=$_POST["categorie"]; 	//on récupère la catégorie de la question qui a été transmise par le bouton submit
	$id_selec=$_POST['bouton1']; //on récupère le numero de la question transmis par le bouton submit
	$SQL_id_cat="SELECT id_categorie FROM categorie WHERE categorie.lib_categorie='$cat'";  //requète SQL pour récupérer id_catégorie correspondant a la catégorie de la question à modifier 
	$typeques=$_POST["typequestion"]; //on récupère le type de la question transmis par le bouton submit
	$SQL_id_type_question="SELECT id_type_question FROM type_question WHERE type_question='$typeques'"; //requète SQL pour récupérer type_question correspondant a la question à modifier 

	$result_cat= mysqli_query($link, $SQL_id_cat); //envois de la requete au serveur 
	$tab_cat= mysqli_fetch_all($result_cat);  //Mise en forme tableau du résultat
	$val_id_cat=$tab_cat[0][0]; //on récupère la valeur dans une variable 
	
	$result_type= mysqli_query($link, $SQL_id_type_question); //envois de la requete au serveur 
	$tab_type= mysqli_fetch_all($result_type);  //Mise en forme tableau du résultat
	$val_id_type=$tab_type[0][0]; //on récupère la valeur dans une variable 

	$queryinput="UPDATE question SET id_type_question='$val_id_type' WHERE id_question='$id_selec'"; // requete de MAJ du type de question en fonction du numéro de la question "Question 1"
	$queryinput2="UPDATE question SET id_categorie= '$val_id_cat' WHERE id_question='$id_selec'";// requete de MAJ de la catégorie d'une question en fonction du numéro de la question "Question 1"
 
	
	// envois des MAJ à la base de données 
	$envois= mysqli_query($link, $queryinput);
	$envois2=mysqli_query($link, $queryinput2);
}?>

 
<?php
// IFISSET BOUTON 2 POUR OUVRIR LE CADRE ETIQUETTE

if(isset($_POST["cadre2"])|| isset($_POST['adddiv']) || isset($_POST['adddiv2'])){  //Condition sur l'existence du bouton submit 
	$bouton=$_POST['bouton1']; // on récupère le nom de la quetion "Question 1"
	$nom_quest_modif=$_POST["nom_question"]; 	//on récupère le nom de la question modifiée qui a été transmis par le bouton submit
	$tentative_modif=$_POST['tentatives']; // on récupère le nombre de tentative transmis par le bouton submit 
	$consigne_modif=$_POST['consigne']; // on récupère les consigne  transmis par le bouton submit 
	$lien_modif=$_POST['lien']; // on récupère le lien  transmis par le bouton submit 
	$intitule_modif=$_POST['intitule']; // on récupère l'intitulé  transmis par le bouton submit 
	$colonne_modif=$_POST['colonne']; // on récupère le nombre de colonnes  transmis par le bouton submit 
	$ligne_modif=$_POST['ligne']; //on récupère le nombre de lignes  transmis par le bouton submit
	
	// requète qui permet de MAJ la question selectionné avec les paramètre modifié qui sont récupéré au-dessus
	$queryinput3="UPDATE question SET numero_question='$nom_quest_modif', 
	nombre_tentatives='$tentative_modif', consigne_question='$consigne_modif',
	lien='$lien_modif' , cplmt='$intitule_modif', nb_colonnes='$colonne_modif', nb_lignes='$ligne_modif' WHERE id_question='$bouton'";
	
	// envoie des modifications à la BDD
	$envois3= mysqli_query($link, $queryinput3);}

// IFISSET BOUTON POUR CREER UNE NOUVELLE CATEGORIE 
 if(isset($_POST["bt_valider_nouv_categorie"])){
                
                $value=$_POST["bouton1"]; // on récupère le numéro de la question 
				$nouvelle_categorie=$_POST["nouv_categorie"]; // on récupère le nom de la nouvelle catégorie 
                $querynew="INSERT INTO categorie (lib_categorie) VALUES ('".$nouvelle_categorie."')"; // requete d'ajout de la nouvelle categorie dans la BDD
                $envoisnew= mysqli_query($link, $querynew); // envoie de la nouvelle categorie à la bdd 
                $querymaj="UPDATE categorie SET categorie.lib_categorie='".$nouvelle_categorie."' WHERE categorie.id_question='$value'";// requete de MAJ de la catégorie avec son nouveau nom
                $envoismaj= mysqli_query($link, $querymaj);// envois de la MAJ à la BDD
}

// INSERT DES NOUVELLES ETIQUETTES 

if(isset($_POST['cadre2'])){
$new_etiq= $_POST['nb_etiq_rep']; 

$value=$_POST["bouton1"]; // on récupère le numéro de la question 

$query888="SELECT COUNT(*) FROM etiquette_prof WHERE id_question=$value" ;
$resultat888= mysqli_query($link,$query888);
$tab888= mysqli_fetch_all($resultat888);
$count888=$tab888[0][0];
$diff=$new_etiq-$count888;
 

for($i=0; $i<$diff; $i++){
$nouvelle_etiq="INSERT INTO etiquette_prof (id_question,ponderation_etiquette,contenu_etiquette,etat_etiquette, aide) VALUES ('$value', '15','Réponse', '1', '' )"; 
$resultat=mysqli_query($link, $nouvelle_etiq);
}

$SQL_reonse="SELECT reonse_question FROM question WHERE id_question=$value";
$envois_reonse= mysqli_query($link, $SQL_reonse); 
$tab_reonse=mysqli_fetch_all($envois_reonse); 
$pieces = explode(" / ", $tab_reonse[0][0]);
$nb_segment= count($pieces); 

$liste_etiquette_juste = "SELECT * FROM etiquette_prof WHERE etiquette_prof.id_question= $value AND etat_etiquette=1"; 
$result_liste_juste= mysqli_query($link, $liste_etiquette_juste) ; 
$tab_liste_juste=mysqli_fetch_all($result_liste_juste) ; 
echo $count888 ; 
echo $nb_segment ;
if( $count888==0){

$j=0 ;
for($k=0 ; $k<$nb_segment ;$k++){
    if($pieces[$k]=="etiquette"){
        $pieces[$k] = "etiquette ".$tab_liste_juste[$j][0]; 
        $j++; 
    }
}
$reonse = implode(" ", $pieces) ; 
$querymaj_reonse="UPDATE question SET reonse_question='$reonse' WHERE id_question= '$value' ";// requete de MAJ de la catégorie avec son nouveau nom
$envoismaj_reonse=mysqli_query($link,$querymaj_reonse) ;


}else {

	$j=$count888 ;
for($k=0 ; $k<$nb_segment ;$k++){
    if($pieces[$k]=="etiquette"){
        $pieces[$k] = "etiquette ".$tab_liste_juste[$j][0]; 
        $j++; 
    }
}
$reonse = implode(" ", $pieces) ; 
$querymaj_reonse="UPDATE question SET reonse_question='$reonse' WHERE id_question= '$value' ";// requete de MAJ de la catégorie avec son nouveau nom
$envoismaj_reonse=mysqli_query($link,$querymaj_reonse) ;

}
}


//BOUTON SUPPRIMER LA REONSE ET LES ETIUQETTE ASSOCIER 


if(isset($_POST['suppr_etiquette_rep'])){
	
	$value=$_POST["bouton1"]; // on récupère le numéro de la question 
	
	$query_suppr_all="DELETE FROM `etiquette_prof`
	WHERE `id_question` = $value " ; 
	$envois_suppr_all=mysqli_query($link, $query_suppr_all) ; 
	
	$query_suppr_reonse=" UPDATE question SET reonse_question='' WHERE id_question=$value" ;
	$result_reonse=mysqli_query($link,$query_suppr_reonse);
	}


// BOUTON AJOUT ETIQUETTE FAUSSE
// on regarde si on a cliqué sur le bouton 
if(isset($_POST['etiquette_+_fausse']) /*or $_POST['exist_etiq']==0*/ ){

$val=$_POST['bouton1']; // on récupère le numéro de la question 

$querynewetiquettef="INSERT INTO etiquette_prof (	
id_question,
ponderation_etiquette,
contenu_etiquette,
etat_etiquette,
aide) VALUES ('$val','1','nouvelle etiquette fausse','0','')"; // requete pour créer une etiquette fausse pour la question selectionnee 
                $envoisnewq= mysqli_query($link, $querynewetiquettef); // envois de la requete a la bdd
  
}


// BOUTON SUPPRIMER UNE ETIQUETTE FAUSSE

if (isset($_POST['nombre_etiq_faus'])) {
for	($i=0; $i<$_POST['nombre_etiq_faus']; $i=$i+1){
if(isset($_POST['etiquette_-_fausse'.$i.''])){
	$val=$_POST['bouton1'];
	 // on récupère le numéro de la question 

echo"<br>";
$query_etiq_fausse= "SELECT etiquette_prof.id_etiquette_prof,etiquette_prof.contenu_etiquette /* on selectionne l'id de toutes les itequette fausse correspondant à la question sélectionné*/ 
					 FROM etiquette_prof,question 
					 WHERE  etiquette_prof.id_question='$val' AND etat_etiquette=0 ";
$result_etique_fausse=mysqli_query($link,$query_etiq_fausse);
$tab_etique_fausse=mysqli_fetch_all($result_etique_fausse);
$etiq_supr=$tab_etique_fausse[$i][0];
echo"nb etiquette fausses: ";
echo $_POST['nombre_etiq_faus'];
echo"<br>";
echo"num de l'etiquette suppr: ";
echo $etiq_supr;

$querysuppretiq="DELETE FROM etiquette_prof
             WHERE id_question='$val' AND id_etiquette_prof='$etiq_supr' AND etat_etiquette='0'"; // on supprime le la dernière etiquette fausse pour la question selectionnee 
echo"<br>";
echo $querysuppretiq;
$envoissuppretiq= mysqli_query($link, $querysuppretiq);
	} // envois de la requete à la bdd 
				

}
}


// BOUTON ENREGISTRER FIN 				
// l'enregistrement des etiquette fausse 

   

if(isset($_POST["enregistre"]) || isset($_POST['etiquette_+_fausse']) ){  //Condition sur l'existence du bouton submit 
	$n_etiquette_fausses=$_POST["nb_réponse_fausse"];  // on récupère le nombre  de fausse de réponse 
	$id_etiquette=$_POST['id_etiquette_cache']; // on récupre l'id de l'étiquette selectionnée (c'est l'id de l'etiquette juste)
    $id_quest_modif2=$_POST['bouton1'];     //on récupère le nom de la question modifiée qui a été transmis par le bouton submit
    $pourcentge=$_POST['pourcentage']; // on récupère la pondération de l'étiquette juste 
    $etiq_juste_modif=$_POST['reponse']; // on récupère l'intitulé de l'étiquette juste 
    $info_bullr_modif=$_POST['nom_info_bulle'];// on récupère l'infobulle pour une réponse juste 
	 if ($n_etiquette_fausses!='0'){ // on vérifie l'existance d'étiuett fausse 
		$queryinput4="UPDATE etiquette_prof,question SET ponderation_etiquette='$pourcentge', contenu_etiquette='$etiq_juste_modif', aide='$info_bullr_modif'
     WHERE etiquette_prof.id_question=question.id_question AND question.id_question='$id_quest_modif2'AND id_etiquette_prof='$id_etiquette' AND etat_etiquette=TRUE "; // requete de MAJ des informations d'une etiquette juste 


// il faut l'id question / l'id etiqutte fausse 
		for ($i=0; $i<$n_etiquette_fausses; $i++){ 
			$num_etiquette="reponse_vrai_".$i ; 
			$id_etiq_fa="id_etiqette_fausse_".$i ;  
			$etiq_fausse_modif=$_POST[$num_etiquette];// on récupère le contenu de l'etiquette fausse 
			$id_eti_f=$_POST[$id_etiq_fa]; // on récupere l'id de l'etiquette fausse 
    		$queryinput5="UPDATE etiquette_prof,question SET contenu_etiquette='$etiq_fausse_modif'
   			WHERE etiquette_prof.id_question=question.id_question AND question.id_question='$id_quest_modif2'AND etiquette_prof.id_etiquette_prof='$id_eti_f' AND etiquette_prof.etat_etiquette=FALSE"; // requete de MAJ de l'etiquette fausse ==> ne fonctionne pas pour l'instant 
			$envois4= mysqli_query($link, $queryinput4); // envois de la requete de MAJ de l'etiquette juste 
			$envois5= mysqli_query($link, $queryinput5); // envois de la requete de MAJ de l'etiquette fausse 
		}
	 }
    else {		// s'il n'y a pas d'etiquette fausse alors on MAJ que les etiquette juste 
	$queryinput4="UPDATE etiquette_prof,question SET ponderation_etiquette='$pourcentge', contenu_etiquette='$etiq_juste_modif', aide='$info_bullr_modif'
     WHERE etiquette_prof.id_question=question.id_question AND question.id_question='$id_quest_modif2'AND id_etiquette_prof='$id_etiquette' AND etat_etiquette=TRUE ";// requete de MAJ des informations d'une etiquette juste 
	$envois4= mysqli_query($link, $queryinput4); // envois de la requete de MAJ de l'etiquette juste 
	}
	}
  /*   $queryinput3="UPDATE etiquette_prof,question SET ponderation_etiquette='$pourcentge', contenu_etiquette='$etiq_juste_modif', aide_bon='$info_bullr_modif',aide_mauvais='$info_bullech'
     WHERE etiquette_prof.id_question=question.id_question AND question.numero_question='$nom_quest_modif2'AND id_etiquette_prof='$id_etiquette' AND etat_etiquette=TRUE "/
 */

// BOUTON AJOUTER UNE QUESTION 

// on vérifie si on a appuyer sur le bouton ajouter une question 
if(isset($_POST["bt_ajouter_question"])){
       
                $querynewq="INSERT INTO question
                 (id_page,id_type_question,id_categorie,numero_question,consigne_question,note_question,nombre_tentatives,nb_colonnes,nb_lignes,lien,nom_question,cplmt,reonse_question) VALUES ('1','1','1','QUESTION', '0', '10', '1', '0', '0', '0', '','','')";
                $envoisnewq= mysqli_query($link,$querynewq);
                }
// on verifie si on a appuyr sur le bouton supprimer 
if(isset($_POST["bt_supprimer_question"])){
                $val=$_POST['bouton1']; // on récupère le numéro de la question 
                
                $querysuppr="DELETE FROM question WHERE id_question='".$val."'"; // requete qui permet de supprimer la question selon son id 
                $envoissuppr= mysqli_query($link, $querysuppr); // envois de la requete à la bdd 
                
			$query_replace = "SELECT min(id_question) FROM question" ; 
			$envois_replace=mysqli_query($link, $query_replace) ; 
			$tab_replace=mysqli_fetch_all($envois_replace) ; 
			echo "<input type='hidden' name='bouton1' value='".$tab_replace[0][0]."'>" ; 
			}
			
// REQUETE POUR AJOUTER NOM ET CHEMIN D'UNE NOUVELLE IMAGE 
// le update ne se fait pas quand on appuie sur envoyer 


if(isset($_POST["image"]) and isset($_POST["nom_photo"])){
	$val=$_POST["bouton1"];

	$nom_image=$_POST["nom_photo"];
	$query_ajout_image="INSERT INTO Image ( id_question, chemin_acces, nom_image) 
						VALUES ( '$val', 'C:\\laragon\\www\\interface', '$nom_image')";
	$envoi_image=mysqli_query($link, $query_ajout_image);

	echo $query_ajout_image;}

// BOUTON SUPPRESSION  DE L'IMAGE
if(isset($_POST['nb_im'])){
	$nombre_im=$_POST['nb_im'];

	for($i=0;$i<$nombre_im;$i++){
		if(isset($_POST['image_supr'.$i.''])) {
		$val=$_POST["bouton1"];

	$id_im_supr=$_POST['id_image_supprime'.$i.''];
    
	$query_supr_im="DELETE FROM image WHERE image.id_question='$val' AND id_image='$id_im_supr'";
	$envoi_suppression_image=mysqli_query($link, $query_supr_im);

	echo $query_supr_im;
}

}
}



?> 

<?php

//Sébastien 
//NAVIGATION QUESTION
// on selectionne le texte de toutes les questions et on les met dans un tableau
/*	$value=$_POST['bouton1'];
	$query_id_question= "SELECT id_question FROM question WHERE numero_question='$value'";
	$result_id_question= mysqli_query($link, $query_id_question);
	$tab_id_question= mysqli_fetch_all($result_id_question);

	$ide_ques=$tab_id_question[0][0];

	$query_n_etiquette= "SELECT count(etiquette_prof.id_question) FROM etiquette_prof, question WHERE etiquette_prof.id_question=question.id_question AND  etiquette_prof.id_question=$ide_ques AND etiquette_prof.etat_etiquette=1";
	$result_n_etiquette= mysqli_query($link, $query_n_etiquette);
	$tab_n_etiquette= mysqli_fetch_all($result_n_etiquette);  
	$nombre_etiq_exist=$tab_n_etiquette[0][0];
	*/

	$query_liste= "SELECT numero_question, id_question FROM question"; // requete qui recupere tout les numeros de toutes les questions 
	$result_liste= mysqli_query($link, $query_liste);
	$tab_liste= mysqli_fetch_all($result_liste);  


	// on compte le nombre de question dans la table
	$query_n= "SELECT COUNT(numero_question) FROM question"; // requete qui compte le nombre de question 
	$result_n= mysqli_query($link, $query_n);
	$tab_n= mysqli_fetch_all($result_n);  // on stock le nombre de question 
	

	// on créé autant de bouton qu'il y a de question en leur donnant le nom de la question à laquelle ils correspondent 

	for($i=0 ; $i<$tab_n[0][0] ; $i=$i+1){ // boucle for qui permet de créer autant de bouton question qu'il y en a dans la bdd 
		echo '<form method="POST" action="Page test.php">' ;
			echo '<input type="hidden" name="bouton1" value="'.$tab_liste[$i][1].'"> ' ;
			//echo '<input type="hidden" exist_etiq="'.$nombre_etiq_exist.'"> ' ;
			echo '<input type="submit" name="bouton" value="'.$tab_liste[$i][0].'" >' ;
		echo '</form>' ;
	}
	
$val=$_POST['bouton1'];
// formulaire pour créer le bouton + pour créer une question et le bouton supprimer une question 
 echo '<form action="Page test.php" name="newquest" method="POST">';
 echo "<INPUT type='submit' name='bt_ajouter_question' value='+' >";
 echo"<input type='hidden' name='bouton1' value='".$val."'>";
 echo"</form>";
 echo '<form action="Page test.php" name="suprquest" method="POST">';
 echo"<input type='hidden' name='bouton1' value='".$val."'>";
 echo "<INPUT type='submit' value='Supprimer' name='bt_supprimer_question'>";
 
 echo"</form>";
 //$val=$_POST['bouton1'];

 ?>
 <br><br>
 <!--PREMIER CADRE-->
 
 
<?php 

// on regarde si on a cliqué sur une question 
if(isset($_POST['bouton1'])){ 
	
$val=$_POST['bouton1'] ; 
$query_tout_id="SELECT id_question FROM question" ; 
$envois_tout_id=mysqli_query($link, $query_tout_id) ; 
$tab_tout_id=mysqli_fetch_all($envois_tout_id) ; 
$nb_id=count($tab_tout_id) ; 


	if (isset($_POST['bt_supprimer_question'])){
		echo "rieng" ; 
	
	}
	else{

?>


<!-- cration du formulaire pour le premier cadre de la page avec la categorie le type de question et les info dans la question  -->

<form action="Page test.php" name= "premier cadre" method= "POST" >
<?php $val=$_POST['bouton1']; ?>

Identifiant : 

<?php 

	echo $val ; 
?>
	 <br><br>



Catégorie:

<?php	// Requète SQL pour récupérer toutes les catégories existantes dans une liste //
	$id_quest=$_POST["bouton1"]; //on recupère la valeur de bouton 1 (question que l'on veut modifier)//
	$query2="	SELECT categorie.lib_categorie, question.id_categorie, categorie.id_categorie, question.numero_question 
				FROM categorie, question 
				WHERE question.id_question='$id_quest' 
				AND question.id_categorie= categorie.id_categorie"; //on fait une requête SQL pour récupérer le nom de la ctégorie correspondant à la question choisi//
	$result2= mysqli_query($link, $query2);
	$tab_categorie_question_selec= mysqli_fetch_all($result2); //résultat de la première requête sous forme de tableau 
	
	
	$query3="SELECT COUNT(*) FROM categorie"; //on compte le nb de catégories existantes // 
	$result3= mysqli_query($link, $query3);
	$tab_nb_categories= mysqli_fetch_all($result3); //résultat de la seconde requête 
	
	
	$query4="SELECT lib_categorie FROM categorie"; //on récupère toute les catégories existantes dans la table catégorie//
	$result4= mysqli_query($link, $query4);
	$tab_toutes_categories= mysqli_fetch_all($result4);
	$categorie_question_selec=$tab_categorie_question_selec[0][0]; // on stock le libelle de la categorie dans une variable 
	$nb_categorie=$tab_nb_categories[0][0];// on stock le nombre de catégorie dans  une variable  ?>
<select name="categorie">
	<?php for    ($i=0; $i<$nb_categorie; $i=$i+1){ // boucle for qui permet de MAJ la liste déroulante des catégories et d'afficher la catégorie pour la question selectionnée 
        if(isset($_POST["bt_valider_nouv_categorie"])){ // si on créer une nouvelle catégorie 
              if ($nouvelle_categorie==$tab_toutes_categories[$i][0]){ // si la nouvelle catégorie correspond une categorie 
            echo '<option value="'.$tab_toutes_categories[$i][0].'" selected>'.$nouvelle_categorie.'</option>' ; // la catégorie est  créée et selectionnée 
        }
        else{
            echo '<option value="'.$tab_toutes_categories[$i][0].'"> '.$tab_toutes_categories[$i][0].' </option>' ;
        }
        }
        else { // si on ne créé pas un catégorie 
        if ($categorie_question_selec==$tab_toutes_categories[$i][0]){ //et que la catégorie de la question selectionnée correspond a un catégorie dans la liste 
            echo '<option value="'.$tab_toutes_categories[$i][0].'" selected>'.$categorie_question_selec.'</option>' ; // on affiche la catégorie selectionnnée
        }
        else{
            echo '<option value="'.$tab_toutes_categories[$i][0].'"> '.$tab_toutes_categories[$i][0].' </option>' ; 
        }
        }
        } ?>
</select>

<?php

//BOUTON AJOUT CATEGORIE

echo "<FORM name='form_observateur' method='POST'>"; // création du formulaire pour le bouton d'ajout de catégorie 
            $value=$_POST["bouton1"]; // on récupère le numero de la question 
            // Bouton pour ajouter une catégorie
            echo "<br>";
            echo " <input type='hidden' bouton1='".$value."'>";
            echo "<INPUT type='submit' value='+' name='bt_ajouter_categorie'>";
            //echo "</FORM>";
            //Formulaire d'ajout
            if(isset($_POST["bt_ajouter_categorie"])){
                //echo "<FORM name='form_observateur' method='POST'>";
                Echo '<input type="text" name="nouv_categorie" size="30" value="Entrer une nouvelle catégorie..">';
                echo '<input type="hidden" name="bouton1" value="'.$value.'" >' ;
                echo '<INPUT type="submit" value="Valider" name="bt_valider_nouv_categorie">';

                /* if(isset($_POST["bt_valider_nouv_categorie"])){
                $nouvelle_categorie=$_POST["nouv_categorie"];
                $querynew="INSERT INTO categorie (lib_categorie) VALUES ('".$nouvelle_categorie."')";
                $envoisnew= mysqli_query($link, $querynew);
                } */
                echo "</form>"; 
            }
           
?>
<br><br>	

<?php // TYPE DE QUESTION
if(isset($_POST['bouton1'])){
echo "Type de question :";
echo "<br>";

	$query2bis="SELECT question.id_type_question, type_question.id_type_question, question.numero_question,type_question.type_question
			FROM type_question, question 
			WHERE question.id_type_question= type_question.id_type_question
			AND question.id_question='$id_quest' ";

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
	echo "<input type='hidden' name='bouton1' value='".$_POST['bouton1']."'>" ;
	echo "<input type='submit' name= 'test' value='valider' >";
	echo "</form>"; 
	

//DEUXIEME CADRE

 echo'<br><br><form method="POST" action="Page test.php", enctype="multipart/form-data">';
		//Code nom question 
	
$val=$_POST['bouton1'];

$query5= "SELECT numero_question FROM question WHERE id_question='$val'";
			$result5= mysqli_query($link, $query5);
			$tab5= mysqli_fetch_all($result5);
	

      echo "Nom de la question : ";
        echo '<input type="text" name="nom_question" size="100" value="'.$tab5[0][0].'"> <br>' ;
  
	
	
//Code nombre de tentatives
// affichage du nombre de tentatives autorisées sous forme de liste déroulante
           
		   echo "Nombre de tentatives autorisées:";

            // Récupération de la valeur de la question sélectionnée
            $id_quest=$_POST["bouton1"]; 

            // Requête pour afficher le nombrede tentatives pour la question sélectionnée 
            $querytenta="SELECT question.nombre_tentatives,question.numero_question 
            FROM question 
            WHERE question.id_question='$id_quest'";
            $resulttenta= mysqli_query($link, $querytenta);
            $tabtenta= mysqli_fetch_all($resulttenta);
            $nb_tentatives_selec= array('0','1','2','3','4','5','6');
            echo '<select name="tentatives">' ;
            for    ($i=0; $i<count($nb_tentatives_selec) ; $i=$i+1){
                if ($nb_tentatives_selec[$i][0]==$tabtenta[0][0]){
                    echo '<option value="'.$nb_tentatives_selec[$i][0].'" selected>'.$nb_tentatives_selec[$i][0].'</option>' ; 
            }
                else{
                    echo '<option value="'.$nb_tentatives_selec[$i][0].'"> '.$nb_tentatives_selec[$i][0].' </option>' ;
			}}
            echo "</select><br>"; 
			
			// La liste déroulante contient les différents nombre de tentatives différents
            // Le nombre de tentatives de la question sélectionnée est affiché

			
//Code consigne de la question

$val=$_POST['bouton1'];
$query6= "SELECT consigne_question FROM question WHERE id_question='$val'";
			$result6= mysqli_query($link, $query6);
			$tab6= mysqli_fetch_all($result6);
	

   
      echo 'Consigne de la question :';
       echo '<input type="text" name="consigne" size="100" value="'.$tab6[0][0].'"> <br>';
   
// INSERER UNE IMAGE DE SES MORTS 


     $query_image= "SELECT image.id_question, chemin_acces,nom_image, id_image FROM image , question WHERE image.id_question=question.id_question AND image.id_question='$val'"; // on sélectionne les images correspondant a la question séléctionnée
     	$resultat_image=mysqli_query($link,$query_image);
     	$tab_image=mysqli_fetch_all($resultat_image);
     	$n_photo=count($tab_image);

   if($n_photo>0){ // si il y a des image pour cette question 
 echo'Image ' ;
 	echo'<input type="hidden" name="nb_im" value="'.$n_photo.'">';
   echo'<input type="file" name="photo" id="photo">';
    echo'<input type="submit" name="oui_image" value="ok">';
   echo'<input type="hidden" name="bouton1" value="'.$val.'">';
   echo"<br>";
   
   if (isset( $_POST['oui_image'])) {
   	echo"<br>";
   	echo'Pour ajouter la photo appuyez sur ENVOYER';
      $retour = copy($_FILES['photo']['tmp_name'], $_FILES['photo']['name']);
      $nom_Photo=$_FILES['photo']['name'];// j'arrive pas a récupéré cette valeur pour la requette d'upload ligne 240
        /* echo'<input type="hidden" name="chemin" value="'.$.'">';*/
      echo'<input type="hidden" name="nom_photo" value='.$nom_Photo.'>';
          echo"<br>";
             echo"<br>";

        if($retour and isset( $_POST['image'])) {
        echo'<input type="hidden" name="nom_photo" value='.$nom_Photo.'>'; // j'arrive pas a récupéré cette valeur pour la requette d'upload ligne 240
            echo '<p>La photo a bien été envoyée.</p>';
            /*echo '<img src="' . $_FILES['photo']['name'] . '">';*/
           
        }
    }
    if(isset($_POST['oui_image'])){
    echo'<input type="submit" name="image" value="Envoyer">';}
   echo"<br>";

   for($i=0;$i<$n_photo;$i++){
     echo 'Nom de l\'image : '.$tab_image[$i][2].'<br>
                <a href="' . $tab_image[$i][1] . '"><img src="' . $tab_image[$i][2] . '" height="500" width="500"  title="Cliquez pour agrandir"></a>
                <hr>';
   echo"  ";

   echo'<input type="hidden" name="id_image_supprime'.$i.'" value="'.$tab_image[$i][3].'">';
   echo'<input type="submit" name="image_supr'.$i.'" value="supr image">';
   }
  
   }else{

   	 echo'Image ' ;

   echo'<input type="file" name="photo" id="photo">';
    echo'<input type="submit" name="oui_image" value="ok">';
   echo'<input type="hidden" name="bouton1" value="'.$val.'">';
   echo"<br>";
   
   if (isset( $_POST['oui_image'])) {
   	echo"<br>";
   	echo'Pour ajouter la photo appuyez sur ENVOYER';
      $retour = copy($_FILES['photo']['tmp_name'], $_FILES['photo']['name']);
      $nom_Photo=$_FILES['photo']['name'];// j'arrive pas a récupéré cette valeur pour la requette d'upload ligne 240
        /* echo'<input type="hidden" name="chemin" value="'.$.'">';*/
      echo'<input type="hidden" name="nom_photo" value='.$nom_Photo.'>';
          echo"<br>";
             echo"<br>";

        if($retour and isset( $_POST['image'])) {
        echo'<input type="hidden" name="nom_photo" value='.$nom_Photo.'>'; // j'arrive pas a récupéré cette valeur pour la requette d'upload ligne 240
            echo '<p>La photo a bien été envoyée.</p>';
            /*echo '<img src="' . $_FILES['photo']['name'] . '">';*/
           
        }
    }
    if(isset($_POST['oui_image'])){
    echo'<input type="submit" name="image" value="Envoyer">';}
   echo"<br>";

   }
 
    
 echo"<br><br>";

//Code insérez un lien

$val=$_POST['bouton1'];
$query7= "SELECT lien FROM question WHERE id_question='$val'";
			$result7= mysqli_query($link, $query7);
			$tab7= mysqli_fetch_all($result7);
		


    echo 'Insérez un lien :';
     echo   '<input type="text" name="lien" size="100" value="'.$tab7[0][0].'"> <br>';
		
	
//Code intitulé de la question

$val=$_POST['bouton1'];
$query8= "SELECT cplmt FROM question WHERE id_question='$val'";
			$result8= mysqli_query($link, $query8);
			$tab8= mysqli_fetch_all($result8);
		

    echo   'Intitulé de la question :';
        echo '<input type="text" name="intitule" size="100" value="'.$tab8[0][0].'"> <br>';


	
// TABLEAU COL ET LIGNES	
	
	
	echo "Insérer un tableau: ";
	echo "<br>";
	
	// affichage du nombre de colonne du tableau sous forme de liste déroulante
	echo "Nombre de colonnes:";
	
	// Récupération de la valeur de la question sélectionnée
	$id_quest=$_POST["bouton1"]; 
	
	// Requête pour afficher le nb de colonnes du tableau de la question sélectionnée 
	$querycolonnes2="SELECT question.nb_colonnes,question.numero_question 
	FROM question 
	WHERE question.id_question='$id_quest'";
	$resultcolonnes2= mysqli_query($link, $querycolonnes2);
	$tabcolonnes2= mysqli_fetch_all($resultcolonnes2);
	$nb_colonnes_selec= array('0','1','2','3','4','5','6');
	echo '<select name="colonne">' ;
	for	($i=0; $i<count($nb_colonnes_selec) ; $i=$i+1){
		if ($nb_colonnes_selec[$i][0]==$tabcolonnes2[0][0]){
			echo '<option value="'.$nb_colonnes_selec[$i][0].'" selected>'.$nb_colonnes_selec[$i][0].'</option>' ; 
		}
		else{
			echo '<option value="'.$nb_colonnes_selec[$i][0].'"> '.$nb_colonnes_selec[$i][0].' </option>' ;
			// La liste déroulante contient les différents nb de colonnes différents 
			// Le nb de colonnes de la question sélectionnée est affiché 
		}
	}
	
	// Affichage du nombre de ligne du tableau sous forme de liste déroulante
	echo "<br>";
	echo "</select>"; 
	echo "Nombre de lignes:";
	
	
	$queryligne2="SELECT question.nb_lignes,question.numero_question 
    FROM question 
    WHERE question.id_question='$id_quest'";
    $resultligne2= mysqli_query($link, $queryligne2);
    $tabligne2= mysqli_fetch_all($resultligne2);
    $nb_ligne_selec= array('0','1','2','3','4','5','6');
    echo '<select name="ligne">' ;
    for    ($i=0; $i<count($nb_ligne_selec) ; $i=$i+1){
        if ($nb_ligne_selec[$i][0]==$tabligne2[0][0]){
            echo '<option value="'.$nb_ligne_selec[$i][0].'" selected>'.$nb_ligne_selec[$i][0].'</option>' ; 
        }
        else{
            echo '<option value="'.$nb_ligne_selec[$i][0].'"> '.$nb_ligne_selec[$i][0].' </option>' ;
            // La liste déroulante contient les différents nb de colonnes différents 
            // Le nb de colonnes de la question sélectionnée est affiché 
        }
    }

    
    echo "</select>";?>


<!-- PARAMETRAGE DE LA REPONSE ATTENDUE -->


<?php echo "<input type='hidden' name='bouton1' value='".$_POST['bouton1']."'>"; ?> 
<input type="submit" name="adddiv" value='Entrer du texte' >


<?php

if(isset($_POST['adddiv'])){ ?>

  
   <input type='text' value='Entrez un texte' name='texte'>
   <?php echo "<input type='hidden' name='bouton1' value='".$_POST['bouton1']."'>"; ?> 	 
  <input type='submit' name='gaga' value='Valider' >
  
<?php 
} 
?>

<?php echo "<input type='hidden' name='bouton1' value='".$_POST['bouton1']."'>"; ?> 
<input type="submit" name="adddiv2" value= "etiquette"  >
 

<?php if(isset($_POST['gaga'])){
$le_bouton=$_POST['bouton1']; 
$val_texte=$_POST['texte'];
$val_texte = str_replace("'", "\'",$val_texte) ;
$requete_ajout_rep= "UPDATE question SET reonse_question=CONCAT(reonse_question, ' $val_texte ') WHERE id_question='$le_bouton'";
$envoi_ajout=mysqli_query($link, $requete_ajout_rep); 

}
 if(isset($_POST['adddiv2'])){
    $le_bouton=$_POST['bouton1']; 
    $val_texte=$_POST['adddiv2']; 
    $requete_ajout_rep= "UPDATE question SET reonse_question=CONCAT(reonse_question, ' / etiquette / ') WHERE id_question='$le_bouton'";
    $envoi_ajout=mysqli_query($link, $requete_ajout_rep); 
  
    }

$le_bouton=$_POST['bouton1']; 
$query_etiquette_reponse="SELECT reonse_question FROM question WHERE id_question='$le_bouton'";
    $resu_etiquette_reponse= mysqli_query($link,$query_etiquette_reponse);
    $tab_etiquette_reponse=mysqli_fetch_all($resu_etiquette_reponse);
    echo $tab_etiquette_reponse[0][0];
    $needle='etiquette';
    $nb_etiquettes=substr_count ( $tab_etiquette_reponse[0][0] , $needle  );


	echo '<br>';
	echo "<input type='submit' name='suppr_etiquette_rep' value='Reset la réponse'>"; 
	echo "<input type='hidden' name='nb_etiq_rep' value='".$nb_etiquettes."'>" ;
    echo "<input type='hidden' name='bouton1' value='".$_POST['bouton1']."'>" ;
    echo "<input type='submit' name= 'cadre2' value='valider' >";
    echo "</form>";
?>
    


<?php
}	
	
		
?>
<br><br>

<?php		

//CADRE 3

$le_bouton=$_POST['bouton1']; 

$query_etiquette_reponse="SELECT reonse_question FROM question WHERE id_question='$le_bouton'";
    $resu_etiquette_reponse= mysqli_query($link,$query_etiquette_reponse);
    $tab_etiquette_reponse=mysqli_fetch_all($resu_etiquette_reponse);
   
    $needle='etiquette';
    $nb_etiquettes=substr_count ( $tab_etiquette_reponse[0][0] , $needle  );

if($nb_etiquettes!=0){ // CODAGE ETIQUETTE 

// BOUTON ETIQUETTE 

$val=$_POST['bouton1'];
$query_liste_etiquette= "SELECT id_etiquette_prof,contenu_etiquette,etat_etiquette,etiquette_prof.id_question 
                             FROM etiquette_prof,question 
                             WHERE etiquette_prof.id_question=question.id_question 
                             AND etat_etiquette=TRUE AND question.id_question='$val'";
    $result_liste_etiquette= mysqli_query($link, $query_liste_etiquette);
    $tab_liste_etiquette= mysqli_fetch_all($result_liste_etiquette);
	
    $n_etiquette=count($tab_liste_etiquette);
	
    // on compte le nombre de question dans la table
    /*$query_n= "SELECT COUNT(numero_question) FROM etiquette";
    $result_n= mysqli_query($link, $query_n);
    $tab_n= mysqli_fetch_all($result_n); */ 


    // on créé autant de bouton qu'il y a de question en leur donnant le nom de la question à laquelle ils correspondent 

    for($i=0 ; $i<$n_etiquette ; $i=$i+1){ 
        echo '<form method="POST" action="Page test.php">' ;
  
			echo '<input type="submit" name="bouton_etiquette" value="etiquette '.$tab_liste_etiquette[$i][0].'" >' ;
			echo '<input type="hidden" name="bouton1" value= "'.$val.'">';
			echo '<input type="hidden" name="id_etiquette_cache" value="'.$tab_liste_etiquette[$i][0].'">';
        	echo" <br><br>";
			echo '</form>' ;

    }
}
	
if( isset($_POST['bouton_etiquette'])){//Code Pourcentage du barème
	echo '<form method="POST" action="Page test.php">' ;

			$id_etiquette_recup=$_POST["id_etiquette_cache"]; 
            $val=$_POST['bouton1'];
            $query15= "SELECT etiquette_prof.ponderation_etiquette 
            FROM etiquette_prof, question
            WHERE question.id_question='$val'
            AND etiquette_prof.id_question= '$val' 
			AND etiquette_prof.id_etiquette_prof='$id_etiquette_recup'";
            $result15= mysqli_query($link, $query15);
            $tab15= mysqli_fetch_all($result15);
			
			
           
            echo 'Pourcentage du barème :';
            echo '<input type="text" name="pourcentage" size="10" value="'.$tab15[0][0].'"> <br>';
           
			
	
			
			// REPONSE ATTENDUE ET REPONSE PROPOSEE
			


$id_etiquette_recup=$_POST["id_etiquette_cache"]; // on récupère l'id de l'etiquette 


// on récupere les infos de l'etiquete vrai pour la reponse 
	$query_rep_vrai= "SELECT id_etiquette_prof,contenu_etiquette,etat_etiquette,etiquette_prof.id_question 
                      FROM etiquette_prof,question 
                      WHERE etiquette_prof.id_question=question.id_question 
                      AND etat_etiquette=TRUE AND question.id_question='$val'
					  AND etiquette_prof.id_etiquette_prof='$id_etiquette_recup'";

    $result_rep_vrai= mysqli_query($link, $query_rep_vrai);
    $tab_rep_vrai= mysqli_fetch_all($result_rep_vrai);
    $n_etiquette_vrai=count($tab_rep_vrai); 

	$query_rep_faux= "SELECT id_etiquette_prof,contenu_etiquette
                      FROM etiquette_prof,question 
                      WHERE etiquette_prof.id_question=question.id_question 
                      AND etat_etiquette=FALSE AND question.id_question='$val'";
//AND etiquette_prof.id_etiquette_prof='$id_etiquette_recup'
  /*   $query_rep_faux= "SELECT id_etiquette_prof,contenu_etiquette,etat_etiquette,etiquette_prof.id_question 
                             FROM etiquette_prof,question 
                             WHERE etiquette_prof.id_question=question.id_question 
                             AND etat_etiquette=FALSE
                             AND question.numero_question='$val'"; */
              
    $result_rep_faux= mysqli_query($link, $query_rep_faux);
    $tab_rep_faux= mysqli_fetch_all($result_rep_faux);
    $n_etiquette_fausse=count($tab_rep_faux);

     echo '<input type="hidden" name="nombre_etiq_faus" value="'.$n_etiquette_fausse.'">';

	
   
echo "Etiquette juste : "; 


   for($i=0 ; $i<$n_etiquette_vrai ; $i=$i+1){ 

			echo '<input type="input" name="reponse" value="'.$tab_rep_vrai[$i][1].'" >' ;
			
	}

    echo '<br>';
    echo '<br>';

//Code infobulle réussite
$id_etiquette_recup=$_POST["id_etiquette_cache"]; 
$val=$_POST['bouton1'];
            
            $query17= "SELECT etiquette_prof.aide
            FROM etiquette_prof, question
            WHERE question.id_question='$val'
            AND etiquette_prof.id_question= '$val' 
            AND etiquette_prof.id_etiquette_prof='$id_etiquette_recup'";
            $result17= mysqli_query($link, $query17);
            $tab17= mysqli_fetch_all($result17);


          
            echo 'Infobulle aide :';
            echo   '<input type="text" name="nom_info_bulle" size="100" value="'.$tab17[0][0].'"> <br>';
          



echo "Etiquette fausse :  "; 	
echo $n_etiquette_fausse;
echo '<br>';
	
for($i=0 ; $i<$n_etiquette_fausse ; $i=$i+1){ 
			
			echo '<input type="hidden" name="id_etiqette_fausse_'.$i.'" value="'.$tab_rep_faux[$i][0].'">'; // récupération de l'id de l'etiquette fausse 
            echo '<input type="input" name="reponse_vrai_'.$i.'" value="'.$tab_rep_faux[$i][1].'" >' ;
			echo '<input type="submit" name="etiquette_-_fausse'.$i.'" value="etiquette fausse - " >';
			echo"   ";

    }
	
echo "<br><br>"; 

// RENDU DE LA REPONSE AVEC LES VALEURS DES ETIQUETTES


$val=$_POST['bouton1'] ;
               
$query_etiquette_contenu_rep="SELECT id_etiquette_prof,contenu_etiquette FROM etiquette_prof WHERE id_question=$val AND etat_etiquette='1'" ; 
$envois_etiquette_contenu_rep= mysqli_query($link, $query_etiquette_contenu_rep); 
$tab_etiquette_contenu_rep=mysqli_fetch_all($envois_etiquette_contenu_rep) ;


$compte_etiq="SELECT COUNT(id_etiquette_prof) FROM etiquette_prof WHERE id_question=$val" ;
$envois_compte_etiq= mysqli_query($link, $compte_etiq) ; 
$tab_compte_etiq=mysqli_fetch_all($envois_compte_etiq) ; 


$query_etiquette_reponse2="SELECT reonse_question FROM question WHERE id_question='$val'";
    $resu_etiquette_reponse2= mysqli_query($link,$query_etiquette_reponse2);
    $tab_etiquette_reponse2=mysqli_fetch_all($resu_etiquette_reponse2);
	$bodytag =$tab_etiquette_reponse2[0][0] ; 
for($i=0 ; $i<$tab_compte_etiq[0][0] ; $i++){
	if(substr_count($tab_etiquette_reponse2[0][0], 'etiquette '.$tab_etiquette_contenu_rep[$i][0])){
		$bodytag = str_replace('etiquette '.$tab_etiquette_contenu_rep[$i][0], $tab_etiquette_contenu_rep[$i][1], $bodytag );	
	
	}

}
echo $bodytag ;



echo '<br><br>' ; 
           			
            $id_etiq_cah=$_POST['id_etiquette_cache'];
 			$val=$_POST['bouton1'];
			$btn_etqt=$_POST['bouton_etiquette']; 

	echo '<input type="hidden" name="bouton_etiquette" value="'.$btn_etqt.'" >' ; 
 	echo '<input type= "hidden" name="bouton1" value="'.$val.'">';
	
	echo"   ";
	echo '<input type="submit" name="etiquette_+_fausse" value="etiquette fausse + " >' ;
	echo"   ";
	echo '<input type= "hidden" name="id_etiquette_cache" value="'.$id_etiq_cah.'">';

	echo"<br>";
	echo"<br>";

	echo '<input type= "hidden" name="nb_réponse_fausse" value="'.$n_etiquette_fausse.'">';
	echo '<input type="submit" name="enregistre" value="enregistrer les modification" >';
	
echo '</form>' ;

}
}

}


?>	

</body>
</html>