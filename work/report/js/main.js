/**
 * A function to wrap it all in.
 */
(function () {
    "use strict";

    console.log("Duck start...");
    var element = document.getElementById("duck");

    element.addEventListener("click", function () {
        console.log("Duck clicked.");
        var left = getPosition(element).left;
        if (left + element.width + (element.width / 2) < window.innerWidth) {
          element.style.left = element.offsetLeft + 150 +'px';
        }
    });
}());

function getPosition(element) {
  const rect = element.getBoundingClientRect();
  return {
    left: rect.left + window.scrollX,
    top: rect.top + window.scrollY
  };
}
