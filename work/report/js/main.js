/**
* A function to wrap it all in.
*/
(function () {
  'use strict';

  duck();
  flags();
  municipalities();

}());

function duck() {
  console.log('Duck start...');

  var body = document.getElementById('body');
  var duck = document.getElementById('duck');

  toggleVisibilityTimer(duck);

  duck.addEventListener('click', function () {
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

function flags() {
  console.log('Flags started...');

  var france = document.getElementById('france_link');
  var italy = document.getElementById('italy_link');
  var belgium = document.getElementById('belgium_link');

  var france_flag = document.getElementById('france_flag');
  var italy_flag = document.getElementById('italy_flag');
  var belgium_flag = document.getElementById('belgium_flag');

  //show the flag when clicking the link
  if (france !== null) {
    france.addEventListener('click', function () {
      france_flag.style.opacity = '1';
    });
  }
  if (italy !== null) {
    italy.addEventListener('click', function () {
      italy_flag.style.opacity = '1';
    });
  }
  if (belgium !== null) {
    belgium.addEventListener('click', function () {
      belgium_flag.style.opacity = '1';
    });
  }

  //hide the flag when clicking the flag
  if (france_flag !== null) {
    france_flag.addEventListener('click', function () {
      france_flag.style.opacity = '0';
    });
  }
  if (italy_flag !== null) {
    italy_flag.addEventListener('click', function () {
      italy_flag.style.opacity = '0';
    });
  }
  if (belgium_flag !== null) {
    belgium_flag.addEventListener('click', function () {
      belgium_flag.style.opacity = '0';
    });
  }
}

function municipalities() {
  console.log('Fetch kommuner.');
  fetch('data/kommun.json')
  .then((response) => {
    return response.json();
  })
  .then((myJson) => {
    var kommuner = myJson.Kommuner;
    var select = "<option value='default'>Choose kommun...</option>"
    for (var i = 0; i < kommuner.length; i++) {
      select += "<option value='" + kommuner[i].Namn + "'>" + kommuner[i].Namn + "</option>"
    }
    document.getElementById('kommuner').innerHTML = select;
  });

  var selectKommuner = document.getElementById('kommuner');
  selectKommuner.addEventListener('change', (event) => {

    if (event.target.value == 'default') {
      document.getElementById('table').innerHTML = '';
    } else {
      fecthSchools(event.target.value);
    }

  });
}

function fecthSchools(kommuner) {
  var kommunCode = '';

  if (kommuner === 'Kristianstad') {
    kommunCode = '1290';
  } else if (kommuner === 'Malmö') {
    kommunCode = '1280';
  } else if (kommuner === 'Stockholm') {
    kommunCode = '0180';
  }

  fetch('data/' + kommunCode + '.json')
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
