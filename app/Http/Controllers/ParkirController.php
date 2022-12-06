<?php

namespace App\Http\Controllers;

use App\Models\Parkir;
use Illuminate\Http\Request;
use DataTables;

class ParkirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['parkir'] = Parkir::all();
        return view('tabel', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form_chekin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posted = $request->all();

        $data = array(
            'nomor_polisi'      =>$posted['nomor_polisi'],
            'tanggal_masuk'     =>$posted['tanggal_masuk'],
            'jam_masuk'         =>$posted['jam_masuk'],
            'jenis_kendaraan'   =>$posted['jenis_kendaraan'],
        );
        $store = Parkir::create($data);
        
        return redirect()->route('index');
    }

    public function storecheckout(Request $request, $id)
    {
        $posted = $request->all();
        $parkir = Parkir::find($id);
        
        $parkir->tanggal_keluar = $posted['tanggal_keluar'];
        $parkir->jam_keluar = $posted['jam_keluar'];
        $parkir->biaya_parkir = $posted['biaya_parkir'];
        
        $parkir->save();
        
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parkir  $parkir
     * @return \Illuminate\Http\Response
     */
    public function get_data(Request $request)
    {
        $posted = $request->all();
        $parkir = Parkir::find($posted['id']);
        // dd($parkir);
        return response()->json($parkir);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parkir  $parkir
     * @return \Illuminate\Http\Response
     */
    public function edit(Parkir $parkir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parkir  $parkir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parkir $parkir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parkir  $parkir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parkir $parkir)
    {
        //
    }
}
