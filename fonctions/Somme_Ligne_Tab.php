<!-- Fonction somme ligne tableau-->
<!-- Agathe et Oriane	26/04/21-->
<!-- Prend en entrée en tableau et renvoie la somme de chaque ligne dans une colonne à la suite
Il faut que le tableau contienne déjà cette colonne-->

<?php
	function Somme_Ligne_Tab($tab){
		$nb_ligne=count($tab);
		$nb_colonne=count($tab[0]);
		for ($i=0; $i < $nb_ligne; $i++){
			$somme=0;					// initialisation de la somme
			for ($j=0; $j < $nb_colonne; $j++){
				$somme+=$tab[$i][$j];
				}
				$tab[$i][$nb_colonne-1]=$somme;
		}
		return $tab;
	}	
?>