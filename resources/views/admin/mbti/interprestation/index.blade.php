@extends('layouts.backend_layout')

@section('title')
Master MBTI Interprestation
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Master MBTI Interprestation</h1>
</div>

<!-- DataTales Example -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data MBTI Interprestation</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Personality</th>
                        <th>Alias</th>
                        <th>Partner</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($interpres as $int)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $int->personality }}</td>
                        <td>{{ $int->alias }}</td>
                        <td>{{ $int->partner }}</td>
                        <td>
                            <a href="{{ route('mbti.interpres.edit',$int->id) }}" class="btn btn-success btn-icon-split">
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
