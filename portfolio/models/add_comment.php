<?php

// require de la page se connectant a la base de donnée
require_once '../utilities/bdd_connection.php';

// SI DES COMMENTAIRES SONT SAISI ET SOUMIS
if ($_POST) {

	// preparation de la requete sql
	$query = $pdo->prepare
	(
		'INSERT INTO comment(Nickname, Contents, CreationTimestamp)
		 VALUES (?, ?, NOW())'	
	);
	// execution de la requete
	$query->execute([
		$_POST['pseudo'],
		$_POST['comm']	
	]);
	
	//redirection vers la page projets
	header('Location: ../projects.php');
	exit();
}
