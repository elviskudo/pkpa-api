<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Forum;

class ForumServices
{
    /**
     * @throws Exception
     */

    public function list(Request $request)
    {
        $model = Forum::all();
        return $model;
    }


    public function create($data)
    {
        $model = Forum::create($data);

        return $model;
    }

    public function update($id, $data)
    {
        $model = Forum::findOrFail($id);
        $model->update($data);

        return $model;
    }

    public function delete($id)
    {
        $model = Forum::findOrFail($id);
        $model->delete();

        return $model;
    }

}