@extends('adminlte::page')

@section('title', 'Anggota')

@section('content_header')
    <h1>Anggota</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">Anggota Detail</div>
    <div class="card-body">
        <table class="table table-striped">
        <tbody>
        <tr>
            <th>
                Nama
            </th>
            <td>
                {{$anggota->nama}}
            </td>
        </tr>
        <tr>
            <th>
                Nomer Anggota
            </th>
            <td>
                {{$anggota->nomer_anggota}}
            </td>
        </tr>

        <tr>
            <th>
                Alamat
            </th>
            <td>
                {{$anggota->alamat}}
            </td>
        </tr>
        
        <tr>
            <th>
                TTL
            </th>
            <td>
                {{$anggota->pob}}, {{$anggota->dob}}
            </td>
        </tr>

        <tr>
            <th>
                NIK
            </th>
            <td>
                {{$anggota->nik}}
            </td>
        </tr>
        
        <tr>
            <th>
                NIP
            </th>
            <td>
                {{$anggota->nip}}
            </td>
        </tr>
        
        </tbody>
        </table>
    </div>
    <div class="card-footer">
        <button class="btn btn-danger" data-toggle="modal" data-target="#modalConfirmDisable">
            Disable
        </button>
        <a class="btn btn-primary" href="{{route('anggotas_edit', $anggota->id)}}">
            Edit
        </a>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="modalConfirmDisable">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Konfirmasi</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            Apakah yakin untuk disable anggota tersebut?
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="disable_ok" data-id={{$anggota->id}}>Ok</button>
        </div>

        </div>
    </div>
</div>

@stop

@section('css')
    
@stop

@section('js')
    <script src="{{ asset('js/config.js')}}"></script>
    <script src="{{ asset('js/anggota/anggota_detail.js')}}"></script>
@stop