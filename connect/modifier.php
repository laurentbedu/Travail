<?php
require("connect.php");

$base = connect();
$idProduct = $_GET["idProduct"];

// On va chercher toutes les infos utiles dans la base de données
$sql = "SELECT P.id, P.name, P.description, P.price, P.image, P.category_id, DAY(P.modified) AS jour, MONTH(P.modified) AS mois, YEAR(P.modified) AS annee, Categories.name AS categorie_name FROM Products AS P
INNER JOIN Categories ON P.category_id = Categories.id
WHERE P.id = " . $idProduct;

// Les catégories
$sql2 = "SELECT name FROM Categories";

$req = $base->prepare($sql);
$req->execute();

$req2 = $base->prepare($sql2);
$req2->execute();


while ($data = $req->fetchObject()) {
?>
    <!doctype html>
    <html lang="fr">

    <head>
        <title>Modification de <?= $data->name ?></title>
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
                    <h2 class="text-center text-warning">Modification - <?= $data->name ?> - Réf : <?= $data->id ?></h2>
                    <h3 class="text-center text-warning">Date de la dernière modification : <?= $data->jour . '/' . $data->mois . '/' . $data->annee ?></h3>
                </div>
            </div>
            <hr>
            <div class="row border p-5 rounded-lg bg-light">
                <div class="col">
                    <form class="border w-50 mx-auto p-5 bg-white shadow-lg" method="post" action="traitementModif.php">
                        <input type="hidden" class="form-control" id="nom" name="id" value="<?= $data->id ?>">
                        <div class="form-group">
                            <label for="image">Image : <?= $data->image ?></label>
                            <img class="img-thumbnail" id="image" src="src/img/<?= $data->image ?>" alt="image du produit référencé <?= $data->id ?>" title="Produit référencé <?= $data->id ?>">
                        </div>
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" name="name" value="<?= $data->name ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" value="<?= $data->description ?>">
                        </div>
                        <div class="form-group">
                            <label for="prix">Prix</label>
                            <input type="text" class="form-control" id="prix" name="price" value="<?php
                                                                                        $prix = $data->price;
                                                                                        echo number_format($prix, 2, ',', ' '); ?>€">
                        </div>
                        <div class="form-group">
                            <label for="categorie">Catégorie actuelle : <?= $data->categorie_name ?></label>

                            <select class="form-control" id="categorie" name="categoryName">
                                <?php
                                while ($data2 = $req2->fetchObject()) {
                                ?>
                                    <option <?php if($data2->name == $data->categorie_name) {
                                        echo "selected";
                                    }?>>
                                    <?= $data2->name ?></option>

                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Valider</button>
                    </form>

                    <div class="w-100 mt-5"></div>
                <p><a href="listeProduits.php" class="btn btn-danger">&larr; Annuler et revenir à la liste des produits</a></p>
                </div>
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