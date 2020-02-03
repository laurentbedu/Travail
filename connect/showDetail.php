<?php
require("connexion.php");
require("fonctions.php");

$produit = verifVariable($_GET["idProduct"]);

verifIdExist($base, $produit);

$sql = "SELECT P.id, P.name, P.price, P.description, DAY(P.created) AS jour, MONTH(P.created) AS mois, YEAR(P.created) AS annee, P.image, Categories.name AS categorie_name FROM Products AS P
INNER JOIN Categories ON P.category_id = Categories.id
WHERE P.id = " . $produit;

$req = $base->prepare($sql);
$req->execute();



while ($data = $req->fetchObject()) {
?>
    <!doctype html>
    <html lang="fr">

    <head>
        <title><?= $data->name ?></title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body class="bg-dark">
        <?php include("header.php"); ?>
        <div class="container">

            <div class="row justify-content-center">
                <div class="col">
                    <h2 class="text-center text-warning">Détail du produit - <?= $data->name ?> - Réf : <?= $data->id ?></h2>

                </div>
            </div>
            <hr>

            <div class="row border p-5 rounded-lg bg-light">
                <div class="card w-50 mx-auto shadow-lg">
                    <div class="text-center mt-3">
                        <img class="img-thumbnail w-75" src="src/img/<?= $data->image ?>" alt="image du produit référencé <?= $data->id ?>" title="Produit référencé <?= $data->id ?>">
                    </div>
                    <div class="card-body">
                        <h3><?= $data->name ?></h3>
                        <p>Date de mise en ligne : <?= $data->jour . '/' . $data->mois . '/' . $data->annee ?></p>
                        <p>Catégorie : <?= $data->categorie_name ?></p>
                        <p>Description : <?= $data->description ?></p>
                        <p>Prix : <?= $data->price; ?>€</p>
                    </div>
                </div>
                <div class="w-100 mt-5"></div>
                <p><a href="listeProduits.php" class="btn btn-danger">&larr; Revenir à la liste des produits</a></p>
            </div>
        </div>


    <?php
}
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

    </html>