<?php
require("fonctions.php");

$base = connect();
$idProduct = verifVariable($_GET["idProduct"]);

$sql = "DELETE FROM Products
WHERE id = :idProd";

$req = $base->prepare($sql);
$req->bindValue(":idProd", $idProduct);
$req->execute();


header('location: listeProduits.php');
