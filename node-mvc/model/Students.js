const db = require("./../config/database");

class Students {
  static all() {
    return new Promise((resolve, reject) => {
      const sql = "SELECT * FROM data_students";

      db.query(sql, (err, result) => {
        if (err) {
          reject(err);
        } else {
          resolve(result);
        }
      });
    });
  }

  static find(id) {
    return new Promise((resolve, reject) => {
      const sql = "SELECT * FROM data_students WHERE id = ?";

      db.query(sql, id, (err, result) => {
        const [student] = result;

        resolve(student);
      });
    });
  }

  static async create(data) {
    const id = await new Promise((resolve, reject) => {
      const sql = "INSERT INTO data_students SET ?";

      db.query(sql, data, (err, result) => {
        if (err) {
          reject(err);
        } else {
          console.log(result);
          resolve(result.insertId);
        }
      });
    });

    const student = await this.find(id);

    return student;
  }

  static async update(id, data) {
    await new Promise((resolve, reject) => {
      const sql = "UPDATE data_students SET ? WHERE id = ?";

      db.query(sql, [data, id], (err, result) => {
        resolve(result);
      });
    });

    const student = await this.find(id);

    return student;
  }

  static show(id, data) {
    return new Promise((resolve, reject) => {
      const sql = "SELECT * FROM data_students WHERE id = ?";

      db.query(sql, id, (err, result) => {
        const [student] = result;

        resolve(student);
      });
    });
  }

  static delete(id) {
    return new Promise((resolve, reject) => {
      const sql = "DELETE FROM data_students WHERE id = ?";

      db.query(sql, id, (err, result) => {
        resolve(result);
      });
    });
  }
}

module.exports = Students;
