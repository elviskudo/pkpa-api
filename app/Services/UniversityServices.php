<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\University;

class UniversityServices
{
    public function list(Request $request)
    {
        $model = University::all();
        return $model;
        return University::all();
    }

    
    public function create($data)
    {
        $model = University::create($data);
        return $model;
        return University::create($data);
    }

   
    public function update($id, $data)
    {
        $model = University::createOrUpdate($data, $id);
        $model = University::findOrFail($id);
        $model->update($data);

        return $model;
    }

    public function delete($id)
    {
        $model = University::delete($id);
        $model = University::findOrFail($id);
        $model->delete();

        return $model;
    }
}
