<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;

class DashboardController extends Controller
{
    public function index()
    {
        $countContent = Content::where('author_id', auth()->user()->id)->count();
        $sumViewCount = Content::where('author_id', auth()->user()->id)->sum('view_count');

        return view('user.dashboard', [
            'countContent' => $countContent,
            'sumViewCount' => $sumViewCount,
        ]);
    }
}
