<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Services\UniversityServices;

class HomeController extends Controller
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
    }
}
