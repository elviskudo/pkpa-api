<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UniversityServices;
use Illuminate\Support\Facades\Storage;

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
        $data = $request->validate([
            'namaUniversitas' => 'required|string|max:255',
            'kodeUniversitas' => 'required|string|max:50|',
            'deskripsi' => 'nullable|string',
            'persyaratanCalon' => 'nullable|string',
            'polaIlmiah' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,png|',
            'brosur' => 'nullable|file|mimes:pdf|',
        ]);

        // Handle file uploads
        if ($request->hasFile('logo')) {
            $data['logo_path'] = $request->file('logo')->store('logos', 'public');
        }

        if ($request->hasFile('brochure')) {
            $data['brochure_path'] = $request->file('brochure')->store('brochures', 'public');
        }

        $university = $this->universityServices->create($data);

        return response()->json($university, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'code' => "sometimes|required|string|max:50|unique:universities,code,$id",
            'description' => 'nullable|string',
            'requirements' => 'nullable|string',
            'scientific_pattern' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,png|',
            'brochure' => 'nullable|file|mimes:pdf|',
        ]);

        // Handle file uploads
        if ($request->hasFile('logo')) {
            $data['logo_path'] = $request->file('logo')->store('logos', 'public');
        }

        if ($request->hasFile('brochure')) {
            $data['brochure_path'] = $request->file('brochure')->store('brochures', 'public');
        }

        $university = $this->universityServices->update($id, $data);

        return response()->json($university, 200);
    }

    public function delete($id)
    {
        $this->universityServices->delete($id);

        return response()->json(null, 204);
    }
}
