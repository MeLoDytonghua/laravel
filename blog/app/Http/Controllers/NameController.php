<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Input;

class NameController extends Controller
{
    public function index(){
        return view('welcome')
            ->with('tasks', Task::all());
    }
    public function create(Request $request){
        $content = $request->input("title");
        echo $content;
    }

}
