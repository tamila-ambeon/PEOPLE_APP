<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    //
    public function index() 
    {
        return response()->json([
            "data" => [],
            "message" => "OK!"
        ]);
    }

    public function testFormInput(Request $request) 
    {
        //sleep(5);
        
        return response()->json([
            "code" => 200,
            "message" => "OK.",
            "data" => $request->toArray()
        ]);
    }
    
}
