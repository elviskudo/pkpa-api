<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\University;

class UniversityServices
{
    public function list(Request $request)
    {
        return University::all();
    }

    
    public function create($data)
    {
        return University::create($data);
    }

   
    public function update($id, $data)
    {
        $model = University::findOrFail($id);
        $model->update($data);

        return $model;
    }

    public function delete($id)
    {
        $model = University::findOrFail($id);
        $model->delete();

        return $model;
    }
}
