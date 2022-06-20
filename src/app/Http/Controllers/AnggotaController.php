<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = Anggota::all();

        $pass = [
            "anggota"=>$anggota,
        ];
        
        return view('anggota/index', $pass);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anggota/input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:2',
        ]);

        if ($validator->fails()) {
            return redirect('anggota/new')
            ->withErrors($validator)
            ->withInput();
        }

        $year   = $request->year;
        $month  = $request->month[0];
        $day    = $request->day;

        if($year < 1950 || $year > 2050){
            return redirect('anggota/new')
            ->withErrors("Invalid tahun lahir")
            ->withInput();
        }
        if($month < 1 || $month > 12){
            return redirect('anggota/new')
            ->withErrors("Invalid bulan lahir")
            ->withInput();
        }
        if($day < 1 || $day > 31){
            return redirect('anggota/new')
            ->withErrors("Invalid tanggal lahir")
            ->withInput();
        }

        $dob = date('Y-m-d H:i:s', mktime(0, 0, 0, $month, $day, $year));

        $anggota = new Anggota;

        $anggota->nama = $request->nama;
        $anggota->alamat = $request->alamat;
        $anggota->nomer_anggota = ($request->nip)?$request->nip:NULL;
        $anggota->pob = $request->pob;
        $anggota->dob = $dob;
        $anggota->nik = $request->nik;
        $anggota->nip = $request->nip;

        try {
            $anggota->save();
        } catch (\Throwable $e) {
            return redirect('anggota/new')
            ->withErrors($e->getMessage())
            ->withInput();
        }

        return redirect()->route('anggota_show', $anggota->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anggota = Anggota::find($id);

        $pass = [
            "anggota"=>$anggota,
        ];
        
        if(!$anggota){
            return view('anggota/detail_404', $pass);
        }

        return view('anggota/detail', $pass);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggota $anggota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anggota $anggota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anggota $anggota)
    {
        //
    }
}
