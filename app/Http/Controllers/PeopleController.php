<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
use App\Models\History;
use App\Models\Sign;
use App\Models\PeopleSign;
use App\Models\File as PersonFile;
use Carbon\Carbon;

class PeopleController extends Controller
{
    public function index() 
    {
        // Отримання поточної дати
        $today = Carbon::now();

        return view('pages.index', [
            'data' => [
                'nearestBirthday' => People::whereBetween('birth_date', [
                    $today->startOfDay(),
                    $today->copy()->addDays(10)->endOfDay()
                ])->get(),
                'last_relations' => 
                    History::orderBy('created_at', 'desc')
                   // ->select('people_id')
                    ->distinct('people_id')
                    ->take(10)
                    ->get(),
                'woman' => People::where('gender', 0)->orderBy('relationship_quality', 'desc')->take(10)->get(),
                'dating_interest' => People::where('gender', 0)->where('dating_interest', 1)->orderBy('relationship_quality', 'desc')->take(10)->get(),
                'best' => People::orderBy('relationship_quality', 'desc')->take(10)->get(),
                'worst' => People::orderBy('relationship_quality', 'asc')->take(10)->get(),
                'close' => People::where('circle', 1)->orderBy('relationship_quality', 'desc')->take(10)->get(),
                'distant' => People::where('circle', 2)->orderBy('relationship_quality', 'desc')->take(10)->get(),
                'neutral' => People::where('circle', 3)->orderBy('relationship_quality', 'desc')->take(10)->get(),
                'enemy' => People::where('circle', 4)->orderBy('relationship_quality', 'asc')->take(10)->get(),
                'leftist' => People::where('wing', 1)->orderBy('relationship_quality', 'desc')->take(10)->get(),
                'righttist' => People::where('wing', 2)->orderBy('relationship_quality', 'desc')->take(10)->get(),
                'centrist' => People::where('wing', 3)->orderBy('relationship_quality', 'desc')->take(10)->get(),
                'radicals' => People::where('radicalism', 2)->orderBy('relationship_quality', 'asc')->take(10)->get(),
                'trust_in_person' => People::orderBy('trust_in_person', 'desc')->orderBy('relationship_quality', 'desc')->take(10)->get(),
                'trust_in_me' => People::orderBy('trust_in_me', 'desc')->orderBy('relationship_quality', 'desc')->take(10)->get(),
                'dangerous' => People::where('dangerous', '>=', 4)->orderBy('dangerous', 'desc')->orderBy('relationship_quality', 'asc')->take(10)->get(),
                'benefits_for_me' => People::where('benefits_for_me', '>=', 2)->orderBy('benefits_for_me', 'desc')->orderBy('relationship_quality', 'desc')->take(10)->get(),
            ]
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

    public function list(Request $request) 
    {
        $people = People::orderBy('id', 'desc');
        
        if ($request->has('keyword')) {
            if(strlen($request->keyword) > 0) {
                $people = $people->where(function ($query) use ($request) {
                    $query->where('name', 'like', "%" . $request->keyword . '%')
                        ->orWhere('surname', 'like', "%" . $request->keyword . '%')
                        ->orWhere('middlename', 'like', "%" . $request->keyword . '%');
                });
            }
        }

        if ($request->has('gender')) {
            if($request->gender != -1) {
                $people = $people->where('gender', $request->gender);
            }
        }

        if ($request->has('wing')) {
            if($request->wing != -1) {
                $people = $people->where('wing', $request->wing);
            }
        }

        if ($request->has('radicalism')) {
            if($request->radicalism != -1) {
                $people = $people->where('radicalism', $request->radicalism);
            }   
        }

        if ($request->has('circle')) {
            if($request->circle != -1) {
                $people = $people->where('circle', $request->circle);
            }  
        }

        $ageTo = 150;
        if($request->has('age_to')) {
            if($request->age_to > 0) {
                $ageTo = $request->age_to;
            }
        }

        if ($request->has('age_from') and $request->has('age_to')) {
            if($request->age_from >= 0) {
                $yearFrom = Carbon::today()->subYears($ageTo)->startOfYear();   
                $yearTo = Carbon::today()->subYears($request->age_from)->endOfYear();
                $people = $people->whereBetween('birth_date', [$yearFrom, $yearTo]);
                //dd($yearFrom, $yearTo, $people);
            }
        }
        
        $people = $people->paginate(5)->appends(request()->query());

        return view('pages.search.people-list', ['people' => $people]);
    }

    public function person($id) 
    {
        $person = People::where('id', $id)->first();

        return view('pages.person.view', ['person' => $person]);
    }

    public function openAnswer($id, $field)
    {
        $person = People::where('id', $id)->first();
        return view('parts.person.edit_open_question', ['person' => $person, 'field' => $field]);
    }
    
    public function contacts($id) 
    {
        $person = People::where('id', $id)->first();
        
        return view('pages.person.edit', ['person' => $person]);
    }

    public function weaknesses($id) 
    {
        $person = People::where('id', $id)->first();
        
        return view('pages.weaknesses', ['person' => $person]);
    }
    
    public function stories($id) 
    {
        $histories = null;
        $person = People::where('id', $id)->first();
        if($person != null) {
            $histories = History::where('people_id', $person->id)->orderBy("date", "desc")->orderBy("id", "desc")->paginate(10);
        }
        
        return view('pages.history.stories', ['person' => $person, 'histories' => $histories]);
    }

    public function new_history($id) 
    {
        $person = People::where('id', $id)->first();
        
        return view('pages.history.new_history', ['person' => $person]);
    }

    public function edit_history($id, $historyId) 
    {
        $person = People::where('id', $id)->first();
        $history = History::where('id', $historyId)->first();

        return view('pages.history.edit_history', ['person' => $person, "history" => $history]);
    }
    





    public function photos($id) 
    {
        $files = null;
        $person = People::where('id', $id)->first();
        if($person != null) {
            $files = PersonFile::where('file_type', 'photographs')->where('people_id', $person->id)->orderBy("id", "desc")->paginate(10);
        }
        
        return view('pages.photos.view', ['person' => $person, 'files' => $files]);
    }

    public function upload_photos($id) 
    {
        $person = People::where('id', $id)->first();
        
        return view('pages.photos.create', ['person' => $person]);
    }

    public function photo_view($id, $file_id) 
    {
        $person = People::where('id', $id)->first();

        if($person != null) {
            $file = PersonFile::where('id', $file_id)->where('people_id', $person->id)->first();
        }

        if($file == null) {
            return "Photo not exist!";
        }
        
        return view('pages.photo_view', ['person' => $person, 'file' => $file]);
    }

    public function photo_edit($id, $file_id) 
    {
        $person = People::where('id', $id)->first();

        if($person != null) {
            $file = PersonFile::where('id', $file_id)->where('people_id', $person->id)->first();
        }

        if($file == null) {
            return "Photo not exist!";
        }

        return view('pages.photos.edit', ['person' => $person, 'file' => $file]);
    }
    
    
}
