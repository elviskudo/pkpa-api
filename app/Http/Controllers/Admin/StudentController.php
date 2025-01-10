<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\StudentServices;

class StudentController extends Controller
{
    protected $studentServices;

    public function __construct(StudentServices $studentServices)
    {
        $this->studentServices = $studentServices;
    }

    /**
     * Menampilkan daftar siswa
     */
    public function list(Request $request)
    {
        $students = $this->studentServices->list($request);
        return response()->json($students, 200);
    }

    /**
     * Membuat siswa baru
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'phone' => 'required|string|max:20',
            'birth_place' => 'required|string|max:100',
            'birth_date' => 'required|date',
            'address' => 'required|string|max:500',
            'university_id' => 'required|exists:universities,uuid',
        ]);

        $student = $this->studentServices->create($request->all());
        return response()->json(['message' => 'Student created successfully', 'data' => $student], 201);
    }

    /**
     * Mengupdate data siswa
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:students,email,' . $id,
            'phone' => 'sometimes|string|max:20',
            'birth_place' => 'sometimes|string|max:100',
            'birth_date' => 'sometimes|date',
            'address' => 'sometimes|string|max:500',
            'university_id' => 'sometimes|exists:universities,uuid',
        ]);

        $student = $this->studentServices->update($id, $request->all());
        return response()->json(['message' => 'Student updated successfully', 'data' => $student], 200);
    }

    /**
     * Menghapus siswa
     */
    public function delete($id)
    {
        $this->studentServices->delete($id);
        return response()->json(['message' => 'Student deleted successfully'], 200);
    }
}
