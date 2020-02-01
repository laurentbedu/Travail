<?php
require("connect.php");

$base = connect();
$idProduct = $_GET["idProduct"];

echo $idProduct;

$sql = "DELETE FROM Products
WHERE id = :idProd";



$req = $base->prepare($sql);
$req->bindValue(":idProd", $idProduct);
$req->execute();

header('location: listeProduits.php');
