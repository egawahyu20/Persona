@extends('layouts.backend_layout')

@section('title')
Admin Panel
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard </h1>
</div>

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-12 mb-4">
        <div class="card border-left-primary shadow h-100 py-4">
            <di class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Users</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jmlUser }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </di>
        </div>
    </div>

    <!-- Earnings (Annual) Card Example -->
    <div class="col-xl-6 col-md-12 mb-4">
        <div class="card border-left-success shadow h-100 py-4">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Perusahaan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jmlPerusahaan }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tasks Card Example -->
    <div class="col-xl-6 col-md-12 mb-4">
        <div class="card border-left-info shadow h-100 py-4">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Jumlah Tes Perusahaan
                        </div>
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $jmlTes }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-6 col-md-12 mb-4">
        <div class="card border-left-warning shadow h-100 py-4">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Data Hasil Tes</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jmlDataTes }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
