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
}