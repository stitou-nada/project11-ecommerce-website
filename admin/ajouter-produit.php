<?php 




include "gestion.php";
// Trouver tous les employés depuis la base de données 
$gestion= new Gestion();


if(!empty($_POST)){
	$employe = new Employe();
	$employe->setPrenom($_POST['Prenom']);
	$employe->setNom($_POST['Nom']);
	$employe->setdate_de_naissance($_POST['Date_de_naissance']);
	$gestionEmployes->Ajouter($employe);
	
	// Redirection vers la page index.php
	header("Location: index.php");
}
?>