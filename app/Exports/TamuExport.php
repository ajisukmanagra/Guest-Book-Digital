<?php

namespace App\Exports;

use App\Models\Tamu;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TamuExport implements FromView // FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        // return Tamu::all();
        return view('admin/export-excel', [
            'tamu' => Tamu::all()
        ]);
    }
}
