const students = require("../data/students");

class StudentController {
  index(req, res) {
    const data = {
      message: "Menampilkan data students",
      data: students,
    };

    res.json(data);
  }

  store(req, res) {
    const { nama } = req.body;
    students.push(nama);

    const data = {
      message: `Menambahkan data student: ${nama}`,
      data: students,
    };

    res.json(data);
  }

  update(req, res) {
    const { id } = req.params;
    const { nama } = req.body;

    students[id] = nama;

    const data = {
      message: `Mengupdate data students id : ${id}, nama : ${nama}`,
      data: students,
    };

    res.json(data);
  }

  destroy(req, res) {
    const { id } = req.params;
    students.splice(1, id);

    const data = {
      message: `Menghapus data students id : ${id}`,
      data: students,
    };

    res.json(data);
  }
}

const object = new StudentController();

module.exports = object;
