<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CourseServices;

class CourseController extends Controller
{
    public CourseServices $courseServices;

    public function __construct(CourseServices $courseServices)
    {

        $this->courseServices = $courseServices;
    }

    public function list(Request $request)
    {
        $courses = $this->courseServices->list($request);

        return response()->json($courses);
    }

    public function create(Request $request)
    {
        $data = $request->validated();
        $courses = $this->courseServices->create($data);
        return response()->json($courses, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $courses = $this->courseServices->update($id, $data);
        return response()->json($courses, 200);
    }

    public function delete($id)
    {
        $courses = $this->courseServices->delete($id);
        response()->json(null, 204);
    }
}