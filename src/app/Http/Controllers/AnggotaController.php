<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Unit;
use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();

        $pass = [
            "anggota"=>$anggota,
        ];
        
        return view('anggota/index', $pass);
    }

    public function create()
    {
        $units = Unit::all()->sortBy('nama_instansi');

        $pass = [
            "units"=>$units,
        ];

        return view('anggota/input', $pass);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:2',
            'alamat' => 'required',
            'nik' => 'required|min:16|unique:anggotas,nik',
            'nip' => 'required|unique:anggotas,nip',
            'pob' => 'required',
            'image' => 'required|image|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect('anggota_kekurangan/new')
            ->withErrors($validator)
            ->withInput();
        }

        if($request->unit==""){
            return redirect('anggota_kekurangan/new')
            ->withErrors("Unit harus diisi")
            ->withInput();
        }

        $year   = $request->year;
        $month  = $request->month;
        $day    = $request->day;

        if($year < 1950 || $year > 2050){
            return redirect('anggota_kekurangan/new')
            ->withErrors("Invalid tahun lahir")
            ->withInput();
        }
        if($month < 1 || $month > 12){
            return redirect('anggota_kekurangan/new')
            ->withErrors("Invalid bulan lahir")
            ->withInput();
        }
        if($day < 1 || $day > 31){
            return redirect('anggota_kekurangan/new')
            ->withErrors("Invalid tanggal lahir")
            ->withInput();
        }

        $dob = date('Y-m-d H:i:s', mktime(0, 0, 0, $month, $day, $year));

        $anggota = new Anggota;

        $anggota->nama = $request->nama;
        $anggota->unit = $request->unit;
        $anggota->alamat = $request->alamat;
        $anggota->nomer_anggota = ($request->nip)?$request->nip:NULL;
        $anggota->pob = $request->pob;
        $anggota->dob = $dob;
        $anggota->nik = $request->nik;
        $anggota->nip = $request->nip;

        $imageName = time().'.'.$request->file('image')->extension();

        try {
            $request->image->move(public_path('foto_anggota'), $imageName);
        } catch (\Throwable $e) {
            return redirect('anggota_kekurangan/new')
            ->withErrors($e->getMessage())
            ->withInput();
        }

        $anggota->image = $imageName;
        
        try {
            $anggota->save();
        } catch (\Throwable $e) {
            return redirect('anggota_kekurangan/new')
            ->withErrors($e->getMessage())
            ->withInput();
        }

        return redirect()->route('anggota_show', $anggota->id);
    }

    public function show_image($id)
    {
        $anggota = Anggota::find($id);

        if(!$anggota){
            return "image not found";
        }

        $fullpath = public_path("foto_anggota/$anggota->image");
        return response()->file($fullpath);
    }

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
}
