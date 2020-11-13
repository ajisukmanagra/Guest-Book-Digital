<?php

namespace App\Http\Controllers;

use App\Mail\InformasiPengajuanPertemuan;
use App\Models\Setting;
use App\Models\Tamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class TamuController extends Controller
{
    public function index()
    {
        return view('tamu/index');
    }

    public function success()
    {
        return view('/tamu/success');
    }

    public function store(Request $request)
    {
        $nama = $this->getName($request->foto, '');
        $name = uniqid();
        $path = "public/img/" . $name . "" . $nama;
        $path_db = "/storage/img/" . $name . "" . $nama;
        $put = Storage::put(
            $path,
            base64_decode($this->base64_clean($request->foto))
        );

        $toDB = Tamu::insert([
            'nama_tamu' => $request->get('nama_tamu'),
            'nik_ktp' => $request->get('nik_ktp'),
            'deskripsi' => $request->get('deskripsi'),
            'tujuan' => $request->get('tujuan'),
            'no_hp' => $request->get('no_hp'),
            'alamat' => $request->get('alamat'),
            'foto' => $path_db,
            'created_at' => date('Y-m-d H:i:s'),
            'tanggal' => date('Y-m-d'),
        ]);

        // Get Data
        $kepala_sekolah = Setting::where('id', 1)->first()->email;
        $tata_usaha = Setting::where('id', 2)->first()->email;
        $kesiswaan = Setting::where('id', 3)->first()->email;
        $kurikulum = Setting::where('id', 4)->first()->email;
        $humas = Setting::where('id', 5)->first()->email;
        $ketua_jurusan = Setting::where('id', 6)->first()->email;
        $wali_kelas = Setting::where('id', 7)->first()->email;

        if ($request->get('tujuan') == 1) {
            Mail::to($kepala_sekolah)->send(new InformasiPengajuanPertemuan());
        } else if ($request->get('tujuan') == 2) {
            Mail::to($tata_usaha)->send(new InformasiPengajuanPertemuan());
        } else if ($request->get('tujuan') == 3) {
            Mail::to($kesiswaan)->send(new InformasiPengajuanPertemuan());
        } else if ($request->get('tujuan') == 4) {
            Mail::to($kurikulum)->send(new InformasiPengajuanPertemuan());
        } else if ($request->get('tujuan') == 5) {
            Mail::to($humas)->send(new InformasiPengajuanPertemuan());
        } else if ($request->get('tujuan') == 6) {
            Mail::to($ketua_jurusan)->send(new InformasiPengajuanPertemuan());
        } else if ($request->get('tujuan') == 7) {
            Mail::to($wali_kelas)->send(new InformasiPengajuanPertemuan());
        } else {
            return "Tidak ada dalam daftar";
        }

        return redirect('/tamu_sukses_form');
    }

    public function getName($req, $name)
    {
        $img = preg_replace('/^data:image\/\w+;,/', '', $req);
        $type = explode(';', $img)[0];
        $type = explode('/', $type)[1];
        return $name . '.' . $type;
    }

    private function base64_clean($base64_raw)
    {
        $base64 = explode(',', $base64_raw);
        return $base64[1];
    }
}
