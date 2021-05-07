<?php

//Oriane BURTSCHER et Agathe PICAVET

//PROCEDURE QUi calcule le quartile demandé A PARTIR d'un tableau à une colonne / liste
// ex : Quartile($quel_quartile,$tab)
// paramètres à saisir : 
    // $tab : tableau à 1 colonne contenant : les valeurs numériques
	// $quel_quartile : "numéro" du quartile à calculer (1,2 ou 3)
	// sortie : valeur quartile

function Quartile($quel_quartile,$tab)
{
	//tri de la liste par ordre croissant
	$len=count($tab);
	 
     for ($i=0; $i<$len; $i++)
     {
        for($j=$i; $j<$len; $j++)
        {
            if($tab[$j]<$tab[$i]) 
            {
                $valeurtemporaire = $tab[$i];
                $tab[$i] = $tab[$j];
                $tab[$j] = $valeurtemporaire;
            }
        }
     }

   // calcul des quartiles 
	
		if ($quel_quartile==2)                                       // Q2 = médiane : 50% des valeurs en dessous 
			if ($len%2==0)													//si longueur pair
				$quartile=($tab[($len/2)-1]+$tab[($len/2)])/2;
			else															// si longueur impair
				$quartile=$tab[(($len+1)/2)-1];
		if ($quel_quartile==1)	 									//Q1 : 25% des valeurs en dessous 
			$quartile=$tab[(int)($len/4)];
		if ($quel_quartile==3)
			$quartile=$tab[((int)($len*3/4))-1];					//Q3 : 75% des valeurs en dessous 

	return $quartile;


}

?>