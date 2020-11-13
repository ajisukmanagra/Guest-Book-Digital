<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tamu;
use App\Models\Setting;
use App\Exports\TamuExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Response;
use PDF;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tamu_1 = Tamu::where('tujuan', 1)->count();
        $tamu_2 = Tamu::where('tujuan', 2)->count();
        $tamu_3 = Tamu::where('tujuan', 3)->count();
        $tamu_4 = Tamu::where('tujuan', 4)->count();
        $tamu_5 = Tamu::where('tujuan', 5)->count();
        $tamu_6 = Tamu::where('tujuan', 6)->count();
        $tamu_7 = Tamu::where('tujuan', 7)->count();
        return view('admin/index', compact('tamu_1', 'tamu_2', 'tamu_3', 'tamu_4', 'tamu_5', 'tamu_6', 'tamu_7'));
        // return $time_mont;
    }

    public function permintaan(Request $request)
    {
        $tamu = Tamu::get();

        if ($request->has('cari')) {
            $tamu = Tamu::where('tujuan', 'like', "%" . $request->get('cari') . "%")
                ->get();
        }
        return view('admin/permintaan', compact('tamu'));
    }

    public function permintaan_hapus($id)
    {
        Tamu::find($id)->delete();
        return redirect('/admin/permintaan');
    }

    public function permintaan_show($id)
    {
        $permintaan = Tamu::where('id', $id)->first();
        return $permintaan;
    }

    public function export_excel_date(Request $request)
    {
        $tamu = Tamu::whereDate('created_at', $request->get('option'), $request->get('tanggal'))->get();
        $nama_file = 'Laporan Tamu ' . ' ' . date('d F Y - H:i') . '.xlsx';
        return Response::view('admin.export-excel', [
            'tamu' => $tamu
        ])->header('Content-Type', 'application/vnd-ms-excel') // application/pdf for export to PDF
            ->header('Content-Disposition', "attachment; filename=" . $nama_file . "");
    }

    public function export_excel_all()
    {
        $nama_file = 'Laporan Tamu ' . ' ' . date('d F Y - H:i') . '.xlsx';
        return Excel::download(new TamuExport, $nama_file);
    }

    public function cetak_pdf()
    {
        $tamu = DB::table('tamus')
            ->select('tanggal', DB::raw('count(*) as total_tamu'))
            ->groupBy('tanggal')
            ->get();

        $pdf = PDF::loadview('admin/cetak-pdf', compact('tamu'))->setPaper('A4', 'potrait');
        return $pdf->stream();
    }

    public function setting()
    {
        $setting = Setting::get();
        return view('admin/setting', compact('setting'));
    }

    public function setting_get($id)
    {
        $setting = Setting::where('id', $id)->first();
        return $setting;
    }

    public function setting_update(Request $request, $id)
    {
        Setting::find($id)->update([
            'email' => $request->get('email'),
        ]);

        return redirect('/admin/pengaturan');
    }
}
