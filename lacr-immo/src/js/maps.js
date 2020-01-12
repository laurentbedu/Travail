// Script d'affichage de la carte openStreetMap

// On initialise la latitude et la longitude de l'Agence et du bien
let latAgence = 50.4245;
let lonAgence = 2.7738;
let latBien = 50.41615;
let lonBien = 2.767052;
let macarte = null;

// Fonction d'initialisation de la carte
function initMap() {

    // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
    macarte = L.map('maps').setView([latAgence, lonAgence], 10);

    // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        // Il est toujours bien de laisser le lien vers la source des données
        attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>&nbsp&nbsp',
        minZoom: 10,
        maxZoom: 18
    }).addTo(macarte);

    L.Routing.control({
        show: false, // n'affiche pas l'itinéraire
        language: 'fr',
		formatter: new L.Routing.Formatter({
			language: 'fr' 
		}),

        // Itinéraire
        waypoints: [
          L.latLng(latAgence, lonAgence),
          L.latLng(latBien, lonBien)
        ]
      }).addTo(macarte);

    // Marqueur agence
    let iconeAgence = L.icon({
        iconUrl: '../src/img/icone-lacr-immo.png',
        iconSize: [65, 65],
        iconAnchor: [32, 60],
        popupAnchor: [-1, -60]
    });

    let markerAgence = L.marker([latAgence, lonAgence], {icon: iconeAgence}).addTo(macarte);
    
    markerAgence.on("mouseover", () => {
        markerAgence.bindPopup("<div class='text-center'><h5>Agence Lacr Immo</h5> <p><img src='../src/img/slider-1.jpg' class='img-thumbnail shadow-lg' alt='Image caroussel 1'></p><p>Rue du Mal Delattre de Tassigny</p><p>62100 Lievin</p></div>").openPopup();
    });

    markerAgence.on("mouseout", () => {
        markerAgence.closePopup();
    });

    // Marqueur Bien
    let iconeBien = L.icon({
        iconUrl: '../src/img/icone-bien.png',
        iconSize: [65, 65],
        iconAnchor: [32, 60],
        popupAnchor: [-1, -60]
    });


    let markerBien = L.marker([latBien, lonBien], {icon: iconeBien}).addTo(macarte);
    
    markerBien.on("mouseover", () => {
        markerBien.bindPopup("<div class='text-center'><h5>Offre n°1 - Grande maison pavillonaire</h5> <p><img src='../src/img/maison1.jpg' class='img-thumbnail shadow-lg w-25' alt='Photo maison 1'></p><p>41 Rue Henri Martin</p><p>62100 Lievin</p></div>").openPopup();
    });

    markerBien.on("mouseout", () => {
        markerBien.closePopup();
    });
    
}

$(function () {
    // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
    initMap();
});