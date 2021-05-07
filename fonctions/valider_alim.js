function valider_alim(){
	
	var i=0;
	 
	var Malert="";
	if (document.form_selec_alim.quantite.value ==""){
		
		i=i+1;
		 Malert=Malert+"Saisir une quantité.\n";
	}
	if (i==0){
		// les données sont ok, on peut envoyer le formulaire    
		return true;
	}
	else{
		// sinon on affiche un message
		alert(Malert);
	// et on indique de ne pas envoyer le formulaire
		return false;
  }
  
}