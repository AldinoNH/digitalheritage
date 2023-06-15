<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketWisata;


class PaketWisataController extends Controller
{
    public function index()
    {
    $paketWisata = PaketWisata::all();

    return view('paketwisata', ['paketWisata' => $paketWisata]);
    }
}
