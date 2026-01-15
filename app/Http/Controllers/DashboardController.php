<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil semua karya milik user yang login
        $arts = Artwork::where('artist_id', Auth::id())->latest()->get();
        return view('seniman.dashboard', compact('arts'));
    }

    public function create()
    {
        return view('seniman.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        // Upload image
        $imagePath = $request->file('image')->store('artworks', 'public');

        // Simpan ke database
        Artwork::create([
            'artist_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image' => "/storage/" . $imagePath,  // simpan path asli
        ]);

        return redirect()->route('dashboard.seniman')
            ->with('success', 'Karya Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $art = Artwork::findOrFail($id);
        return view('seniman.edit', compact('art'));
    }

    public function update(Request $request, $id)
    {
        // Validasi
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $art = Artwork::findOrFail($id);

        // Kalau ada gambar baru → upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('artworks', 'public');
            $art->image = "/storage/" . $imagePath;
        }

        // Update DB
        $art->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $art->image,
        ]);

        return redirect()->route('dashboard.seniman')
            ->with('success', 'Karya Berhasil Diedit!');
    }

    public function delete($id)
    {
        Artwork::findOrFail($id)->delete();
        return back()->with('success', 'Karya Berhasil Dihapus!');
    }
}
