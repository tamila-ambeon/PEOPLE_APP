<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\People;
use App\Models\Sign;

class SignController extends Controller
{
    public function list() 
    {
        $signs = Sign::orderBy('title_men', 'asc')->paginate(10);
        
        return view('pages.signs', ['signs' => $signs]);
    }

    public function sign($id) 
    {
        $sign = Sign::where('id', $id)->first();
        
        return view('pages.sign', ['sign' => $sign]);
    }

    public function edit($id) 
    {
        $sign = Sign::where('id', $id)->first();
        
        return view('pages.edit_sign', ['sign' => $sign]);
    }
}
