// Using event delegation https://gomakethings.com/why-event-delegation-is-a-better-way-to-listen-for-events-in-vanilla-js/#web-performance
document.addEventListener(
  "click",
  function (event) {
    // Mobile Menu Toggle
    if (event.target.matches(".site-toggle")) {
      if (event.target.classList.contains("active")) {
        removeClass(".site-toggle, .site-nav-m", "active");
        removeClass("#page", "show-nav");
      } else {
        addClass(".site-toggle, .site-nav-m", "active");
        addClass("#page", "show-nav");
      }
    }
    if (event.target.matches("#site-nav-m .menu-item-has-children i")) {
      if (event.target.parentNode.classList.contains("active")) {
        event.target.parentNode.classList.remove("active");
      } else {
        event.target.parentNode.classList.add("active");
      }
    }
    // Close menu on click (useful for One Page Website)
    if (event.target.matches("#site-nav-m a")) {
      if (event.target.getAttribute("href") == "#") {
        if (event.target.parentNode.classList.contains("active")) {
          event.target.parentNode.classList.remove("active");
        } else {
          event.target.parentNode.classList.add("active");
        }
      } else {
        removeClass(".site-toggle, .site-nav-m", "active");
      }
    }
  },
  false
);

// Mobile Menu - Add Dropdown Toggle
document
  .querySelectorAll("#site-nav-m .menu-item-has-children")
  .forEach((e) => {
    e.insertAdjacentHTML("beforeend", '<i class="si-caret-down"></i>');
  });

// Slider
function s_slider() {
  var sliders = document.querySelectorAll(".s-slider");
  if (sliders) {
    for (var i = 0, len = sliders.length; i < len; i++) {
      var slider = sliders[i];
      var m_slide = 1;
      var d_slide = 0;
      var m_cener = false;
      for (var j = 0; j < slider.classList.length; j++) {
        slider_class = slider.classList.item(j);
        if (
          slider_class.substring(0, 2) === "-d" &&
          slider_class.substring(0, 4) != "-dot"
        ) {
          d_slide = slider_class.substring(2);
        } else {
          if (slider_class.substring(0, 2) === "-m") {
            m_slide = slider_class.substring(2);
            if (slider_class.substring(0, 4) === "-m1.") {
              m_cener = true;
            }
          }
        }
      }
      console.log(slider);
      console.log(m_slide + " " + d_slide);
      if (d_slide == 0) {
        d_slide = m_slide;
      }
      console.log(m_slide + " " + d_slide);
      var show = new KeenSlider(slider, {
        loop: true,
        slidesPerView: m_slide,
        centered: m_cener,
        breakpoints: {
          "(min-width: 992px)": {
            slidesPerView: d_slide,
            centered: false,
          },
        },
      });
    }
  }
}
s_slider();
//window.addEventListener("resize", s_slider);
