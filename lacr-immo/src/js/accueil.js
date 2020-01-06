$(function(){
    // Initialisation CSS Body
    $("body").css({"font-family": "'Poppins', Arial, sans-serif", "overflow-x": "hidden"});

    // Méthodes opacité sur "Agence" et "Mentions légales" au passage de la souris
    $(".modalAgency, .modalLegalNotice").on("mouseover", function(){
    let style = {
        cursor: "pointer",
        opacity: 0.6
    };
        $(this).css(style);
    });
    $(".modalAgency, .modalLegalNotice").on("mouseleave", function(){
        $(this).css("opacity", "1");
    });
});