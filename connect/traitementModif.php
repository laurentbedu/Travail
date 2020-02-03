<?php
require("connexionBDD.php");
require("fonctions.php");

$id = verifVariable($_POST["id"]);
$name = verifVariable($_POST["name"]);
$description = verifVariable($_POST["description"]);
$categoryName = verifVariable($_POST["categoryName"]);   
$price = verifVariable($_POST["price"]);                      
$image = verifVariable($_POST["image"]);

// Recherche de l'id de la catégorie en fonction du nom
$sql = "SELECT id FROM Categories
WHERE name='" . $categoryName . "'";

$requete = $base->prepare($sql);
$requete->execute();

while ($data = $requete->fetchObject()) {
   $idCategorie = $data->id; // L'id est sauvegardée dans une variable
}

$modif="UPDATE products SET name=:nom, description=:descr, price=:prix, category_id=:idCategorie, image=:photo, modified=NOW() WHERE id=:idProd";

$req = $base->prepare($modif);            /*  -> veut dire va chercher la méthode de l'objet*/

$req->bindValue(":nom", $name);
$req->bindValue(":descr", $description);
$req->bindValue(":prix", $price);
$req->bindValue(":idCategorie", $idCategorie);
$req->bindValue(":idProd", $id);
$req->bindValue(":photo", $image);

$req->execute();

header('location: listeProduits.php');
