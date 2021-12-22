const { index, store } = require("./FruitController.js");

const main = () => {
    index();
    store("Apple");
}

main();