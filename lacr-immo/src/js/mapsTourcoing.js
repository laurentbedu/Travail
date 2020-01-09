function initMapTourcoing(listener) {
    // les coordonnées

    let lacrImmoTourcoing = {
        lat: 50.722705,
        lng: 3.163409
    }; // 51-33 Rue de la Cloche, 59200 Tourcoing

    let offre3 = {
        lat: 50.731540,
        lng: 3.150666
    }; // 31 Rue de Roncq, 59200 Tourcoing

    let content = "<div class='text-center'><h5>Agence Lacr Immo</h5> <p><img src='../src/img/slider-1.jpg' class='img-thumbnail shadow-lg w-50' alt='Image caroussel 1'></p><p>51-33 Rue de la Cloche</p><p>59200 Tourcoing</p></div>";
    let content2 = "<div class='text-center'><h5>Offre n°3 - Appartement spacieux et lumineux</h5> <p><img src='../src/img/appartement1.jpg' class='img-thumbnail shadow-lg w-25' alt='Photo appartement 1'></p><p>31 Rue de Roncq</p><p>59200 Tourcoing</p></div>";

    let affichePlace = document.querySelector("#maps");

    let map = new google.maps.Map(affichePlace, {
        zoom: 13,
        center: offre3
    });

    let marker = new google.maps.Marker({
        position: lacrImmoTourcoing,
        icon: '../src/img/icone-lacr-immo-26.png',
        map: map
    });

    let marker2 = new google.maps.Marker({
        position: offre3,
        icon: '../src/img/icone-home-26.png',
        map: map
    });

    let infos = new google.maps.InfoWindow({
        content: content,
        position: lacrImmoTourcoing,
        pixelOffset: new google.maps.Size(0, -30)
    });

    let infos2 = new google.maps.InfoWindow({
        content: content2,
        position: offre3,
        pixelOffset: new google.maps.Size(0, -30)
    });

    marker.addListener("mouseover", () => {
        infos.open(map);
    });

    marker.addListener("mouseout", () => {
        infos.close(map);
    });

    marker2.addListener("mouseover", () => {
        infos2.open(map);
    });

    marker2.addListener("mouseout", () => {
        infos2.close(map);
    });

    // Itinéraire Agence - Offre 2
    let directionsService = new google.maps.DirectionsService();
    let directionsDisplay = new google.maps.DirectionsRenderer({ 'map': map });
    let request = {
        origin: lacrImmoTourcoing,
        destination: offre3,
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
    initMapTourcoing();
});