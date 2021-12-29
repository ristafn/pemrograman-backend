const db = require("./../config/database");

class Students {
  static all() {
    return new Promise((resolve, reject) => {
      const sql = "SELECT * FROM data_students";

      db.query(sql, (err, result) => {
        if (err) {
          reject(err);
        } else {
          console.log(result);
          resolve(result);
        }
      });
    });
  }

  static create(nama) {
    return new Promise((resolve, reject) => {
      const sql = `INSERT INTO data_students (id, nama) VALUES(NULL, '${nama}')`;

      db.query(sql, (err, result) => {
        if (err) {
          reject(err);
        } else {
          console.log(result);
          resolve(result);
        }
      });
    });
  }
}

module.exports = Students;
