<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;

class PrintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cari = Pembayaran::join('siswa', 'siswa.id', '=', 'pembayaran.idsiswa')
            ->join('kelas', 'kelas.id', '=', 'pembayaran.idkelas')
            ->join('gunabayar', 'gunabayar.id', '=', 'pembayaran.idgunabayar')
            ->where('pembayaran.id', $id)
            ->select(
                'pembayaran.id as id',
                'pembayaran.tanggalbayar as tanggalcetak',
                'pembayaran.jumlahbayar as jumlahbayar',
                'pembayaran.wajibbayar as wajibbayar',
                'pembayaran.tahun as tahun',
                'siswa.nama as nama',
                'kelas.tingkat as tingkat',
                'kelas.jurusan as jurusan',
                'gunabayar.gunabayar as gunabayar',
            )
            ->first();

        return view('pages.cetakpdf.printkwitansi', compact('cari'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
