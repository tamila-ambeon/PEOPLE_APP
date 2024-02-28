<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
use App\Models\History;
use App\Models\Sign;
use App\Models\PeopleSign;
use App\Models\File as PersonFile;

class PeopleController extends Controller
{
    public function index() 
    {
        $closePeople = People::where('range_x', '<=', 100)
            ->orderBy('range_x', 'asc')
            ->orderBy('range_y', 'asc')
            ->get();

        $farPeople = People::where('range_x', '>', 100)->where('range_x', '<=', 400)
            ->orderBy('range_x', 'asc')
            ->orderBy('range_y', 'asc')
            ->get();

        $enemyPeople = People::where('range_x', '>', 400)->where('range_x', '<=', 1000)
            ->orderBy('range_x', 'asc')
            ->orderBy('range_y', 'asc')
            ->get();

        return view('pages.index', [
            'closePeople' => $closePeople,
            'farPeople' => $farPeople,
            'enemyPeople' => $enemyPeople,
        ]);
    }
    
    public function search(Request $request) 
    {
        $people = [];
        
        if($request->has('q')) {
            
            $people = People::where('name', 'like', "%" . $request->q . '%')
                ->orWhere('surname', 'like', "%" . $request->q . '%')
                ->orWhere('middlename', 'like', "%" . $request->q . '%')
                ->paginate(10);
        }

        return view('pages.search', ["people" => $people]);
    }

    public function list() 
    {
        $people = People::orderBy('id', 'desc')->paginate(7);

        return view('pages.people-list', ['people' => $people]);
    }

    public function person($id) 
    {
        $person = People::where('id', $id)->first();

        return view('pages.person', ['person' => $person]);
    }
    
    public function mainInfo($id) 
    {
        $person = People::where('id', $id)->first();
        
        return view('edit_main_info', ['person' => $person]);
    }

    public function otherInfo($id) 
    {
        $person = People::where('id', $id)->first();
        
        return view('pages.edit_other_info', ['person' => $person]);
    }

    public function photo_and_resume($id) 
    {
        $person = People::where('id', $id)->first();
        
        return view('pages.edit_photo_and_resume', ['person' => $person]);
    }
    
    public function contacts($id) 
    {
        $person = People::where('id', $id)->first();
        
        return view('pages.edit_contacts', ['person' => $person]);
    }

    public function shortcuts($id) 
    {
        $person = People::where('id', $id)->first();
        $signs = Sign::orderBy('title_men', 'asc')->get();

        $genderSign = [];

        if($person) {
            foreach($signs as $sign) {
                $genderSign[0][$sign->id] = $sign->title_women;
                $genderSign[1][$sign->id] = $sign->title_men;
            }
        } else {
            dd('Person not found.');
        }
        $signIDs = PeopleSign::where('people_id', $person->id)->get(['sign_id'])->pluck('sign_id')->toArray();
        
        return view('pages.shortcuts', [
            'person' => $person, 
            'signs' => $signs, 
            'genderSign' => $genderSign,
            'checked_signs' => $signIDs

        ]);
    }

    public function photographs($id) 
    {
        $person = People::where('id', $id)->first();
        
        return view('pages.photographs', ['person' => $person]);
    }

    public function weaknesses($id) 
    {
        $person = People::where('id', $id)->first();
        
        return view('pages.weaknesses', ['person' => $person]);
    }
    
    public function history($id) 
    {
        $histories = null;
        $person = People::where('id', $id)->first();
        if($person != null) {
            $histories = History::where('people_id', $person->id)->orderBy("date", "desc")->paginate(10);
        }
        
        return view('pages.history', ['person' => $person, 'histories' => $histories]);
    }

    public function new_history($id) 
    {
        $person = People::where('id', $id)->first();
        
        return view('pages.new_history', ['person' => $person]);
    }

    public function edit_history($id, $historyId) 
    {
        $person = People::where('id', $id)->first();
        $history = History::where('id', $historyId)->first();

        return view('pages.edit_history', ['person' => $person, "history" => $history]);
    }
    

    public function photos($id) 
    {
        $files = null;
        $person = People::where('id', $id)->first();
        if($person != null) {
            $files = PersonFile::where('people_id', $person->id)->orderBy("id", "desc")->paginate(10);
        }
        
        return view('pages.person_photos', ['person' => $person, 'files' => $files]);
    }

    public function upload_photos($id) 
    {
        $person = People::where('id', $id)->first();
        
        return view('pages.upload_person_photo', ['person' => $person]);
    }

    public function photo_view($id, $file_id) 
    {
        $person = People::where('id', $id)->first();

        if($person != null) {
            $file = PersonFile::where('id', $file_id)->where('people_id', $person->id)->first();
        }
        
        return view('pages.photo_view', ['person' => $person, 'file' => $file]);
    }

    public function photo_edit($id, $file_id) 
    {
        $person = People::where('id', $id)->first();

        if($person != null) {
            $file = PersonFile::where('id', $file_id)->where('people_id', $person->id)->first();
        }
        return view('pages.photo_edit', ['person' => $person, 'file' => $file]);
    }
    
    
}
