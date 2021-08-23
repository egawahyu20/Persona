@extends('layouts.perusahaan_layout')

@section('title')
    Perusahaan Panel
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard </h1>
</div>

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Status Perusahaan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">                   
                          @if ($perusahaan->status_perusahaan == 1)
                            <i class="fas fa-check-circle" data-toggle="tooltip" title="Terverifikasi" style="color: green"></i> Perusahaan telah diverivikasi
                          @elseif ($perusahaan->status_perusahaan == 2)
                            <i class="fas fa-times-circle" data-toggle="tooltip" title="Ditolak" style="color: red"></i> Perusahaan Ditolak
                          @else
                            <strong>(Perusahaan belum diverifikasi)</strong>
                          @endif
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

                        <!-- Earnings (Annual) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
         <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Jumlah Tes</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jmlTes }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

                        <!-- Tasks Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                           Jumlah Peserta Tes
                        </div>
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $jmlPesertaTes }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-building fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
