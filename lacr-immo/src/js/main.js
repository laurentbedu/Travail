$(function () {
    // Initialisation CSS Body
    $("body").css({ "font-family": "'Poppins', Arial, sans-serif", "overflow-x": "hidden" });
    $("#slogan").css("font-family", "'Ma Shan Zheng', cursive, Arial, sans-serif");
    $("#maps").css({ "width": "100%", "height": "400px","z-index": "1" });
    $("#modalZoomImage").css("z-index", "9999");

    // Méthodes opacité sur "Agence" et "Mentions légales" au passage de la souris
    $(".modalAgency, .modalLegalNotice").on("mouseover", function () {
        let style = {
            cursor: "pointer",
            opacity: 0.6
        };
        $(this).css(style);
    });
    $(".modalAgency, .modalLegalNotice").on("mouseleave", function () {
        $(this).css("opacity", "1");
    });

    // Redirection au clic sur les différentes pages
    $("#offreOne").on("click", function () {
        document.location.href = "view/offre-one.html";
    });

    $("#offreTwo").on("click", function () {
        document.location.href = "view/offre-two.html";
    });
    $("#offreThree").on("click", function () {
        document.location.href = "view/offre-three.html";
    });

    $("#btnOffre1, #btnOffre2, #btnOffre3").on("click", function () {
        document.location.href = "../view/contact.html";
    });


});