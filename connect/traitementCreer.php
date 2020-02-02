<?php

require("connect.php");

$base = connect();

$name = htmlspecialchars($_POST["name"]);
$description = htmlspecialchars($_POST["description"]);
$prix = htmlspecialchars($_POST["prix"]);
$image = htmlspecialchars($_POST["image"]);
$categorie = htmlspecialchars($_POST["categorie"]);


// Recherche de l'id de la catégorie en fonction du nom
$sql1 = "SELECT id FROM Categories
WHERE name='" . $categorie . "'";

$requete = $base->prepare($sql1);
$requete->execute();

while ($data = $requete->fetchObject()) {
    $idCategorie = $data->id; // L'id est sauvegardée dans une variable
}

echo $name . "-" . $description . "-" . $prix . "-" . $image . "-" . $idCategorie;

$sql2 = "INSERT INTO Products(name, description, price, category_id, image, created, modified)
VALUES(:nom, :descr, :price, :catId, :photo, NOW(), NOW())";

$req = $base->prepare($sql2);

$req->bindvalue(":nom", $name);
$req->bindvalue(":descr", $description);
$req->bindvalue(":price", $prix);
$req->bindvalue(":catId", $idCategorie);
$req->bindvalue(":photo", $image);

$req->execute();

header('location: listeProduits.php');
