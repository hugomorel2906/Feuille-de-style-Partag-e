<?php
//Amine Kabeche, Eliot Dupre
//$bool est un booléen indiquant si la repose est celle attendu (1) ou non (0)
//$url_vrai est l'url vers lequel l'utilisateur est renvoyé si ca réponse est celle attendu.
//$url_faux est l'url vers lequel l'utilisateur est renvoyé si ca réponse n'est pas celle attendue.
//  /!\ les url doivent être rentrés de cette manière:  $url_vrai = "'https://www.google.com/'";
function Valider($bool,$url_vrai,$url_faux){

		if ($bool == 1){
				//si le résultat est celui attendu, la fonction envois vers l'url_vrai (par exemple la page suivante)
		 		echo "<input type=button value=valider onclick=window.location.href="."$url_vrai".">";
		}
		else{
			//si le résultat n'est pas celui attendu, la fonction envois vers l'url_faux (par exemple la même page pour quil recommence)
			echo "<input type=button value=valider onclick=window.location.href="."$url_faux".">";
		}
	}
?>
