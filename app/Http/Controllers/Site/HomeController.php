<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Speaker;
use App\Models\Testimonial;
use App\Models\Video;

class HomeController extends Controller
{
    public function index()
    {
        $response['site'] = 'Home';

        /* programs & activities */
        $response['schedulesI'] = Schedule::where('day', 'I')->orderby('start','asc')->get();
        $response['schedulesII'] = Schedule::where('day', 'II')->orderby('start','asc')->get();
        $response['schedulesIII'] = Schedule::where('day', 'III')->orderby('start','asc')->get();
       
        $response['speakers'] = Speaker::orderBy('priority', 'asc')->limit(12)->get();
        return view('site.home.index', $response);
    }
}
