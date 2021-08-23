@extends('layouts.backend_layout')

@section('title')
Master MBTI Development
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Master MBTI Development</h1>
    <a href="{{ route('mbti.development.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-plus-square fa-sm text-white-50"></i> Tambah</a>
</div>

<!-- DataTales Example -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pengembangan Diri MBTI</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Personality</th>
                        <th>Pengembangan Diri</th>
                        <th class="col-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dev as $dev)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                        @foreach ($interpres as $i)
                            @if ( $dev->mbti_interprestation_id == $i->id)
                                {{ $i->personality }}
                            @endif
                        @endforeach
                        </td>
                        <td>{{ $dev->development_suggestion }}</td>
                        <td>
                            <form action="{{ route('mbti.development.delete',$dev->id) }}" method="POST">
                                <a href="{{ route('mbti.development.edit',$dev->id) }}" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="far fa-edit"></i>
                                    </span>
                                </a>
                                @csrf
                                <button type="submit" class="btn btn-danger btn-icon-split" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
@endsection

@section('pagejs')

<!-- Page level plugins -->
<script src="{{ asset('sb-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('sb-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('sb-admin/js/demo/datatables-demo.js') }}"></script>

@endsection
