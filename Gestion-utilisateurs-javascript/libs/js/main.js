class Utilisateur {
    constructor(nom, prenom) {
        this.nom = nom;
        this.prenom = prenom;
    }
    affiche() {
        alert("Nom : " + this.nom + "\nPrenom : " + this.prenom);
    }

    fusionUtilisateur(nomUtilisateur, prenomUtilisateur) {
        let fusion = nomUtilisateur.concat(", " + prenomUtilisateur);
        return fusion;
    }

    ajoutDansTableau(chaineComplete) {
        let tableauUtilisateurs = [];
        tableauUtilisateurs.push(chaineComplete);
        return tableauUtilisateurs;
    }
}

let ajoutUtilisateur = new Utilisateur(nom, prenom);

let fusion = ajoutUtilisateur.fusionUtilisateur(nom, prenom);
let tableauDesUtilisateurs = ajoutUtilisateur.ajoutDansTableau(fusion);

ajoutUtilisateur.affiche();

console.log(tableauDesUtilisateurs);