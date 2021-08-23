@extends('layouts.perusahaan_layout')

@section('title')
Perusahaan - Tes Kepribadian
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tes Kepribadian</h1>
    <a href="{{ route('perusahaan.tes.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus-square fa-sm text-white-50"></i> Tambah</a>
</div>

<!-- DataTales Example -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Tes</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%">
                <thead aria-rowspan="2">
                    <tr>
                        <th>No</th>
                        <th>Token</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tesMBTI as $tes)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tes->token }}</td>
                        <td>{{ $tes->keterangan }}</td>
                        <td>
                            <form action="{{ route('perusahaan.tes.delete', $tes->id) }}" method="POST">
                                <a href="{{ route('perusahaan.tes.show', $tes->id) }}" class="btn btn-info btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </a>
                                <a href="{{ route('perusahaan.tes.edit', $tes->id) }}"
                                    class="btn btn-secondary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="far fa-edit"></i>
                                    </span>
                                </a>

                                @csrf
                                @method('DELETE')

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
@endsection

@section('pagejs')

<!-- Page level plugins -->
<script src="{{ asset('sb-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('sb-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('sb-admin/js/demo/datatables-demo.js') }}"></script>

@endsection
