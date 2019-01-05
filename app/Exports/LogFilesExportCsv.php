<?php

namespace App\Exports;

use App\Activity;
use Maatwebsite\Excel\Concerns\FromCollection;

class LogFilesExportCsv implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Activity::select('id', 'description', 'created_at', 'updated_at')->get();
    }

    public function headings(): array
    {
        return $this->collection()->keys()->toArray();
    }
}
