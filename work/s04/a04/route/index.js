/**
*@author Nuno Cunha
*/
'use strict';

var express = require('express');
var router  = express.Router();

// Add a route for the path /
router.get('/', (req, res) => {
    res.redirect('report.html');
});

module.exports = router;
