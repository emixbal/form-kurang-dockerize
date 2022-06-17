@extends('adminlte::page')

@section('content_header')
    <h1>Anggota</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">List Anggota</div>
    <div class="card-body">
        <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>TTL</th>
                <th>NIP</th>
                <th>NIK</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($anggota as $anggota)
        <tr>
            <td>
                <a href='{{url("/anggota/{$anggota->id}")}}''>
                    {{$anggota->nama}}
                </a>
            </td>
            <td>{{$anggota->pob}}, {{$anggota->dob}}</td>
            <td>{{$anggota->nip}}</td>
            <td>{{$anggota->nik}}</td>
        </tr>
        @endforeach
        </tbody>
        </table>
    </div>
</div>

@stop

@section('css')
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop