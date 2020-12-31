<?php

namespace App\Exports;

use App\{Absen, Teacher};
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize, WithStyles
{
    // public function view(): View
    // {

    //     return view('admin.export.details-attendance-table', [
    //         'data_absen' =>  Absen::all(),
    //     ]);
    // }

    public function collection()
    {
        return Absen::all();
    }

    public function map($absen): array
    {
        return [
            'NAMA' => $absen->teacher->name,
            'TANGGAL' => $absen->date,
            'ABSEN MASUK' => $absen->time_in,
            'ABSEN PULANG' => $absen->time_out,
            'KETERANGAN' => $absen->note,
        ];
    }

    public function headings(): array
    {
        return [
            'NAMA',
            'TANGGAL',
            'ABSEN MASUK',
            'ABSEN PULANG',
            'KETERANGAN',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['family' => 'Open Sans','bold' => true, 'size' => 14], ['color' => 'black']],

        ];
    }

}
