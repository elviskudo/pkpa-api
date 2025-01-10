<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CourseServices;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $courseServices;

    public function __construct(CourseServices $courseServices)
    {
        $this->courseServices = $courseServices;
    }

    /**
     * List all courses
     */
    public function list(Request $request)
    {
        $courses = $this->courseServices->list($request);

        return response()->json($courses);
    }

    /**
     * Store a newly created course
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $course = $this->courseServices->create($data);

        return response()->json($course, 201);
    }

    /**
     * Update an existing course
     */
    public function update($id, Request $request)
    {
        $data = $request->all();
        $course = $this->courseServices->update($id, $data);

        return response()->json($course, 200);
    }

    /**
     * Delete a course
     */
    public function destroy($id)
    {
        $course = $this->courseServices->delete($id);

        return response()->json(['message' => 'Course deleted successfully'], 200);
    }
}
