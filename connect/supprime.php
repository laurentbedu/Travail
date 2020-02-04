<?php
require("connexionBDD.php");
require("fonctions.php");

$idProduct = verifVariable($_GET["idProduct"]);

verifIdExist($base, $produit);

$sql = "DELETE FROM Products
WHERE id = :idProd";

$req = $base->prepare($sql);
$req->bindValue(":idProd", $idProduct);
$req->execute();

header('location: espaceProduit.php');
