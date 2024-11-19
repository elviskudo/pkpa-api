<?php

namespace App\Services;

use App\Http\Requests\PaginateRequest;
use App\Models\University;
use Illuminate\Database\Eloquent\Model;

class UniversityServices
{
    public $addressFilter = ['name', 'code'];

    /**
     * @throws Exception
     */
    public function list(PaginateRequest $request)
    {
        $model = University::all();

        return $model;
    }

    public function create($data)
    {
        $model = University::create($data);

        return $model;
    }

    public function update ($id, $data)
    {
        $model = University::createOrUpdate($data, $id);

        return $model;
    }

    public function delete ($id)
    {
        $model = University::delete($id);

        return $model;
    }
}
