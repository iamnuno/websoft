/**
* A function to wrap it all in.
*/
(function () {
  'use strict';

  duck();
  flags();

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

function buttonOnClick() {
  console.log("Button clicked.");
  fetch('data/1290.json')
  .then((response) => {
    return response.json();
  })
  .then((myJson) => {
    var schools = myJson.Skolenheter;
    var table  = '<tr><th>Kommunkod</th><th>PeOrgNr</th><th>Skolenhetskod</th><th>Skolenhetsnamn</th></tr>';
    for (var i = 0; i < schools.length; i++) {
      table += "<tr><td>" + schools[i].Kommunkod + "</td><td>" + schools[i].PeOrgNr + "</td><td>" + schools[i].Skolenhetskod + "</td><td>" + schools[i].Skolenhetsnamn + '</td></tr>';
    }
    document.getElementById('table').innerHTML = table;
  });
}

function flags() {
  console.log("Flags started...");

  var france_link = document.getElementById("france_link");
  var italy = document.getElementById("italy_link");
  var belgium = document.getElementById("belgium_link");

  var france_flag = document.getElementById("france_flag");
  var italy_flag = document.getElementById("italy_flag");
  var belgium_flag = document.getElementById("belgium_flag");

  //show the flag when clicking the link
  france_link.addEventListener("click", function () {
    france_flag.style.opacity = "1";
  });
  italy.addEventListener("click", function () {
    italy_flag.style.opacity = "1";
  });
  belgium.addEventListener("click", function () {
    belgium_flag.style.opacity = "1";
  });

  //hide the flag when clicking the flag
  france_flag.addEventListener("click", function () {
    france_flag.style.opacity = "0";
  });
  italy_flag.addEventListener("click", function () {
    italy_flag.style.opacity = "0";
  });
  belgium_flag.addEventListener("click", function () {
    belgium_flag.style.opacity = "0";
  });
}
