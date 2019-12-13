class Utilisateur {
    constructor(id, nom, prenom) {
        this.id = id;
        this.nom = nom;
        this.prenom = prenom;
    }
    affiche(){
        $("#afficheLigne").append("<tr><th scope='row'>" + this.id + "</th>" + "<td>" + this.nom + "</td>" + "<td>" + this.prenom + "</td>");
    }
    
}

function ajoutUtilisateur(id, nom, prenom) {
    let newUtilisateur = new Utilisateur(id, nom, prenom);
    return newUtilisateur;
}

function tableauUtilisateurs(utilisateurSaisi) {
    let stock = [];
    stock.push(utilisateurSaisi);
    return stock;
}


let utilisateurEnr = ajoutUtilisateur(1, 'BROUET', 'Thierry');
let utilisateurEnr2 = ajoutUtilisateur(2, 'BROUET', 'Amandine');

let stockUtilisateurs = tableauUtilisateurs(utilisateurEnr);
stockUtilisateurs = tableauUtilisateurs(utilisateurEnr2);

console.log(stockUtilisateurs);

for(items of stockUtilisateurs) {
    items.affiche();
}


