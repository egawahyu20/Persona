@extends('layouts.perusahaan_layout')

@section('title')
    Perusahaan Panel
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Data Perusahaan</h1>
    <button onclick="history.go(-1);"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</button>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Perusahaan</h6>
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

        <form action="{{ route('perusahaan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Perusahaan: </strong>
                        <input type="text" name="nama_perusahaan" class="form-control"
                            placeholder="Masukkan Nama Perusahaan" value="{{ $authData->name }}" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Alamat: </strong>
                        <input type="text" name="alamat" class="form-control"
                            placeholder="Masukkan Alamat Perusahaan" value="{{ old('alamat') }}" required>
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <strong for="exampleFormControlSelect1" id="provinsi">Provinsi</strong>
                    <select name="indonesia_provinces" class="form-control" id="provinsi">
                        <option value="">-- Plih Provinsi --</option>
                        @foreach ($provinsi as $prov)
                        <option value="{{ $prov->id }}">{{ $prov->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <strong for="exampleFormControlSelect2" id="kota">Kota/Kabupaten</strong>
                    <select name="indonesia_cities" class="form-control" id="kota">
                        <option value="">-- Pilih Kota/Kabupaten</option>
                    </select>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <strong for="exampleFormControlSelect3">Kecamatan</strong>
                    <select name="indonesia_districts" class="form-control" id="kelurahan">
                        <option value="">-- Pilih Kecamatan</option>
                    </select>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <strong for="exampleFormControlSelect4">Kelurahan</strong>
                    <select name="indonesia_villages" class="form-control" id="kecamatan">
                        <option value="">-- Pilih Kelurahan</option>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>Website: </strong>
                        <input type="text" name="website" class="form-control" placeholder="Masukkan Alamat Website"
                        value="{{ old('website') }}" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email: </strong>
                        <input type="text" name="email" class="form-control" placeholder="Masukkan Email" value="{{ $authData->email }}" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>No Telepon: </strong>
                        <input type="text" name="no_telephone" class="form-control" placeholder="Masukkan No Telp" value="{{ old('no_telephone') }}" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <strong>Logo : </strong>
                    <div class="custom-file">
                        <input name="logo_perusahaan" type="file" class="custom-file-input" id="logo" accept="image/*">
                        <label class="custom-file-label" for="logo">Choose file</label>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3 text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>

    </div>
</div>

@endsection
@section('pagejs')
<script>
    $(document).ready(function () {
        $(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        $('select[name="indonesia_provinces"]').on('change', function () {
            var provinsiID = $(this).val();
            console.log(provinsiID);
            if (provinsiID) {
                $.ajax({
                    url: "{{ route('perusahaan.kota') }}",
                    type: "POST",
                    data: {
                        provinsi_id: provinsiID
                    },
                    headers: {
                        "X-CSRF-Token": $("input[name='_token']").val()
                    },
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        $('select[name="indonesia_cities"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="indonesia_cities"]').append(
                                '<option value="' + key + '">' + value +
                                '</option>');
                        });
                    }
                });
            } else {
                $('select[name="indonesia_cities"]').empty();
            }
        });

        $('select[name="indonesia_cities"]').on('change', function () {
            var kotaID = $(this).val();
            console.log(kotaID);
            if (kotaID) {
                $.ajax({
                    url: "{{ route('perusahaan.kecamatan') }}",
                    type: "POST",
                    data: {
                        kota_id: kotaID
                    },
                    headers: {
                        "X-CSRF-Token": $("input[name='_token']").val()
                    },
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        $('select[name="indonesia_districts"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="indonesia_districts"]').append(
                                '<option value="' + key + '">' + value +
                                '</option>');
                        });
                    }
                });
            } else {
                $('select[name="indonesia_districts"]').empty();
            }
        });

        $('select[name="indonesia_districts"]').on('change', function () {
            var kecamatanID = $(this).val();
            console.log(kecamatanID);
            if (kecamatanID) {
                $.ajax({
                    url: "{{ route('perusahaan.kelurahan') }}",
                    type: "POST",
                    data: {
                        kecamatan_id: kecamatanID
                    },
                    headers: {
                        "X-CSRF-Token": $("input[name='_token']").val()
                    },
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        $('select[name="indonesia_villages"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="indonesia_villages"]').append(
                                '<option value="' + key + '">' + value +
                                '</option>');
                        });
                    }
                });
            } else {
                $('select[name="indonesia_villages"]').empty();
            }
        });
    });
</script>
@endsection
