/* skip-link-focus-fix.js - https://git.io/vWdr2 */
!function(){var e=navigator.userAgent.toLowerCase().indexOf("webkit")>-1,t=navigator.userAgent.toLowerCase().indexOf("opera")>-1,n=navigator.userAgent.toLowerCase().indexOf("msie")>-1;(e||t||n)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var e,t=location.hash.substring(1);/^[A-z0-9_-]+$/.test(t)&&(e=document.getElementById(t))&&(/^(?:a|select|input|button|textarea)$/i.test(e.tagName)||(e.tabIndex=-1),e.focus())},!1)}();

/* Fluid width video - https://css-tricks.com/fluid-width-video/ */
!function(e,t,r){"use strict";var i=t.querySelectorAll(['iframe[src*="youtube.com"]','iframe[src*="vimeo.com"]'].join(","));if(i.length)for(var o=0;o<i.length;o++){var a=i[o],m=a.getAttribute("width"),n=a.getAttribute("height")/m,d=a.parentNode,c=t.createElement("div");c.className="fitVids-wrapper",c.style.paddingBottom=100*n+"%",d.insertBefore(c,a),a.remove(),c.appendChild(a),a.removeAttribute("height"),a.removeAttribute("width")}}(window,document);

/* Manage Class Funtions https://www.sitepoint.com/add-remove-css-class-vanilla-js/ */
function addClass(e,l){var elements=document.querySelectorAll(e);for(var s=0;s<elements.length;s++)elements[s].classList.add(l)}function removeClass(e,l){var elements=document.querySelectorAll(e);for(var s=0;s<elements.length;s++)elements[s].classList.remove(l)}

/*  Seed Modal from https://codepen.io/kimpetersend1/pen/LajgaW */
const modalTriggers=document.querySelectorAll(".s-modal-trigger"),bodyBlackout=document.querySelector(".s-modal-bg"),allModals=document.querySelectorAll(".s-modal");modalTriggers.forEach(e=>{e.addEventListener("click",()=>{const{popupTrigger:l}=e.dataset,o=document.querySelector(`[data-s-modal="${l}"]`);o.classList.add("-visible"),bodyBlackout.classList.add("-blacked-out"),o.querySelector(".s-modal-close").addEventListener("click",()=>{o.classList.remove("-visible"),bodyBlackout.classList.remove("-blacked-out")})})}),bodyBlackout.addEventListener("click",()=>{bodyBlackout.classList.remove("-blacked-out"),allModals.forEach(function(e,l){e.classList.remove("-visible")})});
