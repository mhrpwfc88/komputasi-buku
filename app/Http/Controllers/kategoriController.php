<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = kategori::all();
        return view('dashboard', compact('kategoris'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:kategori',
            'keterangan' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        Kategori::create($request->all());

        return redirect()->route('dashboard')
                         ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.show', compact('kategori'));
    }

    public function edit(string $id_kategori)
    {
        // Cari kategori berdasarkan id_kategori
        $kategori = Kategori::findOrFail($id_kategori);
    
        return view('kategori.edit', compact('kategori'));
    }
    
    public function update(Request $request, string $id_kategori)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|unique:kategori,nama,' . $id_kategori . ',id_kategori',
            'keterangan' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
        ]);
    
        // Cari kategori berdasarkan id_kategori
        $kategori = Kategori::findOrFail($id_kategori);
        $kategori->update($request->all());
    
        return redirect()->route('dashboard')
                         ->with('success', 'Kategori berhasil diperbarui.');
    }
    

    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('dashboard')
                         ->with('success', 'Kategori berhasil dihapus.');
    }
}

