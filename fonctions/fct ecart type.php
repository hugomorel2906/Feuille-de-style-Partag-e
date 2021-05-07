<?php

//Oriane BURTSCHER et Agathe PICAVET

//PROCEDURE QUi calcule l'écart type A PARTIR d'un tableau à une colonne / liste
// ex : Sd($tab)
// paramètres à saisir : 
    // $tab : tableau à 1 colonne contenant : les valeurs numériques 
// sortie : écart type


function Ecart_Type($tab)
{
	
	$somme=0;                                         // initialise la somme à 0
	$n=0;											  //nombre d'éléments de la liste
	$moy=Moyenne($tab);								// calcul moyenne
        for ($i=0; $i < count($tab); $i++)            // parcours les éléments de la liste
    {
			$somme+=($tab[$i]-$moy)**2;
			$n+=1;
	}
	$ecart_type=sqrt($somme/($n-1));                              // calcul de l'écart type
	return $ecart_type;
}
?>