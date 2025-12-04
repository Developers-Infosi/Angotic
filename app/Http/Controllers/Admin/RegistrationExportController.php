<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Exports\RegistrationsExport;
use Maatwebsite\Excel\Facades\Excel;


class RegistrationExportController extends Controller
{
     public function export()
    {
        return Excel::download(new RegistrationsExport, 'registrations'.date('dmY').'.xls');
    }
}
