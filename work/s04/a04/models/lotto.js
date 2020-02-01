/**
*  @author Nuno Cunha
*/
'use strict'

class Lotto {

    constructor() {
        this.lotto = null;
    }

    draw() {
      let numbers = [];

      while (numbers.length != 7) {
        let number = Math.floor((Math.random() * 35) + 1);
        if (!numbers.includes(number)) {
          numbers[numbers.length] = number;
        }
      }

      return numbers;
    }
}

module.exports = Lotto;
