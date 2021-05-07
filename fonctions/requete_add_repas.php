<?php 
//fonction qui copie un repas entier
//entrée : tab avec la requete du repas à copier : code_alim, alim_nom, quantite
//sortie NONE (insertion bdd)

function Copier_Repas($tab,$id_repas,$link)
{

    echo PHP_EOL; // crée un retour de ligne dans le code HTML
    for ($i=0; $i < count($tab); $i++)
    {
        $query_add_alim_repas=" INSERT INTO Quantite (id_repas_etudiant, alim_code,quantite)
                      VALUES ('".$id_repas."','".$tab[$i][0]."','".$tab[$i][2]."')";
		mysqli_query($link,$query_add_alim_repas)or die('Impossible de sélectionner la base de données'. mysqli_error($link));
		
        echo PHP_EOL;
    }
}
?>