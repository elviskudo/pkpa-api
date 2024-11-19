<?php
namespace App\Services;

use App\Models\Face;

class FaceService {
    public function list(){
        $model = Face::all();
        return $model;
    }

    public function create(array $data){
        $face = Face::create($data);
        return $face;
    }

}
