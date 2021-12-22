class Arithmetic {
  constructor(a, b) {
    this.a = a;
    this.b = b;
  }

  get getSum() {
    return this.sum();
  }

  sum() {
    return this.a + this.b;
  }
}

const arithmetic = new Arithmetic(1, 1);

console.log(arithmetic.getSum);

// let a = 1;
// console.log(typeof(a));
