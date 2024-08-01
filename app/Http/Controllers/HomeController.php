<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $contents = Content::where('status', 'published')->orderBy('id', 'desc')->get();
        return view('home', [
            'contents' => $contents,
        ]);
    }
    
    public function show($id){
        $content = Content::findOrFail($id);
        $content->load('author');

        $content->view_count = $content->view_count + 1;
        $content->save();        

        return view('article', compact('content'));
    }
}
