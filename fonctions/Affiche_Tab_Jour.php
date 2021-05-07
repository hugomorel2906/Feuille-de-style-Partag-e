<!-- Fonction affiche tableau du jour-->
<!-- Agathe et Oriane	27/04/21-->
<!-- Prend en entrée le jour sélectionné par clic sur le bouton et affiche le tableau des repas de ce jour-->

<?php 
	function Affiche_Tab_Jour ($jour){					
		if (isset($jour)) {                                    //affichage si le bouton validé a été enclanché 
			$utilisateur=$_GET[""];                              // récupération de l'id utilisateur (à compléter)				
				
		// requête permettant de récupérer les données des repas du jour séléctionné 
		
			$query = "Select alim_nom_fr, type_repas, quantite
					from Type_repas_etudiant, Ciqual_alim, Quantité, Utilisateurs 
					where Utilisateurs.id_repas_etudiant = Repas_etudiant.id_repas_etudiant 
					and Repas_etudiant.id_type_repas = Type_repas.id_type_repas 
					and Repas_etudiant.id_jour=Jour.id_jour 
					and Repas_etudiant.id_repas_etudiant = Quantité.id_repas_etudiant 
					and Quantité.id_ciqual = Aliment.id_ciqual 
					and Aliment.alim_code = Ciqual_alim.alim_code 
					and id_utilisateur =".$utilisateur."and id_jour =".$jour; 	//vérifier si on récupère l'identifiant ou le libellé du jour
						

			$result = mysqli_query($link, $query);
			$tab = mysqli_fetch_all($result);
			$nbligne = mysqli_num_rows($result);
			$nbcol = mysqli_num_fields($result) ;
	
		creer_tab_HTML($tab,$nbcol,$nbligne,array("repas","nom","quantité (g)");
				
		}
	}	
			
			
			?>