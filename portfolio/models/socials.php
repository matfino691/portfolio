<?php 


// require de la page se connectant a la base de donnée
require_once 'utilities/bdd_connection.php';

// securiser la requete via ->prepare()
// selectionner les socials
$query = $pdo->prepare
(
	'SELECT * FROM socials'	
);
// executer la requete
$query->execute();
// recupération de toutes les donnée dans un fetchAll
$socials = $query->fetchAll();