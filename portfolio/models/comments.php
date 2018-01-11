<?php 


// require de la page se connectant a la base de donnée
require_once '../utilities/bdd_connection.php';

//selection des commentaires a afficher
$query = $pdo->prepare
(
	'SELECT Nickname, Contents, CreationTimeStamp
	 FROM comment'
);
// execution de la requete
$query->execute();
// recuperation de toutes les données renvoyé par MySQL dans un fetchAll
$comments = $query->fetchAll();


