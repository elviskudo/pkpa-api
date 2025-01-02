<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UniversityServices;

class UniversityController extends Controller
{
    public UniversityServices $universityServices;

    public function __construct(UniversityServices $universityServices)
    {
        $this->universityServices = $universityServices;
    }

    public function list(Request $request)
    {
        $universities = $this->universityServices->list($request);

        return response()->json($universities, 200);
    }

   
    public function create(Request $request)
    {
        $data = $request->validate();

        $university = $this->universityServices->create($data);

        return response()->json($university, 201);
    }

    
    public function update(Request $request, $id)
    {
        $data = $request->validate();

        $university = $this->universityServices->update($id, $data);

        return response()->json($university, 200);
    }

   
    public function delete($id)
    {
        $this->universityServices->delete($id);

        return response()->json(null, 204);
    }
}
