<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Exhibitor;
use App\Models\Log;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /* Registration Counts  */
        $response['registration'] = Registration::where('status', '!=',  'DUPLICADO')->count();
        $response['registration_Participant_Estudante'] = Registration::where([['plafond', 'PARTICIPANTE ESTUDANTE'], ['status', '!=',  'DUPLICADO']])->count();
        $response['registration_Participant_c'] = Registration::where([['plafond', 'PARTICIPANTE C'], ['status', '!=',  'DUPLICADO']])->count();
        $response['registration_Participant_b'] = Registration::where([['plafond', 'PARTICIPANTE B'], ['status', '!=',  'DUPLICADO']])->count();
        $response['registration_Participant_a'] = Registration::where([['plafond', 'PARTICIPANTE A'], ['status', '!=',  'DUPLICADO']])->count();
        $response['registration_vip'] = Registration::where([['plafond', 'PARTICIPANTE VIP'], ['status', '!=',  'DUPLICADO']])->count();
        $response['registration_Participant_Familiar'] = Registration::where([['plafond', 'INGRESSO FAMILIAR'], ['status', '!=',  'DUPLICADO']])->count();




        //Logger
        $this->Logger->log('info', 'Entrou no Painel Administrativo');
        return view('admin.home.index', $response);
    }
}
