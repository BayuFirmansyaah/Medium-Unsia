<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;

class DashboardController extends Controller
{
    public function index()
    {
        $countContent = Content::count();
        $sumViewCount = Content::sum('view_count');
        $contents = Content::orderBy('view_count', 'desc')->limit(10)->get();
        $contents->load('author');

        return view('admin.dashboard', [
            'countContent' => $countContent,
            'sumViewCount' => $sumViewCount,
            'contents' => $contents,
        ]);
    }
}
