<?php

/////////////////////////////////////////////////////////
//           TRAITEMENT DU FORMULAIRE                  //
/////////////////////////////////////////////////////////

//appel fonctions necessaires a la gestion des sessions
include __DIR__.'/utilities/utilities.php' ;

//appel de la classe contenant le formualaire
require_once __DIR__.'/class/Form.class.php';

//appel des données réseaux sociaux
require_once __DIR__.'/models/socials.php';


//tableau vide representant l'erreur
$error =[];

// lancement de la session
startSession();

// si l'utilisateur valide le formulaire
if ($_POST) {

	// verification validité du mail via FILTER_VALIDATE_EMAIL
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		
		// si mail invalide création du contenu du message d'erreur
		$error['email'] = "<i class=\"fa fa-exclamation\" aria-hidden=\"true\"></i>
		Please enter a valid email";
		
		// enregistrement de l'erreur dans la session
		$_SESSION['error'] = $error;
		
		// conserver a l'ecran les autres données deja saisies
		$_SESSION['inputs'] = $_POST;
	}


	//si les donnees sont valides, traitement du mail, puis envoi en BDD

	// si mail valide et formulaire integralement rempli
	$_SESSION['success'] = 1;

	//************envoi du mail sur ma boite via mail()***********
	$name    =$_POST_['name']; 
	$email   =$_POST['email']; 
	$message =$_POST['message']; 
	
	//parametrage du mail du destinataire
	$to      ="mat.fino@outlook.fr";
	
	//headers
	$headers  ="MIME-Version: 1.0" . "\n";
	$headers .="Content-type: text/plain; charset=ISO-8859-1" . "\n";
	$headers .="Content-Transfer-Encoding: 8bit" . "\n";
	$headers .="From: $name <$email>" . "\n";
	$headers .="Reply-to: $name <$email>" . "\r\n";
	
	
	//sujet du mail par défaut
	$subject ="Message visiteur portfolio";

	mail($to, $subject, $message, $headers);
	
	// ENVOI en BDD
	//  securiser la requete via ->prepare()
	// inserer les données du formualaires en BDD
	$query = $pdo->prepare
	(
		'INSERT INTO contact(Mail, Name, Message, CreationTimestamp)
		 VALUES (?, ?, ?, NOW())'	
	);
	// executer la requete
	$query->execute([
		$_POST['email'],
		$_POST['name'],
		$_POST['message']
		]);

	//redirection sur le formualaire
	header('Location: contact.php');

	//cloturer la requete via exit()
	exit();
}

$template = 'contact';
include 'layout.phtml';
	
	