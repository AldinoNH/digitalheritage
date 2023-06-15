<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Festival;

class FestivalController extends Controller
{
    public function index()
    {
        $festival = Festival::all();
    
        return view('festival', compact('festival'));
    }
    
}
