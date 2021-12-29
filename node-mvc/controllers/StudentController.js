const Students = require("../model/Students");

class StudentController {
  async index(req, res) {
    const students = await Students.all();
    const data = {
      message: "Menampilkan data students",
      data: students,
    };

    res.json(data);
  }

  async store(req, res) {
    const { nama } = req.body;
    Students.create(nama);
    const students = await Students.all();

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
