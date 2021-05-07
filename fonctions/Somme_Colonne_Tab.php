<!-- Fonction somme colonne tableau-->
<!-- Agathe et Oriane	26/04/21-->
<!-- Prend en entrée en tableau et renvoie la somme de chaque colonne dans une ligne à la suite
Il faut que le tableau contienne déjà cette ligne-->

<?php
	function Somme_Colonne_Tab($tab){
		$nb_ligne=count($tab);
		$nb_colonne=count($tab[0]);
		for ($i=0; $i < $nb_colonne; $i++){
			$somme=0;					// initialisation de la somme
			for ($j=0; $j < $nb_ligne; $j++){
				$somme+=$tab[$j][$i];
				}
				$tab[$nb_ligne-1][$i]=$somme;
		}
		return $tab;
	}	
?>