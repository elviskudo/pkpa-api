<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ForumServices;

class ForumController extends Controller
{
    public ForumServices $forumServices;

    public function __construct(ForumServices $forumServices)
    {
        $this->forumServices = $forumServices;
    }

    public function list(Request $request)
    {
        $forums = $this->forumServices->list($request);

        return response()->json($forums);
    }

    public function create(Request $request)
    {

        $data = $request->validated();
        $forum = $this->forumServices->create($data);
        return response()->json($forum, 201);
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        $forum = $this->forumServices->update($id, $data);
        return response()->json($forum, 200);
    }

    public function delete($id)
    {
        $forum = $this->forumServices->delete($id);
        response()->json(null, 204);
    }
}
