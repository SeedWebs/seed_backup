// Mobile Menu
document.querySelectorAll(".site-toggle").forEach(e => {
    e.addEventListener("click", function() {
        if (e.classList.contains("active")) {
            removeClass(".site-toggle", "active");
            removeClass(".site-nav-m", "active");
            removeClass("#page", "show-nav");
        } else {
            addClass(".site-toggle", "active");
            addClass(".site-nav-m", "active");
            addClass("#page", "show-nav");
        }
    });
});
// Close menu on click (useful for One Page Website)
document.querySelectorAll(".site-nav-m a").forEach(e => {
    e.addEventListener("click", function() {
        removeClass(".site-toggle", "active");
        removeClass(".site-nav-m", "active");
    });
});

// Slider
var sliders = document.querySelectorAll(".s-slider");
if (sliders) {
    for (var i = 0, len = sliders.length; i < len; i++) {
        var slider = sliders[i];
        if (slider.classList.contains("-togrid")) {
            var flkty = new Flickity(slider, {
                cellAlign: "left",
                contain: true,
                wrapAround: true,
                imagesLoaded: true,
                watchCSS: true
            });
        } else {
            var flkty = new Flickity(slider, {
                cellAlign: "left",
                contain: true,
                wrapAround: true,
                imagesLoaded: true
            });
        }
    }
}
