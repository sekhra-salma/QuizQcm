<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;


class UsersExportpr implements WithHeadings
{   
    public function headings(): array
    {
        return [
            'name',
            'email',
            'password',
            
        ];
    }
}
