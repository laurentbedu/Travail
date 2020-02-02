<?php

require("connect.php");

$base = connect();

//var_dump($_POST);
//function verifstring($mot){
//    if (isset($mot)) {
//        if(!empty($mot)){
//            if(!is_string($mot)){
//                //return intval((htmlspecialchars(trim(($mot)))));
//                return htmlspecialchars(trim($mot));
//            }
//        }
//    }
//};
//
//function verifint($int){
//    if (isset($int)) {
//        if(!empty($int)){
//            if(!is_int($int)){
//                //return intval((htmlspecialchars(trim(($mot)))));
//                return htmlspecialchars(trim($int));
//            }
//        }
//    }
//};
$id = htmlspecialchars($_POST["id"]);
$name = htmlspecialchars($_POST["name"]);   //je récupére le nom grâce à name="name" DANS MON INPUT DE MON FORMULAIRE/
$description = htmlspecialchars($_POST["description"]);    //je récupére lea description grâce à name="description"/
$categoryName = htmlspecialchars($_POST["categoryName"]);   //je récupére le nom grâce à name="categoryName"/
$price = htmlspecialchars($_POST["price"]);                      //je récupére le nom grâce à name="price"/
$image = htmlspecialchars($_POST["image"]);

// Recherche de l'id de la catégorie en fonction du nom
$sql = "SELECT id FROM Categories
WHERE name='" . $categoryName . "'";

$requete = $base->prepare($sql);
$requete->execute();

while ($data = $requete->fetchObject()) {
   $idCategorie = $data->id; // L'id est sauvegardée dans une variable
}

$modif="UPDATE products SET name=:nom, description=:descr, price=:prix, category_id=:idCategorie, image=:photo WHERE id=:idProd";

$req = $base->prepare($modif);            /*  -> veut dire va chercher la méthode de l'objet*/

$req->bindValue(":nom", $name);
$req->bindValue(":descr", $description);
$req->bindValue(":prix", $price);
$req->bindValue(":idCategorie", $idCategorie);
$req->bindValue(":idProd", $id);
$req->bindValue(":photo", $image);

$req->execute();

header('location: listeProduits.php');
