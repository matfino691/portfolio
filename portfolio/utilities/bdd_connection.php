<?php 

// connexion a la bdd via un try catch en cas d'erreur

$host_name = 'db717619266.db.1and1.com';
$database = 'db717619266';
$user_name = 'dbo717619266';
$password = 'rafNevyoypteth0-';

try {
  $pdo = new PDO("mysql:host=$host_name; dbname=$database; charset=UTF8", $user_name, $password, 
            [
                 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
} catch (PDOException $e) {
  echo "Erreur!: " . $e->getMessage() . "<br/>";
  die();
}