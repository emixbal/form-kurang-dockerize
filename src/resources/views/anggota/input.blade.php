@extends('adminlte::page')

@section('title', 'User')

@section('content_header')
    <h1>Form Anggota</h1>
@stop

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/anggota/new">
    @csrf
    <div class="form-group">
        <label for="nama">Nama</label>
        <input maxlength="100" type="text" class="form-control" id="nama" placeholder="Enter Nama" name="nama">
    </div>

    <div class="row">
        <div class="col-sm-3">
        
            <div class="form-group">
                <label for="nama">Tempat Lahir</label>
                <input maxlength="100" type="text" class="form-control" id="pob" placeholder="Enter Tempat Lahir" name="pob">
            </div>
        
        </div>
        <div class="col-sm-6">
            <div class="row">
                
                <div class="form-group col-sm-3">
                    <label for="nama">Tanggal</label>
                    <input  min="1" max="31" type="number" class="form-control" id="day" placeholder="Enter Tanggal Lahir" name="day">
                </div>

                <div class="form-group col-sm-4">
                    <label for="sel1">Bulan:</label>
                    <select class="form-control" id="month" name="month[]">
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div> 

                <div class="form-group col-sm-3">
                    <label for="nama">Tahun</label>
                    <input min="1950" max="2050" type="number" class="form-control" id="year" placeholder="Enter Tahun Lahir" name="year">
                </div>

            </div>
        </div>
    </div>
    
    <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" id="alamat" value="{{ old('alamat') }}" placeholder="Enter Alamat" name="alamat"></textarea>
    </div>
    
    <div class="form-group">
        <label>NIK</label>
        <input type="text" class="form-control" id="nik" value="{{ old('nik') }}" placeholder="Enter NIK" name="nik">
    </div>

    <div class="form-group">
        <label>NIP</label>
        <input type="text" class="form-control" id="nip" value="{{ old('nip') }}" placeholder="Enter NIP" name="nip">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop

@section('css')
    
@stop

@section('js')
    <script src="{{ asset('js/config.js')}}"></script>
@stop