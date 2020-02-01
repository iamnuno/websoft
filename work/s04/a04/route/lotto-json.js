/**
*  @author Nuno Cunha
*/
'use strict';

const express = require('express')
const Lotto = require('../models/lotto.js');;
const router  = express.Router();

router.get("/", (req, res) => {

  res.json(handleRequest(req));

});

function handleRequest(req) {

  let reply = new Object;
  reply.drawnNumbers = new Lotto().draw();

  if (req.query.row != null) {
    reply.playerNumbers = convertToArrayInt(req.query.row);
    reply.totalMatches = compare(reply.drawnNumbers, reply.playerNumbers);
  }

  return reply;
}

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
