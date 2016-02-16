/**
 * Created by 鹏飞 on 2016/2/14.
 */
var shop_cart = new Vue({
  el: '#cart_form',
  data: {
    cart: [
      {
        name: '易折清洁消毒棒',
        detail: '一次性使用无菌注射针',
        price: 22.00,
        priceBefore: 30.00,
        num: 1,
      },
      {
        name: '易折清洁消毒棒2',
        detail: '一次性使用无菌注射针',
        price: 22.00,
        priceBefore: 30.00,
        num: 1,
      },
      {
        name: '易折清洁消毒棒3',
        detail: '一次性使用无菌注射针',
        price: 22.00,
        priceBefore: 30.00,
        num: 1,
      }
    ],
    person: {
      beans: 900,
      consume: 0,
    }
  },

  computed: {
    priceAll: function () {
      var all = 0;
      for (i = 0; i < this.cart.length; i++) {
        all += this.cart[i].price * this.cart[i].num;
      }
      return all;
    },
    priceDiscount: function () {
      if (this.person.consume > this.person.beans || this.person.consume > this.priceAll * 100) {
        this.person.consume =
          this.person.beans < this.priceAll * 100 ? this.person.beans : this.priceAll * 100;
      }
      return this.person.consume / 100;
    },
    priceCount: function () {
      return this.priceAll + 8 - this.priceDiscount;
    }

  },

  methods: {
    removeGoods: function (e) {
      this.cart.$remove(e);
    },
    priceGoods: function (e) {
      return e.price * e.num;
    },
    numMinus: function (e) {
      if (e.num >= 2) {
        e.num--;
      }
    },
    numAdd: function (e) {
      if (e.num <= 98) {
        e.num++;
      }
    },
    beansConsume: function () {
    },
  }
});

