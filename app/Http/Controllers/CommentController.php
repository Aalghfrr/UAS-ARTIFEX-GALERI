<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $artworkId)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Harus login dulu!'], 401);
        }

        $request->validate(['content' => 'required|string|max:500']);

        // simpan komentar baru ke database
        $comment = Comment::create([
            'user_id' => Auth::id(),
            'artwork_id' => $artworkId,
            'content' => $request->content
        ]);

        // load relasi user untuk dikembalikan ke frontend
        $comment->load('user');

        return response()->json([
            'success' => true,
            'comment' => [
                'user_name' => $comment->user->name,
                'content' => $comment->content
            ]
        ]);
    }
}
