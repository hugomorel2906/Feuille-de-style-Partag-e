<?php

//Oriane BURTSCHER et Agathe PICAVET

//PROCEDURE QUi calcule la moyenne A PARTIR d'un tableau à une colonne / liste
// ex : Moyenne($tab)
// paramètres à saisir : 
    // $tab : tableau à 1 colonne contenant : les valeurs numériques à moyenner 
// sortie : moyenne

function Moyenne($tab)
{
	$somme=0;                                         // initialise la somme à 0
	$n=0;                                              //nombre d'éléments de la liste
        for ($i=0; $i < count($tab); $i++)            // parcours les éléments de la liste
    {
			$somme+=$tab[$i];
			$n+=1;
	}
	$moy=$somme/$n ;                              // calcul de la moyenne
	return $moy;
}
?>