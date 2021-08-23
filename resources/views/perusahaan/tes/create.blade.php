@extends('layouts.perusahaan_layout')

@section('title')
Perusahaan - Buat Lowongan
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Tes</h1>
    <button onclick="history.go(-1);"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</button>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Buat tes baru</h6>
    </div>
    <div class="card-body">

        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('perusahaan.tes.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-2 offset-1 mt-2" ><strong>Keterangan: </strong></div>
                <div class="col-8">         
                    <input type="text" name="keterangan" class="form-control" style="margin-left: -60px;"
                    placeholder="Masukkan keterangan tes. misal: Tes gelombang 1" value="{{ old('keterangan') }}" required>
                </div>

            </div>
            <div class="row mt-3">
                <div class="col-5 offset-1">
                    <div class="row">
                        <div class="col-auto mt-2"><strong>Tanggal Dibuka : </strong></div>
                        <div class="col offset-1"><input type="text" name="tanggal_dibuka" class="date form-control" id="tanggaldibuka" value="{{ old('tanggal_dibuka') }}" placeholder="Tanggal Dibuka"></div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="row">
                        <div class="col-auto mt-2"><strong>Tanggal Ditutup : </strong></div>
                        <div class="col"><input type="text" name="tanggal_ditutup" class="date form-control" id="tanggalditutup" value="{{ old('tanggal_ditutup') }}" placeholder="Tanggal Ditutup"></div>
                    </div>
                </div>
            </div>
            <div class="row mt-4 justify-content-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

    </div>
</div>
@endsection
@section('pagejs')
<script src="{{ asset('js/base.js') }}"></script>
<script>

    $(document).ready(function () {
        $(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        $(document).on('click', '.date', function(){
                $(this).datepicker({
                    changeMonth: true,
                    changeYear: true,
                    format: 'yyyy-mm-dd',
                    todayHighlight: true
                }).focus();
            });

        $("#tanggaldibuka").on('changeDate', function(selected) {
            var startDate = new Date(selected.date.valueOf());
            $("#tanggalditutup").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    format: 'yyyy-mm-dd',
                    todayHighlight: true,
                    setStartDate: startDate
            });
            $("#tanggalditutup").datepicker('setStartDate', startDate);
            if($("#tanggaldibuka").val() > $("#tanggalditutup").val()){
                $("#tanggalditutup").val($("#tanggaldibuka").val());
            }
        });
    });


</script>
@endsection
