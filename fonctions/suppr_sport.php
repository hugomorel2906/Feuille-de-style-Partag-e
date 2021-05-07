<!--
auteur : Oriane 
fonction supprime toutes les données de repas avec requete supression des données repas 
entrée : link bdd et id_utilisateur
sortie : // suppr de la bdd
-->

<?php
function Suppr_sport($id_utilisateur,$link)
{

		$query_del_tout_sport=" 
		DELETE 
		FROM NAP 
		WHERE id_utilisateur=".$id_utilisateur;       
        mysqli_query($link,$query_del_tout_sport)or die('Impossible de sélectionner la base de données'. mysqli_error($link));

}

?>