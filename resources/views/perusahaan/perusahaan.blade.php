@extends('layouts.perusahaan_layout')

@section('title')
    Perusahaan Panel
@endsection

@section('content')

<h1 class="h3 mb-4 text-gray-800">Profile Perusahaan</h1>
<div class="row">
  <div class="col">
    <div class="card shadow">
      <div class="card-header">
        <div class="row">
          <div class="col pt-2">
            Data Perusahaan
          </div>
          <div class="text-left">
                <a class="btn btn-primary" href="{{ route('perusahaan.edit') }}">
                    Edit Data Perusahaan
                </a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="media">
         @if (!empty($perusahaan->logo_perusahaan))
         <img class="mr-3"  src="{{ asset('storage/logo_perusahaan/'.$perusahaan->id.'/'.$perusahaan->logo_perusahaan) }}"
         alt="Generic placeholder image"  style="width: 100px" ; height="100px">
         @else
         <img class="mr-3" src="{{ asset('sb-admin/img/undraw_profile.svg') }}" alt="Generic placeholder image">
         @endif
          <div class="media-body">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Perusahaan :</strong>
                    {{ $authData->name }} 
                    @if ($perusahaan->status_perusahaan == 1)
                      <i class="fas fa-check-circle" data-toggle="tooltip" title="Terverifikasi" style="color: green"></i>
                    @elseif ($perusahaan->status_perusahaan == 2)
                      <i class="fas fa-times-circle" data-toggle="tooltip" title="Ditolak" style="color: red"></i>   
                    @else
                      <strong>(Perusahaan belum diverifikasi)</strong>
                    @endif
                </div>
                <div class="form-group">
                    <strong>No Telephone :</strong>
                    {{ $perusahaan->no_telephone }}
                </div>
                <div class="form-group">
                    <strong>Email :</strong>
                    {{ $authData->email }}
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
                    <strong>Kelurahan :</strong>
                    {{ $perusahaan->lokasi->name }}
                </div>
                <div class="form-group">
                    <strong>Kecamatan :</strong>
                    {{ $perusahaan->lokasi->district->name }}
                </div>
                <div class="form-group">
                    <strong>Kota / Kabupaten :</strong>
                    {{ $perusahaan->lokasi->district->regency->name }}
                </div>
                <div class="form-group">
                    <strong>Provinsi :</strong>
                    {{ $perusahaan->lokasi->district->regency->province->name }}
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
