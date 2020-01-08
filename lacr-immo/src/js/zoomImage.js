$(function() {
    $("#modalZoomImage").css({
        "display": "none",
        "position": "fixed",
        "overflow-y": "auto",
        "box-sizing": "border-box",
        "top": "0",
        "left": "0",
        "right": "0",
        "bottom": "0",
        "background-color": "rgba(100, 100, 100, .8)",
        "z-index": "20"
    });
    $("#fermerZoomImage, #zoomImage").on("mouseover", function () {
        let style = {
            cursor: "pointer",
            opacity: 0.6
        };
        $(this).css(style);
    });
    $("#fermerZoomImage, #zoomImage").on("mouseleave", function () {
        $(this).css("opacity", "1");
    });

    $('#zoomImage').on('click', function () {
        $('#modalZoomImage').fadeIn('slow');
    });

    $('#fermerZoomImage').on('click', function () {
        $('#modalZoomImage').fadeOut('slow');
    });
});
