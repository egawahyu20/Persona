@extends('layouts.perusahaan_layout')

@section('title')
Perusahaan - Lihat Hasil Tes
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Hasil Tes </h1>
    <button onclick="history.go(-1);"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</button>
</div>

<div class="card border-secondary shadow h-100">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail" role="tab"
                    aria-controls="detail" aria-selected="true">Detail</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pelamar-tab" data-toggle="tab" href="#peserta-tes" role="tab"
                    aria-controls="peserta-tes" aria-selected="false">Peserta Tes</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Token :</strong>
                        {{ $tes->token }}
                    </div>
                    <div class="form-group">
                        <strong>Keterangan :</strong>
                        {{ $tes->keterangan }}
                    </div>
                    <div class="form-group">
                        <strong>Tanggal dibuka :</strong>
                        {{ $tes->tanggal_dibuka }}
                    </div>
                    <div class="form-group">
                        <strong>Tanggal ditutup :</strong>
                        {{ $tes->tanggal_ditutup }}
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="peserta-tes" role="tabpanel" aria-labelledby="peserta-tes-tab">
                <h5 class="card-title">Peserta tes</h5>
                <a href="{{ route('perusahaan.tes.export.excel',$tes->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-download"></i> Download</a>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%">
                        <thead aria-rowspan="2">
                            <tr>
                                <th>No</th>
                                <th>Nama Peserta</th>
                                <th>Kepribadian</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataPesertaTes as $peserta)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $peserta->nama_peserta_tes }}</td>
                                <td>{{ $peserta->personality }}</td>
                                <td>
                                    <form action="" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('perusahaan.peserta.tes.show',$peserta->id) }}" class="btn btn-primary btn-icon-split" data-toggle="tooltip" title="Klik untuk menerima">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-icon-split"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('pagejs')

<!-- Page level plugins -->
<script src="{{ asset('sb-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('sb-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('sb-admin/js/demo/datatables-demo.js') }}"></script>

@endsection
