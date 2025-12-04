<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Schedule;

class ScheduleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* programs & activities */
        $response['schedulesI'] = Schedule::where('day', 'I')->orderby('start','asc')->get();
        $response['schedulesII'] = Schedule::where('day', 'II')->orderby('start','asc')->get();
        $response['schedulesIII'] = Schedule::where('day', 'III')->orderby('start','asc')->get();

        return view('site.schedule.index', $response);
    }


}
