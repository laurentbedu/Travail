<?php
require("connexionBDD.php");
require("fonctions.php");

$nom = verifVariable($_POST['nom']);
$prenom = verifVariable($_POST['prenom']);
$emailUser = verifVariable($_POST['emailUser']);
$passe = verifVariable($_POST['passe']);
$passe = password_hash($passe, PASSWORD_DEFAULT);

$sql = "INSERT INTO Utilisateur(nom, prenom, email, motDePasse, typeUtilisateur)
VALUES(:lastname, :firstname, :mail, :password, 2)";

$req = $base->prepare($sql);

$req->bindvalue(":lastname", $nom);
$req->bindvalue(":firstname", $prenom);
$req->bindvalue(":mail", $emailUser);
$req->bindvalue(":password", $passe);

$req->execute();

header('location: espaceProduit.php');
