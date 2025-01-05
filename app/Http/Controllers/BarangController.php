<?php

namespace App\Http\Controllers;

use App\Models\gudang;
use App\Models\kategori_item;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $gudang = gudang::all();
        $barang = kategori_item::all();
        $cari = $request->input('cari');
        if ($cari) {
            $barang = kategori_item::where('name', 'like', '%' . $cari . '%')
                ->orWhere('color', 'like', '%' . $cari . '%')
                ->orWhere('category', 'like', '%' . $cari . '%')
                ->orWhere('type', 'like', '%' . $cari . '%')
                ->orWhere('size', 'like', '%' . $cari . '%')
                ->get();
        } else {
            // Ambil semua barang jika tidak ada pencarian
            $barang = kategori_item::all();
        }
        return view('barang.index',compact('gudang','barang'));

        // $gudang = gudang::all();
        // $barang = kategori_item::all();
        // return view('barang.index',compact('gudang','barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'name' => 'required|string|min:3', 
            'color' => 'required|string',
            'category'=>'required',
            'type' =>'required',
            'size' =>'required|integer',
        ]);

        $barang = kategori_item::create([
            'name' => $request->name,
            'color' => $request->color,
            'category' => $request->category,
            'type' => $request->type,
            'size' => $request->size,
        ]);

        if($barang){
            return redirect()->route('barang.index')->with('success', 'Data berhasil ditambahkan');
        }else{
            return redirect()->route('barang.create')->with('error', 'Data gagal ditambahkan');
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

        $barang = kategori_item::where('id',$id)->first();
        return view('barang.edit',compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $request->validate([
            'name' => 'required|string|min:3', 
            'color' => 'required|string',
            'category'=>'required',
            'type' =>'required',
            'size' =>'required|integer',
        ]);

        $barang = kategori_item::find($id)->update([
            'name' => $request->name,
            'color' => $request->color,
            'category' => $request->category,
            'type' => $request->type,
            'size' => $request->size,
        ]);

        if($barang){
            return redirect()->route('barang.index')->with('success', 'Data berhasil diubah');
        }else{
            return redirect()->route('barang.edit',$id)->with('error', 'Data gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $barang = kategori_item::where('id',$id)->delete();

        if($barang){
            return redirect()->route('barang.index')->with('success', 'Data berhasil dihapus');
        }else{
        return redirect()->route('barang.index')->with('error', 'Data gagal dihapus');
    }
}
}
