const fruits = require("./data/fruits.js");

function index() {
  for (const fruit of fruits) {
    console.log(fruit);
  }
}

function store(name) {
  fruits.push(name);
  index();
}

function update(position, name) {
  fruits[position] = name;
  index();
}

function destroy(position) {
  fruits.splice(position, 1);
  index();
}

module.exports = { index, store, update, destroy };
