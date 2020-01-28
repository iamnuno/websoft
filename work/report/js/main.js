/**
* A function to wrap it all in.
*/
(function () {
  "use strict";

  duck();
}());

function duck() {
  console.log("Duck start...");

  var body = document.getElementById("body");
  var duck = document.getElementById("duck");

  toggleVisibilityTimer(duck);

  duck.addEventListener("click", function () {
    var duck_xPos = get_xPosition(duck);
    var duck_width = duck.offsetWidth;
    var body_width = body.offsetWidth;
    var moveRightPx = 15;
    if (duck_xPos + duck_width + moveRightPx < body_width) {
      duck.style.left = duck.offsetLeft + moveRightPx +'px';
    }
  });
}

function toggleVisibilityTimer(element) {
  setInterval (function () {
    if (element.style.visibility === 'hidden') {
      element.style.visibility = 'visible';
    } else {
      element.style.visibility = 'hidden';
    }
  }, 5000);
}

function get_xPosition(element) {
  const rect = element.getBoundingClientRect();
  return rect.left + window.scrollX;
}
