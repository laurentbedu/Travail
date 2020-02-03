<?php
require("connexionBDD.php");
require("fonctions.php");

$idProduct = verifVariable($_GET["idProduct"]);

verifIdExist($base, $produit);

supprItem($base, $idProduct);

header('location: listeProduits.php');
