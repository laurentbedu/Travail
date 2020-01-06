$(function(){
    // Initialisation CSS Body
    $("body").css({"font-family": "'Poppins', Arial, sans-serif", "overflow-x": "hidden"});

    // Méthodes opacité sur "Agence au passage de la souris"
    $(".modalAgency").on("mouseover", function(){
    let style = {
        cursor: "pointer",
        opacity: 0.6
    };
        $(this).css(style);
    });
    $(".modalAgency").on("mouseleave", function(){
        $(".modalAgency").css("opacity", "1");
    });
});