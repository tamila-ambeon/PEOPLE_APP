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

        // Припустимо, що в запиті не передано поле 'password'
        $data = $request->only([
            "name", "surname", "middlename", "gender", "birth_date", "date_we_met", "adresses", "contacts", "other_info", "resume", "weaknesses", "avatar_id", "decision", "circle", 'wing', 'weight', 'religion', 'radicalism', 'trust_in_person', 'trust_in_me', 'dangerous', 'respect_in_me', 'benefits_for_me', "potential_contributions", "personal_resources", "vibe", "content_preferences", "dating_interest"
        ]);
    
        $person->fill($data);
        $person->save();

        
        return response()->json([
            "status" => 200,
            "message" => "Success patch request",
            "data" => $person,
        ]);
    }

}
