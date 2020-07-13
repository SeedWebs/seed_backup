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
    if (event.target.matches("#site-nav-m .menu-item-has-children > svg")) {
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
    // Search
    if (event.target.matches(".site-search")) {
      document.getElementById("s").focus();
    }
    // Close Search Modal
    if (event.target.matches(".s-modal-close")) {
      document.getElementById("s").blur();
    }
  },
  false
);

// Mobile Menu - Add Dropdown Toggle
document
  .querySelectorAll("#site-nav-m .menu-item-has-children")
  .forEach((e) => {
    e.insertAdjacentHTML(
      "beforeend",
      '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>'
    );
  });

// Slider
function createSlider(slider_id, view_m, view_d, center_m, center_d) {
  var slider_wrapper = document.getElementById(slider_id);
  var content = slider_wrapper.innerHTML;
  new_content = "<div class='slider-area'>" + content + "</div>";
  slider_wrapper.innerHTML = new_content;
  var slider = slider_wrapper.getElementsByClassName("slider-area")[0];
  var show = new KeenSlider(slider, {
    loop: true,
    slides: ".slider",
    slidesPerView: view_m,
    centered: center_m,
    breakpoints: {
      "(min-width: 992px)": {
        slidesPerView: view_d,
        centered: center_d,
      },
    },
    created: function (instance) {
      var nav_wrapper = document.createElement("div");
      var nav_prev = document.createElement("a");
      var nav_next = document.createElement("a");
      nav_wrapper.classList.add("nav");
      nav_prev.classList.add("prev");
      nav_next.classList.add("next");
      slider_wrapper.appendChild(nav_wrapper);
      nav_wrapper.appendChild(nav_prev);
      nav_wrapper.appendChild(nav_next);
      slider_wrapper
        .getElementsByClassName("prev")[0]
        .addEventListener("click", function () {
          instance.prev();
        });
      slider_wrapper
        .getElementsByClassName("next")[0]
        .addEventListener("click", function () {
          instance.next();
        });
      var dots_wrapper = document.createElement("div");
      dots_wrapper.classList.add("dots");
      slider_wrapper.appendChild(dots_wrapper);
      var slides = slider.querySelectorAll(".slider");
      slides.forEach(function (t, idx) {
        var dot = document.createElement("a");
        dot.classList.add("dot");
        dots_wrapper.appendChild(dot);
        dot.addEventListener("click", function (event) {
          instance.moveToSlide(idx);
        });
      });
      updateClasses(instance);
    },
    slideChanged(instance) {
      updateClasses(instance);
    },
  });
  function updateClasses(instance) {
    var slide = instance.details().relativeSlide;
    var dots = slider_wrapper.querySelectorAll(".dot");
    dots.forEach(function (dot, idx) {
      idx === slide
        ? dot.classList.add("active")
        : dot.classList.remove("active");
    });
  }
}

var sliders = document.querySelectorAll(".s-slider");
if (sliders) {
  for (var i = 0, len = sliders.length; i < len; i++) {
    var slider = sliders[i];
    var slider_id = "s-slider-" + i;
    slider.setAttribute("id", slider_id);
    var view_m = 1;
    var view_d = 0;
    var center_m = false;
    var center_d = false;
    for (var j = 0; j < slider.classList.length; j++) {
      slider_class = slider.classList.item(j);
      if (
        slider_class.substring(0, 2) === "-d" &&
        slider_class.substring(0, 4) != "-dot"
      ) {
        view_d = slider_class.substring(2);
      } else {
        if (slider_class.substring(0, 2) === "-m") {
          view_m = slider_class.substring(2);
        }
      }
      if (slider_class.substring(0, 9) === "-center-m") {
        center_m = true;
      }
      if (slider_class.substring(0, 9) === "-center-d") {
        center_d = true;
      }
    }
    if (view_d == 0) {
      view_d = view_m;
    }
    createSlider(slider_id, view_m, view_d, center_m, center_d);
  }
}
