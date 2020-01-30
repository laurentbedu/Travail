<?php
require("connect.php");

$base = connect();

$sql = "SELECT P.id, P.name, P.price, P.description, P.image, Categories.name AS categorie_name FROM Products AS P
INNER JOIN Categories ON P.category_id = Categories.id
ORDER BY P.id";

$req = $base->prepare($sql);
$req->execute();

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

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h1 class="text-center">LISTE DES PRODUITS</h1>
        </div>
        <hr>
        <div class="row">
            <table class="table table-dark W-75">
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

                                    <a href="showDetail.php?idProduct=<?= $data->id ?>">
                                        <button type="button" class="btn btn-primary shadow-lg">Voir</button>
                                    </a>

                                    <a href="modifier.php?idProduct=<?= $data->id ?>">
                                        <button type="button" class="btn btn-success shadow-lg">Modifier</button>
                                    </a>

                                    <a href="supprime.php?idProduct=<?= $data->id ?>">
                                        <button type="button" class="btn btn-danger shadow-lg">Supprimer</button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>