<?php

namespace App\Http\Controllers;

use App\Models\gudang;
use App\Models\kategori_item;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gudang = gudang::with('barang')->get(); // Get the related barang for each gudang
        $cari = request()->input('cari');
        $gudang = Gudang::with('barang') // Pastikan relasi 'barang' sudah didefinisikan di model Gudang
        ->where(function ($query) use ($cari) {
            if ($cari) {
                $query->where('name', 'like', '%' . $cari . '%') // Pencarian Nama Gudang
                    ->orWhere('stock', 'like', '%' . $cari . '%') // Pencarian Stock
                    ->orWhereHas('barang', function ($q) use ($cari) {
                        $q->where('name', 'like', '%' . $cari . '%'); // Pencarian Nama Barang
                    });
            }
        })
        ->get();

        return view('gudang.index', compact('gudang'));
    }
        
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua kategori item beserta relasi stock
        $barang = kategori_item::with('stock')->get();

        // Return ke view dengan data $barang
        return view('gudang.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|min:3',
            'location' => 'nullable|string',
            'barang' => 'required',
            'stock' => 'required|integer',
        ]);

        $gudang = gudang::create([
            'name' => $request->name,
            'location' => $request->location,
            'barang_id' => $request->barang,
            'stock' => $request->stock,
        ]);

        if ($gudang) {
            return redirect()->route('gudang.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('gudang.create')->with('error', 'Data gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
