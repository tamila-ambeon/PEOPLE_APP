<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\People;
use App\Models\Sign;
use App\Models\PeopleSign;

class SignController extends Controller
{
    
    public function create(Request $request) 
    {
        $sign = new Sign;
        $sign->title_women = $request->title_women;
        $sign->title_men = $request->title_men;
        $sign->short_description = $request->short_description;
        $sign->full_description	= $request->full_description;
        $sign->icon_id = $request->icon_id;
        $sign->type_id = $request->type_id;
        $sign->save();

        return response()->json([
            "status" => 200,
            "message" => "",
            "data" => $sign,
        ]);
    }

    public function patch(Request $request) 
    {
        if(!$request->has("id")) {
            return response()->json([
                "status" => 400,
                "message" => "Specify sign id.",
                "data" => [],
            ], 400);
        }

        $sign = Sign::where("id", $request->id)->first();

        if(!$sign) {
            return response()->json([
                "status" => 404,
                "message" => "Sign with id #" . $request->id . " not found.",
                "data" => [],
            ], 404);
        } 

        if($request->has("title_women")) { $sign->title_women = $request->title_women; }
        if($request->has("title_men")) { $sign->title_men = $request->title_men; }
        if($request->has("short_description")) { $sign->short_description = $request->short_description; }
        if($request->has("full_description")) { $sign->full_description = $request->full_description; }
        if($request->has("icon_id")) { $sign->icon_id = $request->icon_id; }
        if($request->has("type_id")) { $sign->type_id = $request->type_id; }
        
        $sign->save();

        return response()->json([
            "status" => 200,
            "message" => "Success patch request",
            "data" => $sign,
        ]);

    }

    public function savePersonSigns(Request $request) 
    {
        $person = People::where("id", $request->person_id)->first();

        if(!$person) {
            return response()->json([
                "status" => 404,
                "message" => "Person with id #" .  $request->person_id . " not found.",
                "data" => [],
            ], 404);
        }

        $relations = PeopleSign::where('people_id', $person->id)->delete();

        if($request->has('signs')) {
            if($request->signs != null) {
                foreach($request->signs as $signId) {
                    $newRelations = new PeopleSign;
                    $newRelations->people_id = $person->id;
                    $newRelations->sign_id = $signId;
                    $newRelations->save();
                }
            }
        }
        
        return response()->json([
            "status" => 200,
            "message" => "Success post request",
            "data" => [],
            "request" => $request->toArray()
        ]);  
    }

}
