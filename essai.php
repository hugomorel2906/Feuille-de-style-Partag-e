<html>
<head>
	<meta charset= "UTF-8">
</head>

<body>	
	<?php
	// déclaration des données
	$poids=$_GET["poids"];
    $taille=$_GET["taille"];
    $sexe=$_GET["sexe"];
    $age=$_GET["age"];
    $IMC=$_GET["IMC"];
	
    $IMC_corrige =$poids/($taille)^2;
	
    if ($IMC==$IMC_corrige) {
        echo "c bon";
    } else {
        echo "non";
    }
	
	?>

</body>
</html>