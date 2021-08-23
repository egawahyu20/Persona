@extends('layouts.backend_layout')

@section('title')
Edit Master MBTI Question
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit MBTI Question</h1>
    <button onclick="history.go(-1);"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</button>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data MBTI Interprestation</h6>
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

        @foreach($question as $qst)

        <form action="{{ route('mbti.question.update',$qst->id) }}" method="POST">
            @csrf
            @method('POST')

            <div class="row">
                <input type="hidden" name="id" value="{{ $qst->id }}">
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <strong>Pernyataan 1:</strong>
                        <input type="text" name="statement1" value="{{ $qst->statement1 }}" class="form-control">
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <strong>Kode:</strong>
                        <input type="text" name="type1" value="{{ $qst->type1 }}" class="form-control">
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <strong>Pernyataan 2:</strong>
                        <input type="text" name="statement2" value="{{ $qst->statement2 }}" class="form-control">
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <strong>Kode:</strong>
                        <input type="text" name="type2" value="{{ $qst->type2 }}" class="form-control">
                    </div>
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
