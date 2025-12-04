<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StartupController extends Controller
{
    public function create()
    {
        $response['title'] = 'Startups';
        $response['perpage'] = 'startup';
        return view('site.startup.index', $response);
    }

    
}
