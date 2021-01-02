<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Request $request)
    {   
        $request->validate([
            'content' => 'required|max:150',
            'photo' => 'required|image|max:5120'
        ]);
        
        $file = $request['photo'];
        $path = Storage::disk('s3')->putFile('/ramen', $file, 'public');
        $url = Storage::disk('s3')->url($path);
        
        $request->user()->comments()->create([
            'content' => $request->content,
            'photo' => $url,
            'review_id' => $_POST['review_id'],
        ]);

        return back();
    }
    
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if (\Auth::id() === $comment->user_id) {
            $comment->delete();
        }

        return back();
    }
}