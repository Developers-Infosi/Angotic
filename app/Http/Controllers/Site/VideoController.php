<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    //

    public function index(){


        $response['videos']= Video::orderby('id','desc')->paginate(6);
        return view('site.video.index',$response);

    }
}
