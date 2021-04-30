<html>
<head>
	<meta charset= "UTF-8">
</head>


<body>	
	<?php
	// déclaration des données
	$supp_repas=$_GET["supp_repas"];
    $test=5;
	
    $IMC_corrige =$poids/($taille)^2;
	
    if(isset ($GET["btn_continuer"]==TRUE)) {
        unlink($test);
        echo "test";
    } else {
        echo "test";
    }
	
	?>

</body>
</html>