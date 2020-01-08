function initMap(listener) {
    // les coordonnées
    let lacrImmo = {
        lat: 50.4245,
        lng: 2.7738
    };

    let offre1 = {
        lat: 50.416815,
        lng: 2.767052
    };

        let content = "<div class='text-center'><h5>Agence Lacr Immo</h5> <p><img src='../src/img/slider-1.jpg' class='img-thumbnail shadow-lg w-75' alt='Image caroussel 1'></p><p>Rue du Mal Delattre de Tassigny</p><p>62100 Lievin</p></div>";
    let content2 = "<div class='text-center'><h5>Offre n°1 - Grande maison pavillonaire</h5> <p><img src='../src/img/maison1.jpg' class='img-thumbnail shadow-lg w-75' alt='Photo maison 1'></p><p>41 Rue Henri Martin</p><p>62100 Lievin</p></div>";

    let affichePlace = document.querySelector("#maps");

    let map = new google.maps.Map(affichePlace, {
        zoom: 13,
        center: offre1
    });

    let marker = new google.maps.Marker({
        position: lacrImmo,
        icon: '../src/img/icone-lacr-immo-26.png',
        map: map
    });

    let marker2 = new google.maps.Marker({
        position: offre1,
        icon: '../src/img/icone-home-26.png',
        map: map
    });

    let infos = new google.maps.InfoWindow({
        content: content,
        position: lacrImmo,
        pixelOffset: new google.maps.Size(0,-30)
    });

    let infos2 = new google.maps.InfoWindow({
        content: content2,
        position: offre1
    });

    marker.addListener("click", () => {
        infos.open(map);
    });

    marker.addListener("mouseover", () => {
        infos.open(map);
    });

    marker.addListener("mouseout", () => {
            infos.close(map);
    });

    marker2.addListener("click", () => {
        infos2.open(map);
    });

    // Itinéraire Agence - Offre
    let directionsService = new google.maps.DirectionsService();
    let directionsDisplay = new google.maps.DirectionsRenderer({ 'map': map });
    let request = {
        origin: lacrImmo,
        destination: offre1,
        travelMode: google.maps.DirectionsTravelMode.DRIVING,
        unitSystem: google.maps.DirectionsUnitSystem.METRIC
    };
    directionsService.route(request, function (response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
            directionsDisplay.setOptions({ 'suppressMarkers': true });
        }
    });
}

$(function () {
    initMap();
});







