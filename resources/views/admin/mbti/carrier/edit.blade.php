@extends('layouts.backend_layout')

@section('title')
Edit Master MBTI Carrier
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Karir MBTI</h1>
    <button onclick="history.go(-1);"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</button>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Karir MBTI</h6>
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

        @foreach($carrier as $carrier)

        <form action="{{ route('mbti.carrier.update',$carrier->id) }}" method="POST">
            @csrf
            @method('POST')
            <input type="hidden" value="{{ $carrier->id }}" name="id">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <strong for="exampleFormControlSelect1" id="interprestation">Kepribadian</strong>
                    <select name="mbti_interprestation_id" class="form-control" id="interprestation">
                        @foreach ($interpres as $item)
                        <option value="{{ $item->id }}" @if ($carrier->mbti_interprestation_id == $item->id)
                            selected
                        @endif>{{ $item->personality }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Karakter:</strong>
                        <input type="text" name="carrier_suggestion" value="{{ $carrier->carrier_suggestion }}" class="form-control">
                    </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
        @endforeach

    </div>
</div>

@endsection
