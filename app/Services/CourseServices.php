<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseServices
{
    public $courseFilter = ['name', 'category_id', 'university_id', 'teacher_id'];

    /**
     * @throws Exception
     */
    public function list(Request $request)
    {
        $query = Course::query();

        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('university_id') && $request->university_id != '') {
            $query->where('university_id', $request->university_id);
        }

        if ($request->has('teacher_id') && $request->teacher_id != '') {
            $query->where('teacher_id', $request->teacher_id);
        }

        if ($request->has('name')) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        $models = $query->paginate(4);

        return $models;
    }


    public function create($data)
    {
        $model = Course::create($data);

        return $model;
    }

    public function update($id, $data)
    {
        $model = Course::findOrFail($id);
        $model->update($data);

        return $model;
    }

    public function delete($id)
    {
        $model = Course::findOrFail($id);
        $model->delete();

        return $model;
    }

}