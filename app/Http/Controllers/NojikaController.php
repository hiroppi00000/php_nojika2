<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NojikaController extends Controller
{
    public function new_create(Request $request)
    {
        return view('nojika/new_create');
    }
}
