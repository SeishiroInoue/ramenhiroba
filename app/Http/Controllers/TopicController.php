<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Topic;

class TopicController extends Controller
{ 
    public function index()
    {
        $topics = Topic::orderBy('created_at','desc')->paginate(10);
        
        return view('topics.index',
        [ 'topics' => $topics,
        ]);
    }
    
    public function store(Request $request)
    {
        $topic = $request->validate([
            'title' => 'required|max:25',
            'url' => 'required',
            'content' => 'required|max:150',
        ]);
        
        $request->user()->topics()->create([
            'title' => $topic->title,
            'url' => $topic->url,
            'content' => $topic->content,
        ]);
        
        return back;
    }
}
