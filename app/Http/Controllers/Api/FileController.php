<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File as PeopleFile;
use App\Models\People;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class FileController extends Controller
{
    public function upload(Request $request) 
    {
        $random = Str::random(40);
        $peopleFile = null;
        $person = People::where('id', $request->people_id)->first();

        if(!$person) {
            return response()->json([
                "status" => 400,
                "message" => "Person with id " . $request->people_id . " not found.",
                "data" => $peopleFile,
            ], 400);   
        }

        $path = "uploaded_files/" . $request->file_type . "/" . $request->people_id;

        if ($request->hasFile('file')) {

            $imageName = $random .'.'. $request->file->extension();
            
            $peopleFile = new PeopleFile;
            $peopleFile->file_type = $request->file_type;
            $peopleFile->original_file_name = $request->file->getClientOriginalName();
            $peopleFile->extension = $request->file->extension();
            $peopleFile->size = $request->file->getSize();
            $peopleFile->people_id = $request->people_id;
            $peopleFile->title = $request->title;
            $peopleFile->content = $request->content;
            $peopleFile->path = $path . '/' .$imageName;
            $peopleFile->save();

            $peopleFilesCount = PeopleFile::where('file_type', $request->file_type)->where('people_id', $request->people_id)->count();
            $person->photos_count = $peopleFilesCount;
            $person->save();



            $request->file->move(public_path($path), $imageName);
            

            return response()->json([
                "status" => 200,
                "message" => "",
                "data" => $peopleFile,
            ]);
        }

        
      //  $extension = File::extension($file['name']);

        return response()->json([
            "status" => 400,
            "message" => "File not received.",
            "data" => $request->toArray(),
        ], 400);
    }

    public function update(Request $request) 
    {
        if(!$request->has("id")) {
            return response()->json([
                "status" => 400,
                "message" => "Specify file id.",
                "data" => [],
            ], 400);
        }

        $file = PeopleFile::where("id", $request->id)->first();

        if(!$file) {
            return response()->json([
                "status" => 404,
                "message" => "File with id #" . $request->id . " not found.",
                "data" => [],
            ], 404);
        }

        if($request->has("title")) { $file->title = $request->title; }
        if($request->has("content")) { $file->content = $request->content; }


        $file->save();
        
        return response()->json([
            "status" => 200,
            "message" => "Success patch request",
            "data" => $file,
        ]);

    }
    
    public function delete(Request $request) 
    {
        if(!$request->has("id")) {
            return response()->json([
                "status" => 400,
                "message" => "Specify file id.",
                "data" => [],
            ], 400);
        }
        
        $file = PeopleFile::find($request->id);

        if(!$file) {
            return response()->json([
                "status" => 404,
                "message" => "File not found.",
                "data" => [],
            ], 404);
        }


        $people_id = $file->people_id;
        $this->destroyFile($file->path);
        $file->delete(); 

        $this->calcFilesCount($people_id, $file->file_type);
        

        return response()->json([
            "status" => 200,
            "message" => "Success delete request",
            "data" => [
                'people_id' => $people_id
            ],
        ]);  
    }
    
    public function destroyFile($path)
    {
        if (file_exists(public_path($path))) {
           $filedeleted = unlink(public_path($path));
        }
    }

    public function calcFilesCount($people_id, $file_type)
    {
        $person = People::where('id', $people_id)->first();

        if($person) {
            $peopleFilesCount = PeopleFile::where('file_type', $file_type)->where('people_id', $person->id)->count();
            $person->photos_count = $peopleFilesCount;
            $person->save();
        }
    }
}
