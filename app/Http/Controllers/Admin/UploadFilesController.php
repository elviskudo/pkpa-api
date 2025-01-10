<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\UploadFilesServices;
use Illuminate\Http\Request;

class UploadFilesController extends Controller
{
    protected $uploadFilesServices;

    public function __construct(UploadFilesServices $uploadFilesServices)
    {
        $this->uploadFilesServices = $uploadFilesServices;
    }

    /**
     * List all uploaded files (with optional filter)
     */
    public function list(Request $request)
    {
        $files = $this->uploadFilesServices->list($request);
        return response()->json($files);
    }

    /**
     * Store a newly uploaded file
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['model'] = 'App\\Models\\Batch';
        $data['relation_id'] = $data['batch_uuid'];
        $file = $this->uploadFilesServices->create($data);
        return response()->json($file, 201);
    }

    /**
     * Update an existing file record
     */
    public function update($id, Request $request)
    {
        $data = $request->all();
        $file = $this->uploadFilesServices->update($id, $data);
        return response()->json($file, 200);
    }

    /**
     * Delete a file record
     */
    public function destroy($id)
    {
        $file = $this->uploadFilesServices->delete($id);
        return response()->json(['message' => 'File record deleted successfully'], 200);
    }
}
