<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Produk;
class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::all();
        return view('user.produk', compact('produks'));
    }
    public function indexadmin()
    {
        $produks = Produk::all();
        return view('admin.produkindex', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produks = Produk::all();
        return view('admin.produkcreate', compact('produks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'stock' => 'required',
            'harga' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:5000',
        ]);
        $produk = new \App\Models\Produk();
        $produk->fill($requestData);
        $produk->foto = $request->file('foto')->store('public');
        $produk->save();
        return back();
    }


    /**
     * Display the specified resource.
     */

    public function show($kategori)
    {
        $produk = Produk::where('kategori', $kategori)->get();

        return view('user.produk', [
            'produks' => $produk,
            'kategori_aktif' => $kategori
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.produkedit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'nama_produk' => 'string|max:255',
            'stock' => 'integer',
            'kategori' => 'string',
            'harga' => 'numeric',
            'deskripsi' => 'string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->fill($requestData);
        if ($request->hasFile('foto')){
            Storage::delete($produk->foto);
            $produk->foto = $request->file('foto')->store('public');
        }
        $produk->save();
        return redirect('/produkadmin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::findOrFail($id);

        if($produk->foto != null && Storage::exists($produk->foto)){
            Storage::delete($produk->foto);
        }
        $produk->delete();
        return back();
    }
}
