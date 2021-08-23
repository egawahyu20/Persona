@extends('layouts.perusahaan_layout')

@section('title')
    Lihat Peserta Tes
@endsection

@section('content')

<!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Lihat Peserta</h1>
                        <button onclick="history.go(-1);"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</button>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Peserta</h6>
                        </div>
                        @foreach($dataPesertaTes as $peserta)
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group"><h3>
                                        <strong>Nama:</strong>
                                        {{ $peserta->nama_peserta_tes}}
                                    </h3>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h5 class="fw-bold"><strong>Pemusatan perhatian</strong></h5>
                                    <div class="row">
                                        <div class="col">Introvert (I)</div>
                                        <div class="col text-end">(E) Extrovert</div>
                                    </div>
                                    <div class="progress my-3">
                                        <div class="progress-bar bg-dark" role="progressbar" style="width: {{ $peserta->I }}%;"
                                            aria-valuenow="{{ $peserta->I }}" aria-valuemin="0" aria-valuemax="100">
                                            {{ $peserta->I }}%</div>
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: {{ $peserta->E }}%;"
                                            aria-valuenow="{{ $peserta->E }}" aria-valuemin="0" aria-valuemax="100">
                                            {{ $peserta->E }}%</div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h5 class="fw-bold"><strong>Cara memahami informasi dari luar</strong></h5>
                                    <div class="row">
                                        <div class="col">Sensing (S)</div>
                                        <div class="col text-end">(N) Intuition</div>
                                    </div>
                                    <div class="progress my-3">
                                        <div class="progress-bar bg-dark" role="progressbar" style="width: {{ $peserta->S }}%;"
                                            aria-valuenow="{{ $peserta->S }}" aria-valuemin="0" aria-valuemax="100">
                                            {{ $peserta->S }}%</div>
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: {{ $peserta->N }}%;"
                                            aria-valuenow="{{ $peserta->N }}" aria-valuemin="0" aria-valuemax="100">
                                            {{ $peserta->N }}%</div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h5 class="fw-bold"><strong>Cara menarik kesimpulan dan keputusan</strong></h5>
                                    <div class="row">
                                        <div class="col">Thinking (T)</div>
                                        <div class="col text-end">(F) Feeling</div>
                                    </div>
                                    <div class="progress my-3">
                                        <div class="progress-bar bg-dark" role="progressbar" style="width: {{ $peserta->T }}%;"
                                            aria-valuenow="{{ $peserta->T }}" aria-valuemin="0" aria-valuemax="100">
                                            {{ $peserta->T }}%</div>
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: {{ $peserta->F }}%;"
                                            aria-valuenow="{{ $peserta->F }}" aria-valuemin="0" aria-valuemax="100">
                                            {{ $peserta->F }}%</div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h5 class="fw-bold"><strong>Cara menghadapi dunia luar</strong></h5>
                                    <div class="row">
                                        <div class="col">Judging (J)</div>
                                        <div class="col text-end">(P) Perceiving</div>
                                    </div>
                                    <div class="progress my-3">
                                        <div class="progress-bar bg-dark" role="progressbar" style="width: {{ $peserta->J }}%;"
                                            aria-valuenow="{{ $peserta->J }}" aria-valuemin="0" aria-valuemax="100">
                                            {{ $peserta->J }}%</div>
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: {{ $peserta->P }}%;"
                                            aria-valuenow="{{ $peserta->P }}" aria-valuemin="0" aria-valuemax="100">
                                            {{ $peserta->P }}%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

@endsection
