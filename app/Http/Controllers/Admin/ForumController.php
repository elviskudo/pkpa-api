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
        parent::__construct();
        $this->forumServices = $forumServices;
    }

    public function list(Request $request)
    {
        $forums = $this->forumServices->list();
    }

}
