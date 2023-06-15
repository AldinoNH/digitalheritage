<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Objekwisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Festival;
use App\Models\Customer;
use App\Models\PaketWisata;



class ItemController extends Controller
{

    public function store(Request $request)
    {
        $berita = new Berita;
        $berita->judul_berita = $request->input('judul_berita');
        $berita->deskripsi_berita = $request->input('deskripsi_berita');

        $lastId = Berita::max('id_berita');
        $newId = $lastId + 1;
        
        if ($request->hasFile('gambar_berita')) {
            $file = $request->file('gambar_berita');
            $extension = $file->getClientOriginalExtension();
            $fileName = 'gambar_' . $newId . '.' . $extension;
            $file->move(public_path('gambar_berita'), $fileName);
            $berita->gambar_berita = $fileName;
        }

        $berita->save();

        return redirect()->route('beritaadmin')->with('success', 'Berita berhasil disimpan.');
    }

    public function storeobjekwisata(Request $request)
    {
        $objekwisata = new Objekwisata;
        $objekwisata->judul_objekwisata = $request->input('judul_objekwisata');
        $objekwisata->deskripsi_objekwisata = $request->input('deskripsi_objekwisata');

        $lastId = Objekwisata::max('id_objekwisata');
        $newId = $lastId + 1;
        
        if ($request->hasFile('gambar_objekwisata')) {
            $file = $request->file('gambar_objekwisata');
            $extension = $file->getClientOriginalExtension();
            $fileName = 'gambar_' . $newId . '.' . $extension;
            $file->move(public_path('gambar_objekwisata'), $fileName);
            $objekwisata->gambar_objekwisata = $fileName;
        }

        $objekwisata->save();

        return redirect()->route('desawisataadmin')->with('success', 'Data objek wisata berhasil disimpan.');
    }

    public function storefestival(Request $request)
    {
        $festival = new Festival;
        $festival->judul_festival = $request->input('judul_festival');
        $festival->deskripsi_festival = $request->input('deskripsi_festival');

        $lastId = Festival::max('id_festival');
        $newId = $lastId + 1;
        
        if ($request->hasFile('gambar_festival')) {
            $file = $request->file('gambar_festival');
            $extension = $file->getClientOriginalExtension();
            $fileName = 'gambar_' . $newId . '.' . $extension;
            $file->move(public_path('gambar_festival'), $fileName);
            $festival->gambar_festival = $fileName;
        }

        $festival->save();

        return redirect()->route('festivaladmin')->with('success', 'Data festival berhasil disimpan.');
    }

    public function storePaketWisata(Request $request)
    {
        $paketWisata = new PaketWisata;
        $paketWisata->nama_paketwisata = $request->input('nama_paketwisata');
        $paketWisata->harga_paketwisata = $request->input('harga_paketwisata');
        $paketWisata->save();

        return redirect()->route('paketwisataadmin')->with('success', 'Data paket wisata berhasil disimpan.');
    }




    public function index()
    {
        $berita = Berita::all();
    
        return view('beritaadmin', compact('berita'));
    }

    public function indexobjekwisata()
    {
        $objekwisata = Objekwisata::all();
    
        return view('objekwisataadmin', compact('objekwisata'));
    }

    public function indexfestival()
    {
        $festival = Festival::all();
    
        return view('festivaladmin', compact('festival'));
    }

    public function indexcustomer()
    {
        $customers = Customer::all();
    
        return view('customeradmin', compact('customers'));
    }

    public function indexpaketwisata()
    {
        $paketwisata = PaketWisata::all();
    
        return view('paketwisataadmin', compact('paketwisata'));
    }
    
    
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('beritaadmin', compact('berita'));
    }

    public function editobjekwisata($id)
    {
        $objekwisata = Objekwisata::findOrFail($id);
        return view('objekwisataadmin', compact('objekwisata'));
    }


    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);
        $berita->judul_berita = $request->input('judul_berita');
        $berita->deskripsi_berita = $request->input('deskripsi_berita');
        $berita->updated_at = now(); // Atau gunakan Carbon untuk menyesuaikan format tanggal

        if ($request->hasFile('gambar_berita')) {
            $file = $request->file('gambar_berita');
            $extension = $file->getClientOriginalExtension();
            $fileName = 'gambar_' . $berita->id_berita . '.' . $extension;
            $file->move(public_path('gambar_berita'), $fileName);
            $berita->gambar_berita = $fileName;
        }

        $berita->save();

        return redirect()->route('beritaadmin')->with('success', 'Berita berhasil diperbarui.');
    }

    public function updateobjekwisata(Request $request, $id)
    {
        $objekwisata = Objekwisata::findOrFail($id);
        $objekwisata->judul_objekwisata = $request->input('judul_objekwisata');
        $objekwisata->deskripsi_objekwisata = $request->input('deskripsi_objekwisata');
        $objekwisata->updated_at = now(); // Atau gunakan Carbon untuk menyesuaikan format tanggal

        if ($request->hasFile('gambar_objekwisata')) {
            $file = $request->file('gambar_objekwisata');
            $extension = $file->getClientOriginalExtension();
            $fileName = 'gambar_' . $objekwisata->id_objekwisata . '.' . $extension;
            $file->move(public_path('gambar_objekwisata'), $fileName);
            $objekwisata->gambar_objekwisata = $fileName;
        }

        $objekwisata->save();

        return redirect()->route('desawisataadmin')->with('success', 'Data objek wisata berhasil diperbarui.');
    }

    public function updatefestival(Request $request, $id)
    {
        $festival = Festival::findOrFail($id);
        $festival->judul_festival = $request->input('judul_festival');
        $festival->deskripsi_festival = $request->input('deskripsi_festival');
        $festival->updated_at = now(); // Atau gunakan Carbon untuk menyesuaikan format tanggal

        if ($request->hasFile('gambar_festival')) {
            $file = $request->file('gambar_festival');
            $extension = $file->getClientOriginalExtension();
            $fileName = 'gambar_' . $festival->id_festival . '.' . $extension;
            $file->move(public_path('gambar_festival'), $fileName);
            $festival->gambar_festival = $fileName;
        }

        $festival->save();

        return redirect()->route('festivaladmin')->with('success', 'Data festival berhasil diperbarui.');
    }

    public function updatePaketWisata(Request $request, $id)
    {
        $paketWisata = PaketWisata::findOrFail($id);
        $paketWisata->nama_paketwisata = $request->input('nama_paketwisata');
        $paketWisata->harga_paketwisata = $request->input('harga_paketwisata');
        $paketWisata->updated_at = now(); // Atau gunakan Carbon untuk menyesuaikan format tanggal

        $paketWisata->save();

        return redirect()->route('paketwisataadmin')->with('success', 'Data paket wisata berhasil diperbarui.');
    }




    public function storeobjek(Request $request)
    {
        $objekwisata = new Objekwisata;
        $objekwisata->judul_objekwisata = $request->input('judul_objekwisata');
        $objekwisata->deskripsi_objekwisata = $request->input('deskripsi_objekwisata');

        $lastId = Objekwisata::max('id_objekwisata');
        $newId = $lastId + 1;
        
        if ($request->hasFile('gambar_objekwisata')) {
            $file = $request->file('gambar_objekwisata');
            $extension = $file->getClientOriginalExtension();
            $fileName = 'gambar_' . $newId . '.' . $extension;
            $file->move(public_path('gambar_objekwisata'), $fileName);
            $objekwisata->gambar_objekwisata = $fileName;
        }

        $objekwisata->save();

        return redirect()->route('objekwisataadmin')->with('success', 'Data objek wisata berhasil disimpan.');
    }


    public function destroy($id_berita)
    {
        // Mendapatkan data berita yang akan dihapus
        $berita = Berita::findOrFail($id_berita);
        
        // Mendapatkan path file gambar
        $gambarPath = public_path('gambar_berita/' . $berita->gambar_berita);
        
        // Menghapus file gambar jika ada
        if (File::exists($gambarPath)) {
            File::delete($gambarPath);
        }
        
        // Menghapus data berita dari database
        $berita->delete();
        
        return response()->json(['message' => 'Berita berhasil dihapus.']);
    }

    public function destroyobjekwisata($id_objekwisata)
    {
        // Mendapatkan data objek wisata yang akan dihapus
        $objekwisata = Objekwisata::findOrFail($id_objekwisata);
        
        // Mendapatkan path file gambar
        $gambarPath = public_path('gambar_objekwisata/' . $objekwisata->gambar_objekwisata);
        
        // Menghapus file gambar jika ada
        if (File::exists($gambarPath)) {
            File::delete($gambarPath);
        }
        
        // Menghapus data objek wisata dari database
        $objekwisata->delete();
        
        return response()->json(['message' => 'Objek Wisata berhasil dihapus.']);
    }

    public function destroyfestival($id_festival)
    {
        // Mendapatkan data festival yang akan dihapus
        $festival = Festival::findOrFail($id_festival);
        
        // Mendapatkan path file gambar
        $gambarPath = public_path('gambar_festival/' . $festival->gambar_festival);
        
        // Menghapus file gambar jika ada
        if (File::exists($gambarPath)) {
            File::delete($gambarPath);
        }
        
        // Menghapus data festival dari database
        $festival->delete();
        
        return response()->json(['message' => 'Festival berhasil dihapus.']);
    }

    public function destroyCustomer(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        // Hapus data customer dari database
        $customer->delete();

        // Berikan respons JSON
        return response()->json(['message' => 'Customer berhasil dihapus.']);
    }

    public function destroyPaketWisata(Request $request, $id)
    {
        $paketWisata = PaketWisata::findOrFail($id);

        // Hapus data paket wisata dari database
        $paketWisata->delete();

        // Berikan respons JSON
        return response()->json(['message' => 'Paket wisata berhasil dihapus.']);
    }

   
}
