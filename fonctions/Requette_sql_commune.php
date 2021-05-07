<?php


  
  include "../fonctions/connexion_BDD.php";

    $sql = "SELECT question.id_type_question, question.intitule_question, question.nom_question, question.nombre_tentatives, question.lien, question.consigne, question.reponse,

Etiquette_prof.ponderation_etiquette, Etiquette_prof.contenu_etiquette, Etiquette_prof.etat_etiquette, Etiquette_prof.aide, 

Image.chemin_acces

FROM question
LEFT JOIN Etiquette_prof ON question.id_question = Etiquette_prof.id_question
LEFT JOIN Image ON question.id_question = Image.id_question


WHERE question.id_question = $id_question";
	
	//echo $sql;
    $r_sql=mysqli_query($link, $sql);
    $tab = mysqli_fetch_all($r_sql);
    //Creer_tab_html($tab,mysqli_num_fields($r_sql), mysqli_num_rows($r_sql), ["question.id_categorie"," question.num_question"," question.intitule_question"," question.nom_question"," question.consigne"," Etiquette_prof.etat_etiquette","
	//Etiquette_prof.contenu_etiquette"," Etiquette_prof.aide"," Image.chemin_acces"]);
	
	$id_type_question= $tab[0][0];
	$intitule_question = $tab[0][1];
	$nom_question = $tab[0][2];
	$nombre_tentatives = $tab[0][3];
	$lien = $tab[0][4];
	$consigne = $tab[0][5];
	$reponse = $tab[0][6];
	$ponderation_etiquette = $tab[0][7];
	$contenu_etiquette = $tab[0][8];
	$etat_etiquette = $tab[0][9];
	$aide = $tab[0][10];
	$chemin_acces = $tab[0][11];
	
	
?>
