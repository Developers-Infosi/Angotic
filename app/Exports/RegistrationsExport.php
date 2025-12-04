<?php

namespace App\Exports;

use App\Models\Registration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RegistrationsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Pega todos os registros.
        return Registration::get();
    }

    public function headings(): array
    {
        // Pega os nomes de todas as colunas da tabela
        return \Schema::getColumnListing((new Registration)->getTable());
    }
}
