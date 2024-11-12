<?php

namespace App\Services;
use App\Models\Course;

class CourseServices
{
    public $courseFilter = ['name', 'category_id'];

    /**
     * @throws Exception
     */
    public function list(PaginateRequest $request)
    {

    }

}