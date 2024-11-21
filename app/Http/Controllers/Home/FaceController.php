<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\FaceService;
use Illuminate\Http\Request;


class FaceController extends Controller
{
    //Constructor
    public FaceService $faceServices;

    public function __construct(FaceService $faceServices)
    {
        parent::__construct();
        $this->faceServices=$faceServices;
    }

    //Create Face
    public function create(Request $request){
        $validate = $request->validate([
            'uuid'=> 'required|uuid',
            'student_id' => 'required|uuid|exists:students,uid',
            'image_url'=>'required|string|max:225'
        ]);

        //Kirim Ke FaceService
        $face = $this->faceServices->create([
            'uuid'=> $validate['uuid'],
            'student_id'=> $validate['student_id'],
            'image_url' => $validate['image_url']
        ]);

        return response()->json($face);
    }

    public function compare(){

    }

}
