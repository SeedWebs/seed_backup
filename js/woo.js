// For WooCommerce jQuery
jQuery(document).ready(function ($) {
  /* Auto Update Cart */
  $("div.woocommerce").on("change", ".qty", function () {
    $('[name="update_cart"]').prop("disabled", false);
    $('[name="update_cart"]').trigger("click");
  });
  /* Plus Minus buttons */
  if (!String.prototype.getDecimals) {
    String.prototype.getDecimals = function () {
      var num = this,
        match = ("" + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
      if (!match) {
        return 0;
      }
      return Math.max(
        0,
        (match[1] ? match[1].length : 0) - (match[2] ? +match[2] : 0)
      );
    };
  }
  // Quantity "plus" and "minus" buttons
  $(document.body).on("click", ".btn-plus, .btn-minus", function () {
    var $qty = $(this).closest(".quantity").find(".qty"),
      currentVal = parseFloat($qty.val()),
      max = parseFloat($qty.attr("max")),
      min = parseFloat($qty.attr("min")),
      step = $qty.attr("step");

    // Format values
    if (!currentVal || currentVal === "" || currentVal === "NaN")
      currentVal = 0;
    if (max === "" || max === "NaN") max = "";
    if (min === "" || min === "NaN") min = 0;
    if (
      step === "any" ||
      step === "" ||
      step === undefined ||
      parseFloat(step) === "NaN"
    ) {
      step = 1;
    }

    // Change the value
    if ($(this).is(".btn-plus")) {
      if (max && currentVal >= max) {
        $qty.val(max);
      } else {
        $qty.val((currentVal + parseFloat(step)).toFixed(step.getDecimals()));
      }
    } else {
      if (min && currentVal <= min) {
        $qty.val(min);
      } else if (currentVal > 0) {
        $qty.val((currentVal - parseFloat(step)).toFixed(step.getDecimals()));
      }
    }

    // Trigger change event
    $qty.trigger("change");
  });
});
