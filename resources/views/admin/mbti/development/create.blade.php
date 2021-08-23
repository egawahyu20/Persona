@extends('layouts.backend_layout')

@section('title')
Create MBTI Development
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Pengembangan Diri</h1>
    <button onclick="history.go(-1);"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</button>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pengembngan Diri</h6>
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

        <form action="{{ route('mbti.development.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <strong for="exampleFormControlSelect1" id="interprestation">Kepribadian</strong>
                    <select name="mbti_interprestation_id" class="form-control" id="interprestation">
                        <option value="" selected>Pilih jenis kepribadian</option>
                        @foreach ($interpres as $item)
                        <option value="{{ $item->id }}">{{ $item->personality }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Pengembangan Diri:</strong>
                        <input type="text" name="development_suggestion" class="form-control">
                    </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection
