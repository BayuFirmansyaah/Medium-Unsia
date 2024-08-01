<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    
    public function show($id){
        $content = Content::findOrFail($id);

        $content->update([
            'view' => $content->view + 1
        ]);

        return view('article', compact('content'));
    }
}
