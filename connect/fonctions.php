<?php

// Vérifie les variables && protège des injections XSS
function verifVariable($val) {
    if (isset($val) && !empty($val)) {
        $val = trim($val);
        $val = stripslashes($val);
        $val = htmlspecialchars($val);
        return $val;
    } else {
        return false;
    }
}

// Vérifie si l'id existe dans la base de données
function verifIdExist($base, $val){

    $sql = "SELECT id FROM Products";

    $req = $base->prepare($sql);
    $req->execute();

    while($data = $req->fetchObject()) {
        if (isset($val) && !empty($val)) {
            if ($val == $data->id) {
                return true;
            }
        } else {
            header('location: listeProduits.php');
        }
    }
    header('location: listeProduits.php');
}

// Supprime un enregistrement
function supprItem($base, $idProduct){
    $sql = "DELETE FROM Products
WHERE id = :idProd";

    $req = $base->prepare($sql);
    $req->bindValue(":idProd", $idProduct);
    $req->execute();
}




