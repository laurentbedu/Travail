    function initMap(listener) {
        // les coordonnées
        let lacrImmo = {
            lat: 50.4245,
            lng: 2.7738
        };

        let offre1 = {
            lat: 50.416815,
            lng: 2.767052
        }

        let content = "<div class='text-center'><h5>Agence Lacr Immo</h5> <p><img src='../src/img/slider-1.jpg' class='img-thumbnail shadow-lg w-75' alt='Image caroussel 1'></p><p>Rue du Mal Delattre de Tassigny</p><p>62100 Lievin</p></div>";
        let content2 = "<div class='text-center'><h5>Offre n°1 - Grande maison pavillonaire</h5> <p><img src='../src/img/maison1.jpg' class='img-thumbnail shadow-lg w-75' alt='Photo maison 1'></p><p>41 Rue Henri Martin</p><p>62100 Lievin</p></div>";

        let affichePlace = document.querySelector("#maps");

        let map = new google.maps.Map(affichePlace, {
            zoom: 13,
            center: offre1
        });

        let marker = new google.maps.Marker({
            position: lacrImmo, offre1,
            map: map
        });

        let marker2 = new google.maps.Marker({
            position: offre1,
            map: map
        });

        let infos = new google.maps.InfoWindow({
            content: content,
            position: lacrImmo
        });

        let infos2 = new google.maps.InfoWindow({
            content: content2,
            position: offre1
        });

        marker.addListener("click", () => {
            infos.open(map);
        });

        marker2.addListener("click", () => {
            infos2.open(map);
        });
    }
$(function() {
    initMap();
});







