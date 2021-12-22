const { index, store, update, destroy } = require("./FruitController.js");

const main = () => {
  console.log("Method index - Menampilkan Buah");
  index();
  console.log("Menambahkan buah Pisang");
  store("Pisang");
  console.log("Method Update - Update data 0 menjadi Kelapa");
  update(0, "Kelapa");
  console.log("Method destroy - Menghapus data 0");
  destroy(0);
};

main();
