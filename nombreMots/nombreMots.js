//Exercice :
let phrase = "Oui, j'aime a faire apprendre un nombre utile aux sages.";
let mots = phrase.split(" ");
console.log(mots);

//écrire une fonction qui à partir d'une phrase passée en paramètre
// renvoi le tableau des mots qui la composent
// sans utiliser la fonction split
// indices :
// une chaine est un tableau de caractères
// utiliser une boucle for pour parcourir la chaine
// utiliser la méthode push pour ajouter un élément dans un tableau

function getWords(text) {
    let result = [];
    //...

    return result;
}

nettoyer = phrase.replace(/\.|'|,/g, ' ');



console.log(nettoyer);

let delim = ' ', tableauMots=[];

for(let i = 0; i < nettoyer.length; i++) {
    let idx = nettoyer.indexOf(delim);
    if(idx === -1) {
        tableauMots.push(nettoyer);
    } else {
        tableauMots.push(nettoyer.substring(0, idx));
        nettoyer = nettoyer.substring(idx + delim.length)
    }
} 
console.log(tableauMots);