<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artwork;

class ArtworkController extends Controller
{
    public function index()
    {
        if (!session('admin_login')) {
            return redirect('/admin/login');
        }

        $artworks = Artwork::latest()->get();
        return view('admin.artworks.index', compact('artworks'));
    }

    public function edit($id)
    {
        if (!session('admin_login')) {
            return redirect('/admin/login');
        }

        $artwork = Artwork::find($id);

        if (!$artwork) {
            return redirect('/admin/artworks')->with('error', 'Artwork tidak ditemukan');
        }

        return view('admin.artworks.edit', compact('artwork'));
    }

    public function update(Request $request, $id)
    {
        if (!session('admin_login')) {
            return redirect('/admin/login');
        }

        $request->validate([
            'artist_name' => 'required|string|max:255',
            'title'       => 'required|string|max:255',
            'price'       => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $artwork = Artwork::find($id);

        if (!$artwork) {
            return redirect('/admin/artworks')->with('error', 'Artwork tidak ditemukan');
        }

        $artwork->update([
            'artist_name' => $request->artist_name,
            'title'       => $request->title,
            'price'       => $request->price,
            'description' => $request->description,
        ]);

        return redirect('/admin/artworks')->with('success', 'Artwork berhasil diupdate');
    }

    public function delete($id)
    {
        if (!session('admin_login')) {
            return redirect('/admin/login');
        }

        Artwork::where('id', $id)->delete();

        return redirect('/admin/artworks')->with('success', 'Artwork berhasil dihapus');
    }
}
