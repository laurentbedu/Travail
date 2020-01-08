function initMapRoubaix(listener) {
    // les coordonnées

    let lacrImmoRoubaix = {
        lat: 50.690071,
        lng: 3.174607
    }; // 14 Rue du Château, 59100 Roubaix

    let offre2 = {
        lat: 50.675829,
        lng: 3.196097
    }; // Cour Planchon, 59100 Roubaix

    let content = "<div class='text-center'><h5>Agence Lacr Immo</h5> <p><img src='../src/img/slider-1.jpg' class='img-thumbnail shadow-lg w-50' alt='Image caroussel 1'></p><p>14 Rue du Château</p><p>59100 Roubaix</p></div>";
    let content2 = "<div class='text-center'><h5>Offre n°2 - Jolie maison individuelle</h5> <p><img src='../src/img/maison2.jpg' class='img-thumbnail shadow-lg w-25' alt='Photo maison 2'></p><p>Cour Planchon</p><p>59100 Roubaix</p></div>";

    let affichePlace = document.querySelector("#maps");

    let map = new google.maps.Map(affichePlace, {
        zoom: 13,
        center: offre2
    });

    let marker = new google.maps.Marker({
        position: lacrImmoRoubaix,
        icon: '../src/img/icone-lacr-immo-26.png',
        map: map
    });

    let marker2 = new google.maps.Marker({
        position: offre2,
        icon: '../src/img/icone-home-26.png',
        map: map
    });

    let infos = new google.maps.InfoWindow({
        content: content,
        position: lacrImmoRoubaix,
        pixelOffset: new google.maps.Size(0, -30)
    });

    let infos2 = new google.maps.InfoWindow({
        content: content2,
        position: offre2,
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
        origin: lacrImmoRoubaix,
        destination: offre2,
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
    initMapRoubaix();
});