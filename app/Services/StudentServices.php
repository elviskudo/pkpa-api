<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentServices
{
    public $studentFilter = ['name', 'university_id'];

    /**
     * Menampilkan daftar siswa
     */
    public function list(Request $request)
    {
        $query = Student::query();

        // Filter berdasarkan universitas
        if ($request->university_id) {
            $query->where('university_id', $request->university_id);
        }

        // Filter berdasarkan nama
        if ($request->has('name')) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        $models = $query->paginate(10);

        return $models;
    }

    /**
     * Membuat siswa baru
     */
    public function create($data)
    {
        $model = Student::create($data);

        return $model;
    }

    /**
     * Mengupdate data siswa
     */
    public function update($id, $data)
    {
        $model = Student::findOrFail($id);
        $model->update($data);

        return $model;
    }

    /**
     * Menghapus siswa
     */
    public function delete($id)
    {
        $model = Student::findOrFail($id);
        $model->delete();

        return $model;
    }
}
