<!--
auteur : Oriane 
fonction supprime toutes les données de repas avec requete supression des données repas 
entrée : link bdd et id_utilisateur
sortie : // suppr de la bdd
-->

<?php
function Suppr_repas($id_utilisateur,$link)
{

		$query_del_tout_alim=" 
		DELETE Quantite 
		FROM Repas_etudiant 
		INNER JOIN Quantite
		ON Quantite.id_repas_etudiant=Repas_etudiant.id_repas_etudiant
		WHERE id_utilisateur=".$id_utilisateur;       
        mysqli_query($link,$query_del_tout_alim)or die('Impossible de sélectionner la base de données'. mysqli_error($link));

}

?>

