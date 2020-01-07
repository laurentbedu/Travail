$(function () {
    // Initialisation CSS Body
    $("body").css({ "font-family": "'Poppins', Arial, sans-serif", "overflow-x": "hidden" });
    $("#maps").css({ "width": "100%", "height": "400px" });

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

    $("#offreOne").on("click", function () {
        document.location.href = "view/offre-one.html";
    });

    $("#offreTwo").on("click", function () {
        document.location.href = "view/offre-two.html";
    });
    $("#offreThree").on("click", function () {
        document.location.href = "view/offre-three.html";
    });
});