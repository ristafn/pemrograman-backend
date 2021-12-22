<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $response = [
            'method' => 'GET',
            'status' => true,
            'results' => $students
        ];

        $ErrorResponse = [
            'method' => 'GET',
            'status' => false,
            'results' => $students
        ];

        if (count($students) < 1) return response()->json($ErrorResponse, 200);

        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        $student = Student::create($input);

        $response = [
            'message' => 'Student is created succesfully',
            'result' => $student,
        ];

        return response()->json($response, 201);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if ($student) {
            $input = [
                'nama' => $request->nama ?? $student->nama,
                'nim' => $request->nim ?? $student->nim,
                'email' => $request->email ?? $student->email,
                'jurusan' => $request->jurusan ?? $student->jurusan
            ];

            $student->update($input);

            $response = [
                'message' => 'Student is updated',
                'result' => $student
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'message' => 'Student not found'
            ];

            return response()->json($response, 404);
        }
    }

    public function destroy($id)
    {
        $student = Student::find($id);

        if ($student) {
            $student->delete();

            $response = [
                'message' => 'Student is deleted'
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'message' => 'Student not found'
            ];

            return response()->json($response, 404);
        }
    }
}
