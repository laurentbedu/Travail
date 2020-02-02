<?php

require("fonctions.php");

$base = connect();

$name = verifVariable($_POST["name"]);
$description = verifVariable($_POST["description"]);
$prix = verifVariable($_POST["prix"]);
$image = verifVariable($_POST["image"]);
$categorie = verifVariable($_POST["categorie"]);


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
