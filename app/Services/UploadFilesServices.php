<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\UploadFiles;
use Illuminate\Support\Str;

class UploadFilesServices
{
    public function list(Request $request)
    {
        $query = UploadFiles::query();

        // Jika ingin filter by model
        if ($request->has('model') && $request->model !== '') {
            $query->where('model', $request->model);
        }

        // Jika ingin filter by relation_id
        if ($request->has('relation_id') && $request->relation_id !== '') {
            $query->where('relation_id', $request->relation_id);
        }

        return $query->paginate(5);
    }

    public function create($data)
    {
        if (!isset($data['uuid'])) {
            $data['uuid'] = (string) Str::uuid();
        }

        // Mungkin Anda butuh validasi tipe file, path, dsb.
        $upload = UploadFiles::create($data);
        return $upload;
    }

    public function update($id, $data)
    {
        $upload = UploadFiles::findOrFail($id);
        $upload->update($data);
        return $upload;
    }

    public function delete($id)
    {
        $upload = UploadFiles::findOrFail($id);
        $upload->delete();
        return $upload;
    }
}
