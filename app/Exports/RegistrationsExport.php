<?php

namespace App\Exports;

use App\Models\Registration;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings; 

class RegistrationsExport implements FromQuery,  WithHeadings
{
    use Exportable;

    public function __construct(private int $event_id) {}
 
    public function query()
    {
        return Registration::query()->whereEventId($this->event_id)->select([
            'name',
            'email',
            'phone',
            'status',
            'registered_at',
        ]);
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Phone',
            'Status',
            'Registered At',
        ];
    }
}
