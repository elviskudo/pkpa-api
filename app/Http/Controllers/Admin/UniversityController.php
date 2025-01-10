<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UniversityServices;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
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

        return response()->json($universities->map(function ($university) {
            return [
                'id' => $university->id,
                'uuid' => $university->uuid,
                'name' => $university->name,
                'code' => $university->code,
                'logo_url' => Storage::url($university->logo_url),
                'is_active' => $university->is_active,
                'order' => $university->order,
            ];
        }), 200);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'namaUniversitas' => 'required|string|max:255',
            'kodeUniversitas' => 'required|string|max:50|',
            'deskripsi' => 'nullable|string',
            'persyaratanCalon' => 'nullable|string',
            'polaIlmiah' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,png|required|max:2048',
            'brosur' => 'nullable|file|mimes:pdf|required|max:10240',
        ]);

        $data['uuid'] = Str::uuid();

        $data['name'] = $data['namaUniversitas'];
        $data['code'] = $data['kodeUniversitas'];
        $data['description'] = $data['deskripsi'];
        $data['candidate_agreement'] = $data['persyaratanCalon'];
        $data['core_pattern'] = $data['polaIlmiah'];

        $data['slug'] = Str::slug($data['name']);

        unset(
            $data['namaUniversitas'], $data['kodeUniversitas'],
            $data['deskripsi'], $data['persyaratanCalon'], $data['polaIlmiah']
        );

        Log::info('Mapped Data for Create:', $data);

        
        if ($request->hasFile('logo')) {
            $data['logo_url'] = $request->file('logo')->store('logos', 'public');
        }

        
        if ($request->hasFile('brosur')) {
            $data['brochure_url'] = $request->file('brosur')->store('brochures', 'public');
        }

        $university = $this->universityServices->create($data);

        return response()->json($university, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'namaUniversitas' => 'required|string|max:255',
            'kodeUniversitas' => "required|string|max:50|$id",
            'deskripsi' => 'nullable|string',
            'persyaratanCalon' => 'nullable|string',
            'polaIlmiah' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,png|required|max:2048',
            'brosur' => 'nullable|file|mimes:pdf|required|max:10240',
        ]);

        
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
