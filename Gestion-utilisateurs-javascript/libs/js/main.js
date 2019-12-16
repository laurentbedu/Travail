$(function () {

    // Constructeur de l'objet Utilisateur
    class Utilisateur {
        constructor(id, nom, prenom) {
            this.id = id;
            this.nom = nom;
            this.prenom = prenom;
        }
        // Insertion des nouveaux utilisateurs dans un tableau
        tableauUtilisateurs() {
            stockUtilisateurs.push(utilisateurEnr);
        }
        // Affiche la liste des utilisateurs dans un tableau
        affiche() {
            $("#afficheLigne").html("<tr><th scope='row'>" + this.id + "</th>" + "<td>" + this.nom + "</td>" + "<td>" + this.prenom + "</td>");
        }
    }

    // On instancie un nouvel utilisateur
    function ajoutUtilisateur(id, nom, prenom) {
        let newUtilisateur = new Utilisateur(id, nom, prenom);
        return newUtilisateur;
    }

    // Initialisation des variables
    let idUtilisateur, nom, prenom, utilisateurEnr, stockUtilisateurs = [];

    // Reset les inputs
    $("#nouveau").on("click", function () {
        $("form :input").val("");
        $("#enregistre").toggleClass("d-none");
        $("#afficheVide").toggleClass("d-none");
    })

    // Enregistrement de l'utilisateur
    $("#envoyer").on("click", function () {
        idUtilisateur = $("#idUtilisateur:input").val();
        nom = $("#nom:input").val();
        prenom = $("#prenom:input").val();

        utilisateurEnr = ajoutUtilisateur(idUtilisateur, nom, prenom);

        utilisateurEnr.tableauUtilisateurs();

        $("#enregistre").toggleClass("d-none");
    })

    // Affichage des utilisateurs dans un tableau
    $("#afficher").on("click", function () {
        for (let i = 0; i < stockUtilisateurs.length; i++) {
            stockUtilisateurs[i].affiche();
        }
    })

    // Efface toutes les données
    $("#vider").on("click", function(){
        stockUtilisateurs = [];
        $("#afficheVide").toggleClass("d-none");
    })
})



