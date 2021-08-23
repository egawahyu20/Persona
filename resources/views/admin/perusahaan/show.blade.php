@extends('layouts.backend_layout')

@section('title')
Master Perusahaan
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Lihat Data</h1>
    <button onclick="history.go(-1);"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</button>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Perusahaan</h6>
    </div>
    {{-- @foreach($penyediaKerja as $pk) --}}
    <div class="card-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Perusahaan :</strong>
                    {{ $perusahaan->user->name }}
                </div>
                <div class="form-group">
                    <strong>No Telephone :</strong>
                    {{ $perusahaan->no_telephone }}
                </div>
                <div class="form-group">
                    <strong>Email :</strong>
                    {{ $perusahaan->user->email }}
                </div>
                <div class="form-group">
                    <strong>Website :</strong>
                    {{ $perusahaan->website }}
                </div>
                <div class="form-group">
                    <strong>Alamat Perusahaan :</strong>
                    {{ $perusahaan->alamat }}
                </div>
                <div class="form-group">
                    <strong>Provinsi :</strong>
                    {{ $perusahaan->lokasi->district->regency->province->name }}
                </div>
                <div class="form-group">
                    <strong>Kota / Kabupaten :</strong>
                    {{ $perusahaan->lokasi->district->regency->name }}
                </div>
                <div class="form-group">
                    <strong>Kecamatan :</strong>
                    {{ $perusahaan->lokasi->district->name }}
                </div>
                <div class="form-group">
                    <strong>Kelurahan :</strong>
                    {{ $perusahaan->lokasi->name }}
                </div>
                <div class="form-group">
                    <strong>Logo Perusahaan : </strong><br><br>
                    @if (!empty($perusahaan->logo_perusahaan))
                    <img class="img-responsive"
                        src="{{ asset('storage/logo_perusahaan/'.$perusahaan->id.'/'.$perusahaan->logo_perusahaan) }}"
                        style="width: 200px" ; height="200px">
                    @else
                    "Logo Tidak Ada"
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @endforeach --}}


@endsection
