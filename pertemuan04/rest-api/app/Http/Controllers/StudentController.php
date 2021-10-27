<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

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
}
