<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    // menampilkan semua pasien
    public function index()
    {
        // inisialisasi $patients dengan static method all() 
        $patients = Patients::all();
        $message = '';
        $statusCode = 0;

        if (count($patients) < 1) { // ketika data kosong
            $patients = [];
            $message = 'Data is empty';
            $statusCode = 200;
        } else { // ketika data tersedia
            $patients = $patients;
            $message = 'Get All Resource';
            $statusCode = 200;
        }

        // membuat response
        $response = [
            "message" => $message,
            "status code" => $statusCode,
            "data" => $patients
        ];

        return response()->json($response, $statusCode);
    }

    // menambahkan pasien
    public function store(Request $request)
    {
        $val = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'status_id' => 'required | max:1',
            'in_date_at' => 'required | date',
            'out_date_at' => 'nullable | date'
        ]);

        // inisialisasi $patients dengan static method create($val)
        $patients = Patients::create($val);

        // membuat response
        $response = [
            'message' => 'Resource is added successfully',
            'status code' => 201,
            'data' => $patients
        ];

        return response()->json($response, 201);
    }

    // menampilkan detail patients
    public function show($id)
    {
        // inisialisasi $patients dengan static method find($id)
        $patients = Patients::find($id);

        if ($patients) { // id terdapat dalam table
            $detail = [
                'name' => $patients->name,
                'phone' => $patients->phone,
                'address' => $patients->address,
                'status_id' => $patients->status->status,
                'in_date_at' => $patients->in_date_at,
                'out_date_at' => $patients->out_date_at
            ];

            $response = [
                'message' => 'Get Detail Resource',
                'status code' => 200,
                'data' => $detail
            ];

            return response()->json($response, 200);
        } else { // id tidak ada dalam table
            $response = [
                'message' => 'Resource not found',
                'status code' => 404,
            ];

            return response()->json($response, 404);
        }
    }

    // mengupdate data pasien
    public function update(Request $request, $id)
    {
        // inisialisasi $patients dengan static method find($id)
        $patients = Patients::find($id);
        $message = '';
        $statusCode = 0;

        if ($patients) { // id terdapat dalam table
            // validate the input
            $input = $request->validate([
                'name' => 'string',
                'phone' => 'numeric',
                'address' => 'string',
                'status_id' => 'numeric | max:3',
                'in_date_at' => 'date',
                'out_date_at' => 'nullable | date'
            ]);

            $patients->update($input);
            $message = 'Resource is update successfully';
            $statusCode = 200;
        } else { // id tidak ada dalam table
            $patients = [];
            $message = 'Resource not found';
            $statusCode = 404;
        }

        // membuat response
        $response = [
            'message' => $message,
            'status code' => $statusCode,
            'data' => $patients
        ];

        return response()->json($response, $statusCode);
    }

    // menghapus data pasien
    public function destroy($id)
    {
        // inisialisasi $patients dengan static method find($id)
        $patients = Patients::find($id);
        $message = '';
        $statusCode = 0;

        if ($patients) { // // id terdapat dalam table
            $patients->delete();
            $message = 'Resource is delete successfully';
            $statusCode = 200;
        } else { // // id tidak ada dalam table
            $message = 'Resource not found';
            $statusCode = 404;
        }

        // membuat response
        $response = [
            'message' => $message,
            'status code' => $statusCode,
        ];

        return response()->json($response, $statusCode);
    }

    // mencari data
    public function getSearch($name)
    {
        // inisialisasi $patients dengan static method where name like %$name%
        $patients = Patients::where('name', 'Like', '%' . $name . '%')->get();
        $message = 'Get searched resource';
        $statusCode = 200;

        // nama pasien yang dicari tidak ada dalam table
        if (count($patients) < 1) {
            $patients = [];
            $message = 'Resource not found';
            $statusCode = 404;
        }

        // membuat response
        $response = [
            'message' => $message,
            'status code' => $statusCode,
            'data' => $patients
        ];

        return response()->json($response, $statusCode);
    }

    // mendapatkan status 
    public function getStatus($status)
    {
        // inisialisasi $patients dengan static method where status_id = 1
        $patients = Patients::where('status_id', '=', 1)->get();
        $message = '';
        $statusCode = 0;

        // mencari status pasien dengan kondisional
        if ($status == 'positive') {
            $patients = $patients;
            $message = 'Get positive resource';
            $statusCode = 200;
        } else if ($status == 'recovered') {
            $patients = Patients::where('status_id', '=', 2)->get();
            $message = 'Get recovered resource';
            $statusCode = 200;
        } else if ($status == 'dead') {
            $patients = Patients::where('status_id', '=', 3)->get();
            $message = 'Get dead resource';
            $statusCode = 200;
        } else {
            $patients = [];
            $message = "Resource not found";
            $statusCode = 404;
        }

        // membuat response
        $response = [
            "message" => $message,
            "status code" => $statusCode,
            "total" => count($patients),
            "data" => $patients
        ];

        return response()->json($response, $statusCode);
    }
}
