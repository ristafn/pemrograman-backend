const download = new Promise(function (resolve, reject) {
  setTimeout(() => {
    const status = true;

    if (status) {
      resolve("Download berhasil");
    } else {
      reject("Download gagal");
    }
  }, 3000);
});


download
  .then((result) => {
    console.log(result);
  })
  .catch((err) => {
    console.log(err);
  });
