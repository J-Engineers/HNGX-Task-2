<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Person;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;

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
            $message = $person->count()." Record(s) Found";
        }

        $data = [
            'status' => $statusData,
            'message' => $message,
            'person' => $personData
        ];
        
        return response()->json($data, 200);
    }

    public function store(Request $request)  {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:200|unique:persons,name',
            'gender' => 'required|string|max:6',
            'age' => 'required|string|max:1000'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'message' => $validator->messages()
            ], 422);
        }

        $person = Person::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'age' => $request->age
        ]);

        if($person){
            return response()->json([
                'status' => 200,
                'message' => 'Person Created Successfully'
            ], 200);
        }
        return response()->json([
            'status' => 500,
            'message' => 'Something went wrong'
        ], 500);
    }

    public function show($id){

        $val = ['id' => $id];
        $validator = Validator::make($val, [
            'id' => 'required|int|max:1000000'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'message' => $validator->messages()
            ], 422);
        }

        $person = Person::find($id);

        $personData = [];
        $statusData = 404;
        $message = "No Records Found with the id of ".$id;

        if($person){
            $personData = $person;
            $statusData = 200;
            $message = "A Record Found";
        }

        $data = [
            'status' => $statusData,
            'message' => $message,
            'person' => $personData
        ];
        
        return response()->json($data, 200);

    }

    public function update(Request $request, int $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:200|unique:persons,name',
            'gender' => 'required|string|max:6',
            'age' => 'required|string|max:1000'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'message' => $validator->messages()
            ], 422);
        }

        $person = Person::find($id);
        if($person){
            $person->update([
                'name' => $request->name,
                'gender' => $request->gender,
                'age' => $request->age
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'Person Updated Successfully',
                'person' => $person
            ], 200);
        }
        return response()->json([
            'status' => 404,
            'message' => 'No such Person Found'
        ], 404);
    }

    public function destroy($id){

        $val = ['id' => $id];
        $validator = Validator::make($val, [
            'id' => 'required|int|max:1000000'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'message' => $validator->messages()
            ], 422);
        }
        
        $person = Person::find($id);
        if($person){
            $person->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Person Deleted Successfully'
            ], 200);
        }

        return response()->json([
            'status' => 404,
            'message' => 'No such Person Found'
        ], 404);
    }
}
