<?php 


// require de la page se connectant a la base de donnée
require_once 'utilities/bdd_connection.php';

// securiser la requete via ->prepare()
// selectionner les travaux
$query = $pdo->prepare
(
	'SELECT * FROM projects'	
);
// executer la requete
$query->execute();
// recupération de toutes les données dans un fetchAll
$projects = $query->fetchAll();