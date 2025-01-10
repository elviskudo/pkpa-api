<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\FaceServices;
use Illuminate\Http\Request;


class FaceController extends Controller
{
    //Constructor
    public FaceServices $faceServices;

    public function __construct(FaceServices $faceServices)
    {
        $this->faceServices=$faceServices;
    }

    //List Face
    public function list(){
        $faces = $this -> faceServices->list();
        return response()->json($faces);
    }

    //Edit Face
    public function edit(Request $request, $id){
        $validateData = $request -> validate([
            'uuid' => 'required|string',
             'student_id' => 'required|uuid|exists:students,uid',
            'image_url'=>'required|string|max:225'
        ]);

        $face = $this ->faceServices->edit($id,$validateData);
        return response()->json($face);
    }

    //Delete Face
    public function delete($id){
        $this->faceServices->delete($id);
        return response()->json(['message' => 'Data Telah Berhasil di Hapus.']);
    }
}
