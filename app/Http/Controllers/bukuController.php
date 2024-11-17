<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();
        return view('buku.index', compact('bukus'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('buku.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kategori_id' => 'required|exists:kategori,id_kategori',
            'judul'       => 'required|unique:buku,judul|max:255',
            'deskripsi'   => 'required',
            'penulis'     => 'required|max:255',
            'cover'       => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimal 2MB
            'status'      => 'required|in:aktif,nonaktif',
        ]);

       
        $coverPath = $request->file('cover')->store('covers', 'public');

      
        Buku::create([
            'kategori_id' => $validatedData['kategori_id'],
            'judul'       => $validatedData['judul'],
            'deskripsi'   => $validatedData['deskripsi'],
            'penulis'     => $validatedData['penulis'],
            'cover'       => $coverPath,
            'status'      => $validatedData['status'],
        ]);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.show', compact('buku'));
    }

    public function edit(string $id)
    {
        $buku = Buku::findOrFail($id);
        $kategoris = Kategori::all();
        return view('buku.edit', compact('buku', 'kategoris'));
    }

    public function update(Request $request, string $id)
    {
        $buku = Buku::findOrFail($id);

        $validatedData = $request->validate([
            'kategori_id' => 'required|exists:kategori,id_kategori',
            'judul'       => 'required|unique:buku,judul,' . $id . ',id_buku|max:255',
            'deskripsi'   => 'required',
            'penulis'     => 'required|max:255',
            'cover'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status'      => 'required|in:aktif,nonaktif',
        ]);

       
        if ($request->hasFile('cover')) {
           
            if ($buku->cover && Storage::disk('public')->exists($buku->cover)) {
                Storage::disk('public')->delete($buku->cover);
            }

            $validatedData['cover'] = $request->file('cover')->store('covers', 'public');
        }

     
        $buku->update($validatedData);

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $buku = Buku::findOrFail($id);

       
        if ($buku->cover && Storage::disk('public')->exists($buku->cover)) {
            Storage::disk('public')->delete($buku->cover);
        }

  
        $buku->delete();

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil dihapus.');
    }
}
