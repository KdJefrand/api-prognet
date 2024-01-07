<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggotakk;

class AnggotaKKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = Anggotakk::join('kks', 'anggotakks.kk_id', '=', 'kks.id')
            ->join('penduduks', 'anggotakks.penduduk_id', '=', 'penduduks.id')
            ->join('hubungankks', 'anggotakks.hubungankk_id', '=', 'hubungankks.id')
            ->select('anggotakks.id', 'kks.nokk', 'penduduks.nama', 'hubungankks.hubungankk', 'anggotakks.statusaktif', 'anggotakks.kk_id')
            ->get();

        return $anggota;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $anggotakk = new Anggotakk();
        $anggotakk->fill($request->all())->save();
        return $anggotakk;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anggota = Anggotakk::join('kks', 'anggotakks.kk_id', '=', 'kks.id')
            ->join('penduduks', 'anggotakks.penduduk_id', '=', 'penduduks.id')
            ->join('hubungankks', 'anggotakks.hubungankk_id', '=', 'hubungankks.id')
            ->select('anggotakks.id', 'kks.nokk', 'penduduks.nama', 'hubungankks.hubungankk', 'anggotakks.statusaktif', 'anggotakks.hubungankk_id', 'anggotakks.kk_id', 'anggotakks.penduduk_id')
            ->where('anggotakks.id', $id)
            ->get();

        return $anggota;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $anggotakk = Anggotakk::find($id);
        $anggotakk->fill($request->all())->save();
        return $anggotakk;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggotakk = Anggotakk::find($id);
        $anggotakk->delete();
    }
}
