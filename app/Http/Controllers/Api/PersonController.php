<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    //

    public function index(){
        $person = Person::all();

        $personData = [];
        $statusData = 404;
        $message = "No Records Found";

        if($person->count() > 0){
            $personData = $person;
            $statusData = 200;
            $message = $person->count()." Records Found";
        }

        $data = [
            'status' => $statusData,
            'message' => $message,
            'person' => $personData
        ];
        
        return response()->json($data, 200);
    }

}
