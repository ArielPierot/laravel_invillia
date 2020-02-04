<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportXMLFilesController extends Controller
{
    function create(){
        return view('xml_files.create');
    }

    function store(Request $request){
        dd($request->file());
    }
}
