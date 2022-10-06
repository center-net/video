<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class SiteController extends Controller
{
    public function blog()
    {
        $videos = Video::All();
        return view('site.blog', ['title' => 'الرئيسية'],compact('videos'));
    }

    public function show($id)
    {
        $video =  Video::find($id);
        return view('site.video', ['title' => ''],compact('video'));
    }
}
