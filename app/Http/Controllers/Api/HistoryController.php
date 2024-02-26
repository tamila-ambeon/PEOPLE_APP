<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\People;
use App\Models\History;

class HistoryController extends Controller
{
    public $personId = 0;
    
    public function calculateQuality() 
    {
        $person = People::find($this->personId);
        $histories = History::where("people_id", $person->id)->get();

        $relationship_quality = 0;
        foreach($histories as $history) {
            $relationship_quality = $relationship_quality + $history->quality;
        }

        $person->relationship_quality = $relationship_quality;
        $person->history_count = $histories->count();
        $person->save();
        
    }
    
    public function create(Request $request) 
    {
        $history = new History;
        $history->people_id = $request->people_id;
        $history->date = $request->date;
        $history->content = $request->content;
        $history->quality = $request->quality;
        $history->save();
        
        $this->personId = $history->people_id;
        $this->calculateQuality();

        return response()->json([
            "status" => 200,
            "message" => "",
            "data" => $history,
        ]);
    }

    public function patch(Request $request) 
    {
        if(!$request->has("id")) {
            return response()->json([
                "status" => 400,
                "message" => "Specify history id.",
                "data" => [],
            ], 400);
        }

        $history = History::where("id", $request->id)->first();

        if(!$history) {
            return response()->json([
                "status" => 404,
                "message" => "History with id #" . $request->id . " not found.",
                "data" => [],
            ], 404);
        } 

        if($request->has("date")) { $history->date = $request->date; }
        if($request->has("content")) { $history->content = $request->content; }
        if($request->has("quality")) { $history->quality = $request->quality; }

        // TODO: розрахуй

        $history->save();
        
        $this->personId = $history->people_id;
        $this->calculateQuality();

        return response()->json([
            "status" => 200,
            "message" => "Success patch request",
            "data" => $history,
        ]);

    }

    public function delete(Request $request) 
    {
        if(!$request->has("id")) {
            return response()->json([
                "status" => 400,
                "message" => "Specify history id.",
                "data" => [],
            ], 400);
        }
        
        $history = History::find($request->id);
        $people_id = $history->people_id;
        $history->delete(); 

        $this->personId = $history->people_id;
        $this->calculateQuality();

        return response()->json([
            "status" => 200,
            "message" => "Success delete request",
            "data" => [
                'people_id' => $people_id
            ],
        ]);
    }
    
    
}
