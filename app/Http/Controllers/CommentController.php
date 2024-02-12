<?php

namespace App\Http\Controllers;

// CommentController.php

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Monster;

class CommentController extends Controller
{
    public function store(Request $request, Monster $monster)
    {
        $request->validate([
            'content' => 'required|string',
        ]);
        
        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = auth()->id();
        $comment->monster_id = $monster->id;

        $comment->save();

        return redirect()->back();
    }
    
    public function delete(Comment $comment)
    {
        $comment->delete();
        return redirect()->back();
    }

    // Ajoutez d'autres méthodes pour la mise à jour, la suppression, etc., au besoin
}

