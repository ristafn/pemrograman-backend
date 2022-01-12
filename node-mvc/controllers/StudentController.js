const Students = require("../model/Students");

class StudentController {
  errResponse() {
    const data = {
      message: "Data not found",
    };

    return data;
  }

  async index(req, res) {
    const students = await Students.all();
    const data = {
      message: "Menampilkan data students",
      data: students,
    };

    res.json(data);
  }

  async store(req, res) {
    const students = await Students.create(req.body);

    const data = {
      message: `Menambahkan data student`,
      data: students,
    };

    res.json(data);
  }

  async update(req, res) {
    const { id } = req.params;

    const student = await Students.find(id);

    if (student) {
      const student = await Students.update(id, req.body);

      const data = {
        message: "Mengedit data student",
        data: student,
      };
      res.status(200).json(data);
    } else {
      const data = {
        message: "Data not found",
      };

      res.status(404).json(data);
    }
  }

  async show(req, res) {
    const { id } = req.params;

    const student = await Students.find(id);

    if (student) {
      const data = {
        message: "Menampilkan detail students",
        data: student,
      };

      res.status(200).json(data);
    } else {
      const data = {
        message: "Student not found",
      };

      res.status(200).json(data);
    }
  }

  async destroy(req, res) {
    const { id } = req.params;
    const student = await Students.find(id);

    if (student) {
      const student = await Students.delete(id);

      const data = {
        message: "Menghapus data student",
      };

      res.status(200).json(data);
    } else {
      const data = {
        message: "Data not found",
      };

      res.status(404).json(data);
    }
  }
}

const object = new StudentController();

module.exports = object;
