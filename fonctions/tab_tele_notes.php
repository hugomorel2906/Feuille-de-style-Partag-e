<html>                                                    <!-- début html         -->

<head>                                                    <!-- début entête         -->
    <meta charset="UTF-8">
</head>                                                    <!-- fin entête         -->

<body> 
	<?php
				
				include"../bdd/connexion_bdd.php";
				
				include "../fonctions/tableau.php";
	
				$id_annee=2029;
					$query = "SELECT nom_utilisateur, prenom_utilisateur, note_finale
							FROM Utilisateurs, Examen_etudiant
							WHERE Utilisateurs.id_utilisateur=Examen_etudiant.id_utilisateur and id_annee=".$id_annee;
								
					$result = mysqli_query($link, $query);
					$tab = mysqli_fetch_all($result);
					$nbligne = mysqli_num_rows($result);
					$nbcol = mysqli_num_fields($result) ;
					$t=array("Nom","Prénom","Note");
										
					creer_tab_HTML($tab,$nbcol,$nbligne,$t);
					
	
			$filename = "Notes" . date('Ymd') . ".xls";
			header("Content-Disposition: attachment; filename=\"$filename\"");
			header("Content-Type: application/vnd.ms-excel");
			
			exit;
	?>
</body>
</html>				
			
			
