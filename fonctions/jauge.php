<?php

// Mailys, Mathilde & Charlotte
// 27/04/2021
// FONCTION QUI CREEE DE JAUGES CIRCUlAIRES
// Cette fonction prend en entrée des données issues du TD; selon les valeurs, les barres du barplot auront une couleur différente. 
// Paramètres à saisir : 
	// $donnees : g de sels ou de fibres. Ces données seront calculées : g de sels et de fibres divisé par les recommandations de l'RNP (en %)
// Données de sortie : photos de jauges

// Réalisation d'une requête pour obtenir la liste des consommations en fibres (ou en sels) en g d'un étudiant pour chaque jour de la semaine 
$donnees= array(150,68,50,98,45,60,80,90);


function affichage_jauge ($donnees){
	for ($i=0;$i < count($donnees) ;$i++) {
		if ($donnees[$i]<99 and $donnees[$i]>69){   // si sa consommation est dans les recommandations RNP
			echo '<img src="jauge_vert.png" width="100" height="500">'; // affichage de la photo avec la zone verte
		}
		elseif ($donnees[$i]<64) {   // si sa consommation est inférieure aux recommandations RNP
			echo '<img src="jauge_rouge_moins.png" width="100" height="500">'; // affichage de la photo avec la zone rouge
		}
		elseif ($donnees[$i]>102) { // si sa consommation est supérieure aux recommandations RNP
			echo '<img src="jauge_rouge_plus.png" width="100" height="500" >'; // affichage de la photo avec la zone rouge
		}
		elseif ($donnees[$i]==102 or $donnees[$i]==101 or $donnees[$i]==100 or $donnees[$i]==99) {  // si sa consommation est proche des limites des recommandations RNP
			echo '<img src="jauge_orange_plus.png" width="100" height="500" >';   // affichage de la photo avec la zone orange
		}
		else {
			echo '<img src="jauge_orange_plus.png" width="100" height="500" >';	// affichage de la photo avec la zone orange
		}
	}

}

affichage_jauge($donnees);  // affichage des images côte à côte

?>





