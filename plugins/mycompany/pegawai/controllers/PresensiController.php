<?php namespace MyCompany\Pegawai\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use MyCompany\Pegawai\Models\Pegawai;
use MyCompany\Pegawai\Models\Presensi;
use Carbon\Carbon;

class PresensiController extends Controller
{
    public function index()
    {
        $pegawaiId = Session::get('pegawai_id');
        if (!$pegawaiId) {
            return Redirect::to('/login');
        }

        $pegawai = Pegawai::find($pegawaiId);
        $presensiHariIni = Presensi::where('pegawai_id', $pegawaiId)
            ->where('tanggal', Carbon::today())
            ->first();

        // Ambil seluruh riwayat presensi untuk tabel
        $data = Presensi::where('pegawai_id', $pegawaiId)
            ->orderBy('tanggal', 'desc')
            ->get();

        return View::make('mycompany.pegawai::presensi', [
            'pegawai' => $pegawai,
            'presensiHariIni' => $presensiHariIni,
            'data' => $data, // ⬅️ ganti dari 'riwayat' jadi 'data'
        ]);
    }

    public function masuk()
    {
        $pegawaiId = Session::get('pegawai_id');
        if (!$pegawaiId) {
            return Redirect::to('/login');
        }

        Presensi::firstOrCreate(
            [
                'pegawai_id' => $pegawaiId,
                'tanggal' => Carbon::today()
            ],
            [
                'jam_masuk' => Carbon::now()
            ]
        );

        return Redirect::to('/presensi')->with('success', 'Presensi masuk berhasil!');
    }

    public function pulang()
    {
        $pegawaiId = Session::get('pegawai_id');
        if (!$pegawaiId) {
            return Redirect::to('/login');
        }

        $presensi = Presensi::where('pegawai_id', $pegawaiId)
            ->where('tanggal', Carbon::today())
            ->first();

        if ($presensi && !$presensi->jam_pulang) {
            $presensi->jam_pulang = Carbon::now();
            $presensi->save();

            return Redirect::to('/presensi')->with('success', 'Presensi pulang berhasil!');
        }

        return Redirect::to('/presensi')->with('error', 'Anda belum presensi masuk atau sudah presensi pulang hari ini.');
    }
}
