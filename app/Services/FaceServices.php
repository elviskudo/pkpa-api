<?php
namespace App\Services;

use App\Models\Face;

class FaceServices {
    public function list(){
        $model = Face::all();
        return $model;
    }

    public function create(array $data){
        $face = Face::create($data);
        return $face;
    }

    public function edit ($id,array $data){
        $face = Face::find($id);

        $face -> update($data);
        return $face;
    }

    public function delete($id){
        $face = Face::find($id);
        $face -> delete();
        return true;
    }

}
