<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_customer' => 'required',
            'email_customer' => 'required|email',
            'tanggal_booking' => 'required|date',
            'note_customer' => 'nullable',
        ]);

        $customer = Customer::create($data);

        return redirect()->back()->with('success', 'Data customer berhasil disimpan.');
    }

}
