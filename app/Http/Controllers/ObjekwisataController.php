<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objekwisata;

class ObjekwisataController extends Controller
{
    public function index()
    {
        $objekwisata = Objekwisata::all();
    
        return view('desawisata', compact('objekwisata'));
    }
}
