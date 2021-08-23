@extends('layouts.backend_layout')

@section('title')
Master Perusahaan
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Master Perusahaan</h1>
</div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Perusahaan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Perusahaan</th>
                                            <th>E-mail</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($perusahaan as $perusahaan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $perusahaan->user->name }}</td>
                                            <td>{{ $perusahaan->user->email }}</td>
                                            <td>@if($perusahaan->status_perusahaan == 1)
                                                Diterima
                                                @elseif ($perusahaan->status_perusahaan == 2)
                                                Ditolak
                                                @else
                                                Menunggu
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('prshn.delete',$perusahaan->id) }}" method="POST">
                                                <a href="{{ route('prshn.show',$perusahaan->id) }}" class="btn btn-info btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-eye"></i>
                                                    </span>
                                                </a>
                                                <a href="{{ route('prshn.edit',$perusahaan->id) }}" class="btn btn-secondary btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="far fa-edit"></i>
                                                    </span>
                                                </a>
                                                @if ($perusahaan->status_perusahaan == 0)
                                                <a href="{{ route('prshn.accepted',$perusahaan->id) }}" class="btn btn-success btn-icon-split" data-toggle="tooltip" title="Klik untuk menerima">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </a>
                                                <a href="{{ route('prshn.decline',$perusahaan->id) }}" class="btn btn-warning btn-icon-split" data-toggle="tooltip" title="Klik untuk menolak">
                                                    <span class="icon text-white-50">
                                                        <i class="fa fa-ban"></i>
                                                    </span>
                                                </a>
                                                @endif

                                                @csrf

                                                @method('DELETE')
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
