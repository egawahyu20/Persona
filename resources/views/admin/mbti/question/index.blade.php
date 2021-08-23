@extends('layouts.backend_layout')

@section('title')
Master MBTI Quest
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Master MBTI Question</h1>
</div>

<!-- DataTales Example -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data MBTI Question</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pernyataan 1</th>
                        <th>Tipe</th>
                        <th>Pernyataan 2</th>
                        <th>Tipe</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($question as $qst)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $qst->statement1 }}</td>
                        <td>{{ $qst->type1 }}</td>
                        <td>{{ $qst->statement2 }}</td>
                        <td>{{ $qst->type2 }}</td>
                        <td>
                            <a href="{{ route('mbti.question.edit',$qst->id) }}" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="far fa-edit"></i>
                                </span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
