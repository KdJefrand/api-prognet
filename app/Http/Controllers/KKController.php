<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kk;
use App\Models\Anggotakk;

class KKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Kk::all();
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
        $kk = new Kk();
        $kk->fill($request->all())->save();
        return $kk;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Kk::find($id);
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
        $kk = Kk::find($id);
        $kk->fill($request->all())->save();
        return $kk;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kk = Kk::find($id);
        $kk->delete();
    }

    public function anggota($nokk)
    {
        $anggota = Anggotakk::join('kks', 'anggotakks.kk_id', '=', 'kks.id')
            ->join('penduduks', 'anggotakks.penduduk_id', '=', 'penduduks.id')
            ->join('hubungankks', 'anggotakks.hubungankk_id', '=', 'hubungankks.id')
            ->select('anggotakks.id', 'kks.nokk', 'penduduks.nama', 'hubungankks.hubungankk', 'anggotakks.statusaktif', 'anggotakks.kk_id')
            ->where('kks.nokk', $nokk)
            ->get();

        return $anggota;
    }
}
