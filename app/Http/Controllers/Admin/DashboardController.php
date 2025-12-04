<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger();
    }



    public function index()
    {
        $count_teams = Team::count();

        // Baseados em Angola vs Internacionais
        $count_based_registration = Registration::where('based', 'Yes')->withoutTrashed()->count();
        $count_international_registration = Registration::where('based', 'No')->withoutTrashed()->count();

        // Por nacionalidade (Top 10)
        $registrations_by_nationality = Registration::withoutTrashed()
            ->select('nationality', DB::raw('count(*) as total'))
            ->groupBy('nationality')
            ->orderByDesc('total')
            ->limit(10)
            ->get();

        // Por título
        $registrations_by_title = Registration::withoutTrashed()
            ->select('title', DB::raw('count(*) as total'))
            ->groupBy('title')
            ->get();

        // Por organização
        $registrations_by_org_type = Registration::withoutTrashed()
            ->select('org_type', DB::raw('count(*) as total'))
            ->groupBy('org_type')
            ->get();

        // Por status
        $registrations_by_status = Registration::withoutTrashed()
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();

        // Por nível
        $registrations_by_level = Registration::withoutTrashed()
            ->select('level', DB::raw('count(*) as total'))
            ->groupBy('level')
            ->get();

        // Por Visa Status
        $registrations_by_visa_status = Registration::withoutTrashed()
            ->select('visa_status', DB::raw('count(*) as total'))
            ->groupBy('visa_status')
            ->get();

        // Por Passport Type
        $registrations_by_passport_type = Registration::withoutTrashed()
            ->select('passport_type', DB::raw('count(*) as total'))
            ->groupBy('passport_type')
            ->get();

        // Por Diet
        $registrations_by_diet = Registration::withoutTrashed()
            ->select('diet', DB::raw('count(*) as total'))
            ->groupBy('diet')
            ->get();

        // By Operational Team Type
        $teams_by_type = Team::withoutTrashed()
            ->select('type', DB::raw('count(*) as total'))
            ->groupBy('type')
            ->get();

        //Logger
        $this->Logger->log('info', 'Logged into the Admin Panel');

        return view('admin.home.index', [
            'count_based_registration' => $count_based_registration,
            'count_international_registration' => $count_international_registration,
            'registrations_by_nationality' => $registrations_by_nationality,
            'registrations_by_title' => $registrations_by_title,
            'registrations_by_org_type' => $registrations_by_org_type,
            'registrations_by_status' => $registrations_by_status,
            'registrations_by_level' => $registrations_by_level,
            'registrations_by_visa_status' => $registrations_by_visa_status,
            'registrations_by_passport_type' => $registrations_by_passport_type,
            'registrations_by_diet' => $registrations_by_diet,

            'teams_by_type' => $teams_by_type,
            'count_teams' => $count_teams,
        ]);
    }
}
