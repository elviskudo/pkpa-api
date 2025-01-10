<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Batch;
use Illuminate\Support\Str;

class BatchServices
{
    public function list(Request $request)
    {
        $query = Batch::query();

        if ($request->has('topic_id') && $request->topic_id !== '') {
            $query->where('topic_id', $request->topic_id);
        }

        if ($request->has('name') && $request->name !== '') {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        return $query->paginate(5);
    }

    public function create($data)
    {
        if (!isset($data['uuid'])) {
            $data['uuid'] = (string) Str::uuid();
        }

        $batch = Batch::create($data);
        return $batch;
    }

    public function update($id, $data)
    {
        $batch = Batch::findOrFail($id);
        $batch->update($data);
        return $batch;
    }

    public function delete($id)
    {
        $batch = Batch::findOrFail($id);
        $batch->delete();
        return $batch;
    }
}
