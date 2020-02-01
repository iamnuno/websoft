/**
*  @author Nuno Cunha
*/
'use strict';

const express = require('express')
const Lotto = require('../models/lotto.js');;
const router  = express.Router();

router.get("/", (req, res) => {

    let data = {};

    data.draw  = new Lotto().draw();
    if (req.query.row != null) {
      data.numbers  = convertToArrayInt(req.query.row);
      data.matches = compare(data.draw, data.numbers);
    } else {
      data.numbers = ['','','','','','',''];
      data.matches = '';
    }

    res.render("lotto", data);


});

function convertToArrayInt(queryString) {
  let result = queryString.split(',');
  for (let i in result) {
    result[i] = parseInt(result[i], 10);
  }
  return result;
}

function compare(drawnNumbers, playerNumbers) {
  let totalMatches = 0;
  if (playerNumbers.length === 7) {
    for (let i = 0; i < playerNumbers.length; i++) {
      for (let j = 0; j < drawnNumbers.length; j++) {
        if (playerNumbers[i] === drawnNumbers[j]) {
          totalMatches++;
        }
      }
    }
  }
  return totalMatches;
}

module.exports = router;
