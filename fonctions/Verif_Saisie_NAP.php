<?php
//Mathilde, Charlotte, Mailys, Nils
// Vérification bonne saisie des formullaires
// données entrée :La dernière ligne d'un tableau 10 collones, 8 lignes
//(1ere colonne:les NAP ; 2eme colonne:Lundi ;...;8e collone: Dimanche;9e collone: Total; 10e collone: Moyenne)
// (1ere ligne : les titres cidessus;2e: A;...;7e ligne: F; 8e ligne :Total
// La dernière ligne est calculée automatiquement

// données sortie : Message "Vos données ont été enregistrées." si total =24 ou "Les jours ci-dessous ne s'additionnent pas à 24h : les jours concernés" si total différent de 24h


function Verif_Saisie_NAP($ligne_total){
	$indice= True ;		// Par défaut, indice prend la valeur TRUE
	$value= 24 ;
	$tab_jour=array("lundi","mardi","mercredi","jeudi","vendredi","samedi","dimanche","total");
	$tab_jour_non_saisie= array() ;
	for ($i=0; $i<7; $i++) {
		if($ligne_total[$i] != $value){		// Si le total des heures ne fait pas 24h, indice prend la valeur false 
			$indice = False ;
			array_push($tab_jour_non_saisie,$tab_jour[$i]);
		}
	}
	if ($indice ==False) {
		$indice = "La somme des heures d'activité physique de ". join($tab_jour_non_saisie,", " ). " est différente de 24h. ";
	}
	else {
		$indice="Vos données ont été enregistrées.";
	}
	
	return $indice ;
}

?>
