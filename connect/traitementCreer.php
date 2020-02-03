<?php
require("connexionBDD.php");
require("fonctions.php");

$name = verifVariable($_POST["name"]);
$description = verifVariable($_POST["description"]);
$prix = verifVariable($_POST["prix"]);
$image = verifVariable($_POST["image"]);
$categorie = verifVariable($_POST["categorie"]);


$sql = "INSERT INTO Products(name, description, price, category_id, image, created, modified)
VALUES(:nom, :descr, :price, :catId, :photo, NOW(), NOW())";

$req = $base->prepare($sql);

$req->bindvalue(":nom", $name);
$req->bindvalue(":descr", $description);
$req->bindvalue(":price", $prix);
$req->bindvalue(":catId", $categorie);
$req->bindvalue(":photo", $image);

$req->execute();

header('location: listeProduits.php');
