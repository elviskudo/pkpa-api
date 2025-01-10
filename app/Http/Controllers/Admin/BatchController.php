<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\BatchServices;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    protected $batchServices;

    public function __construct(BatchServices $batchServices)
    {
        $this->batchServices = $batchServices;
    }

    /**
     * List all batches
     */
    public function list(Request $request)
    {
        $batches = $this->batchServices->list($request);
        return response()->json($batches);
    }

    /**
     * Store a newly created batch
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $batch = $this->batchServices->create($data);
        return response()->json($batch, 201);
    }

    /**
     * Update an existing batch
     */
    public function update($id, Request $request)
    {
        $data = $request->all();
        $batch = $this->batchServices->update($id, $data);
        return response()->json($batch, 200);
    }

    /**
     * Delete a batch
     */
    public function destroy($id)
    {
        $batch = $this->batchServices->delete($id);
        return response()->json(['message' => 'Batch deleted successfully'], 200);
    }
}
