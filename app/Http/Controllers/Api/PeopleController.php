<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\People;

class PeopleController extends Controller
{
    public function create(Request $request) 
    {
        $person = new People;
        $person->name = $request->name;
        $person->surname = $request->surname;
        $person->middlename = $request->middlename;
        $person->save();
        
        return response()->json([
            "status" => 200,
            "message" => "",
            "data" => $person,
        ]);
    }
    
    public function patchMainInfo(Request $request) 
    {
        if(!$request->has("id")) {
            return response()->json([
                "status" => 400,
                "message" => "Specify person id.",
                "data" => [],
            ], 400);
        }

        $person = People::where("id", $request->id)->first();

        if(!$person) {
            return response()->json([
                "status" => 404,
                "message" => "Person with id #" . $request->id . " not found.",
                "data" => [],
            ], 404);
        }

        if($request->has("name")) { $person->name = $request->name; }
        if($request->has("surname")) { $person->surname = $request->surname; }
        if($request->has("middlename")) { $person->middlename = $request->middlename; }
        if($request->has("gender")) { $person->gender = $request->gender[0]; }
        if($request->has("birth_date")) { $person->birth_date = $request->birth_date; }
        if($request->has("date_we_met")) { $person->date_we_met = $request->date_we_met; }
        if($request->has("adresses")) { $person->adresses = $request->adresses; }
        if($request->has("contacts")) { $person->contacts = $request->contacts; }
        if($request->has("other_info")) { $person->other_info = $request->other_info; }
        if($request->has("resume")) { $person->resume = $request->resume; }
        if($request->has("weaknesses")) { $person->weaknesses = $request->weaknesses; }
        if($request->has("avatar_id")) { $person->avatar_id = $request->avatar_id; }
        if($request->has("range_x")) { $person->range_x = $request->range_x; }
        if($request->has("range_y")) { $person->range_y = $request->range_y; }

        $person->save();
        
        return response()->json([
            "status" => 200,
            "message" => "Success patch request",
            "data" => $person,
        ]);
    }

}
