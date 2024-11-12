<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UniversityServices;

class UniversityController extends Controller
{
    public UniversityServices $universityServices;

    public function __construct (UniversityServices $universityServices)
    {
        parent::__construct();
        $this->universityServices = $universityServices;
    }

    public function list (Request $request)
    {
        $universities = $this->universityServices->list();

        return json_encode($universities);
    }
}
