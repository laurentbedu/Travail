<!doctype html>
<html lang="fr">
  <head>
    <title>Création d'un produit</title>
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
                    <h2 class="text-center text-warning">Création d'un produit</h2>
                </div>
            </div>
            <hr>
            <div class="row border p-5 rounded-lg bg-light">
                <div class="col">
                    <form class="border w-50 mx-auto p-5 bg-white shadow-lg" method="post" action="traitementCreer.php">
                        
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" name="name" placeholder="Saisir un nom" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Saisir une description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="prix">Prix</label>
                            <input type="text" class="form-control" id="prix" name="prix" placeholder="Saisir un prix" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="text" class="form-control" id="image" name="image" placeholder="Nom de l'image + son extension">
                        </div>
                        <div class="form-group">
                            <label for="categorie">Catégorie</label>
                            <select class="form-control" name="categorie" id="categorie">
                                <option value="1">Fashion</option>
                                <option value="2">Electronics</option>
                                <option value="3">Motors</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Valider</button>
                    </form>

                    <div class="w-100 mt-5"></div>
                <p><a href="listeProduits.php" class="btn btn-danger">&larr; Annuler et revenir à la liste des produits</a></p>
                </div>
            </div>
        </div>

    
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
