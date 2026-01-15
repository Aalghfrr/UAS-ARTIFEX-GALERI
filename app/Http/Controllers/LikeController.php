<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle($artworkId)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Harus login dulu!'], 401);
        }

        $like = Like::where('user_id', Auth::id())
                    ->where('artwork_id', $artworkId)
                    ->first();

        if ($like) {
            $like->delete();
            return response()->json(['status' => 'unliked']);
        } else {
            Like::create([
                'user_id' => Auth::id(),
                'artwork_id' => $artworkId,
            ]);
            return response()->json(['status' => 'liked']);
        }
    }
}
