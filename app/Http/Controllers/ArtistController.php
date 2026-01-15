<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Artwork;
use Illuminate\Support\Facades\Storage;

class ArtistController extends Controller
{
    public function dashboard() {
        $artworks = Artwork::where('artist_id', Auth::id())->get();
        return view('artist.dashboard', compact('artworks'));
    }

    public function create() {
        return view('artist.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'nullable|string',
            'price'=>'required|numeric|min:0',
            'image'=>'required|image|max:4096'
        ]);

        $path = $request->file('image')->store('artworks','public');

        Artwork::create([
            'artist_id'=>Auth::id(),
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            'image_url'=>$path
        ]);

        return redirect()->route('artist.dashboard')->with('success','Karya berhasil diunggah!');
    }

    public function destroy($id) {
        $art = Artwork::findOrFail($id);
        if ($art->artist_id != Auth::id()) abort(403);
        if ($art->image_url) Storage::disk('public')->delete($art->image_url);
        $art->delete();
        return back()->with('success','Karya berhasil dihapus!');
    }
}
