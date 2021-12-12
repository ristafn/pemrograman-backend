const formatName = (nama) => {
  console.log(`making capitalize : ${nama}`);
};

function getName(callback) {
  return new Promise((resolve) => {
    setTimeout(() => {
      resolve("windows-10.exe");
    }, 3000);
  });
}

async function main() {
  await getName(formatName);
}

main();
