<?php
require("connect.php");

$base = connect();

$sql = "SELECT P.id, P.name, P.price, P.description, P.image, Categories.name AS categorie_name FROM Products AS P
INNER JOIN Categories ON P.category_id = Categories.id
ORDER BY P.id";

$sqlModal = "SELECT id, name FROM Products";

$req = $base->prepare($sql);
$req->execute();

$req2 = $base->prepare($sqlModal);
$req2->execute();

?>

<!doctype html>
<html lang="fr">

<head>
    <title>Liste des produits</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="bg-dark">
    <?php include("header.php"); ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h2 class="text-center text-warning">LISTE DES PRODUITS</h2>
        </div>
        <hr>
        <div class="row">
            <table class="table table-warning">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Catégorie</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Description</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Prix</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($data = $req->fetchObject()) {
                    ?>
                        <tr>
                            <th scope="row"><?= $data->id ?></th>
                            <td><?= $data->categorie_name ?></td>
                            <td><?= $data->name ?></td>
                            <td><?= $data->description ?></td>

                            <td class="text-center"><img class="img-thumbnail" src="src/img/<?= $data->image ?>" alt="image du produit référencé <?= $data->id ?>" title="Produit référencé <?= $data->id ?>"></td>
                            <td><?php
                                $prix = $data->price;
                                echo number_format($prix, 2, ',', ' '); ?>€</td>
                            <td>
                                <div class="row justify-content-around">

                                    <a href="showDetail.php?idProduct=<?= $data->id ?>" class="btn btn-warning shadow-lg">
                                        Voir
                                    </a>

                                    <a href="modifier.php?idProduct=<?= $data->id ?>" class="btn btn-success shadow-lg">
                                        Modifier
                                    </a>

                                    <button class="btn btn-danger shadow-lg" data-toggle="modal" data-target="#modalSuppr">
                                        Supprimer
                    </button>
                                </div>
                            </td>
                        </tr>

                </tbody>
            <?php
                    }
            ?>
            </table>

        </div>
    </div>

    <!-- Modale suppression -->
    <?php
    while ($data2 = $req2->fetchObject()) {
    ?>
        <div class="modal fade" id="modalSuppr" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="suppression">Suppression d'un produit</h5>
                    </div>
                    <div class="modal-body">
                        <p>Êtes-vous sûr de vouloir supprimer le produit <?= $data2->name ?> - Référence <?= $data2->id ?> ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <a href="supprime.php?idProduct=<?= $data2->id ?>" class="btn btn-danger">Confirmer</a>
                    </div>
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