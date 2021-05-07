
<?php
  
  include "../fonctions/connexion_BDD.php";

    $sql = "SELECT reponse_etudiant.id_reponse, reponse_etudiant.num_tentatives, reponse_etudiant.reponse_juste, reponse_etudiant.reponse_libre,
	
	Examen_etudiant.id_examen_etudiant
	
FROM Examen_etudiant
LEFT JOIN reponse_etudiant ON Examen_etudiant.id_examen_etudiant = reponse_etudiant.id_examen_etudiant

WHERE reponse_etudiant.id_question = $id_question";
	
    $r_sql=mysqli_query($link, $sql);
    $tab = mysqli_fetch_all($r_sql);
	
	$id_reponse= $tab[0][0];
	$num_tentatives = $tab[0][1];
	$reponse_juste = $tab[0][2];
	$reponse_libre = $tab[0][3];
	$id_examen_etudiant = $tab[0][4];
	?>