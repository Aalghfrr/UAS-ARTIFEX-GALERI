<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use Illuminate\Http\Request;

class ArtistDashboardController extends Controller
{
    public function index()
    {
        $artworks = Artwork::latest()->get();
        return view('seniman.dashboard', compact('artworks'));
    }

    public function create()
    {
        return view('seniman.create');
    }

    public function store(Request $request)
    {
        if (!$request->has('karya')) {
            return back();
        }

        foreach ($request->karya as $karya) {
            Artwork::create([
                'artist_name' => $karya['artist_name'],
                'title'       => $karya['title'],
                'description' => $karya['description'] ?? '',
                'price'       => $karya['price'],
                'image'       => $karya['image'] ?? '',
            ]);
        }

        return redirect()->route('seniman.dashboard');
    }

    public function edit($id)
    {
        $art = Artwork::findOrFail($id);
        return view('seniman.edit', compact('art'));
    }

    public function update(Request $request, $id)
    {
        Artwork::findOrFail($id)->update($request->all());
        return redirect()->route('seniman.dashboard');
    }
}
