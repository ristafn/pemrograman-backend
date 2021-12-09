// callback
// const second = (value) => value * 1000;

// function persiapan() {
//   console.log("persiapan....");
// }

// function rebus() {
//   console.log("rebus air....");
// }

// function masak(params) {
//   console.log("Masak....");
//   console.log("selesai");
// }

// function main() {
//   // making callback(async process) with hell concept (old)
//   setTimeout(() => {
//     persiapan();
//     setTimeout(() => {
//       rebus();
//       setTimeout(() => {
//         masak();
//       }, second(7));
//     }, second(5));
//   }, second(1));
// }

// main();

// promise then-catch
// const second = (value) => value * 1000;

// const persiapan = () => {
//   return new Promise(function (resolve) {
//     setTimeout(() => {
//       resolve("persiapan...");
//     }, second(1));
//   });
// };

// const rebus = () => {
//   return new Promise(function (resolve) {
//     setTimeout(() => {
//       resolve("merebus...");
//     }, second(5));
//   });
// };

// const masak = () => {
//   return new Promise(function (resolve) {
//     setTimeout(() => {
//       resolve("memasak...selesai.");
//     }, second(7));
//   });
// };

// function main() {
//   persiapan()
//     .then((result) => {
//       console.log(result);
//       return rebus();
//     })
//     .then((result) => {
//       console.log(result);
//       return masak();
//     })
//     .then((result) => {
//       console.log(result);
//     });
// }

// main();

// promise async await
const second = (value) => value * 1000;

const promise = (waktu, desc) =>
  new Promise((resolve, reject) => {
    setTimeout(() => {
      resolve(desc);
    }, second(waktu));
  });

function persiapan() {
  const prom = promise(1, "persiapan....");
  return prom;
}

function rebus() {
  const prom = promise(5, "rebus....");
  return prom;
}

function masak() {
  const prom = promise(7, "masak....selesai.");
  return prom;
}

async function main() {
  console.log(await persiapan());
  console.log(await rebus());
  console.log(await masak());
}

main();
