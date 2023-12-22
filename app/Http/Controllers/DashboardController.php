<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Anggotakk;
use App\Models\Hubungankk;
use App\Models\Kk;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $agama = Agama::all()->count();
        $penduduk = Penduduk::all()->count();
        $hubungan = Hubungankk::all()->count();
        $kk = Kk::all()->count();
        $anggota = Anggotakk::all()->count();

        return response()->json([
            'agama' => $agama,
            'penduduk' => $penduduk,
            'hubungan' => $hubungan,
            'kk' => $kk,
            'anggota' => $anggota,
        ]);
    }
}
