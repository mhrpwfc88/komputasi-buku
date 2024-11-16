<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\kategori;
use Illuminate\Http\Request;

class bukuController extends Controller
{
    public function index()
    {
        $bukus = buku::all();
        return view('buku.index', compact('bukus'));
    }

    public function create()
    {
        $kategoris = kategori::all();
        return view('buku.create',compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|unique:bukus',
            'deskripsi' => 'nullable|string',
            'penulis' => 'required|string',
            'cover' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        Buku::create($request->all());

        return redirect()->route('buku.index')
                         ->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.show', compact('buku'));
    }

    public function edit(string $id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required|unique:bukus,judul,' . $id . ',id_buku',
            'deskripsi' => 'nullable|string',
            'penulis' => 'required|string',
            'cover' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->all());

        return redirect()->route('buku.index')
                         ->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('buku.index')
                         ->with('success', 'Buku berhasil dihapus.');
    }
}

