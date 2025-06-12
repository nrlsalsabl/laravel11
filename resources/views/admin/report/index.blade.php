@extends('layouts.main')
@section('title', 'Data Kategori Laporan')

@section('content')
    @php
        $success = session('success');
    @endphp

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <h3>Daftar Data Laporan</h3>

                        @if ($success)
                            <div class="alert alert-success">{{ $success }}</div>
                        @endif

                        <a href="{{ route('admin.report.create') }}" class="btn btn-md btn-success mb-3 mt-3">TAMBAH
                            Laporan</a>

                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode Laporan</th>
                                        <th scope="col">Nama Pelapor</th>
                                        <th scope="col">Kategori Laporan</th>
                                        <th scope="col">Judul Laporan</th>
                                        <th scope="col">Bukti Laporan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reports as $report)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $report->code }}</td>
                                            <td>{{ $report->resident->user->name }}</td>
                                            <td>{{ $report->reportCategory->name }}</td>
                                            <td>{{ $report->title }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $report->image) }}" alt="image"
                                                    width="100">
                                            </td>
                                            <td>
                                                {{-- Aksi bisa ditambahkan di sini --}}
                                                <a href="{{ route('admin.report.show', $report->id) }}"
                                                    class="btn btn-sm btn-info">Show</a>
                                                <a href="{{ route('admin.report.edit', $report->id) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                <form action="{{ route('admin.report.destroy', $report->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Pagination --}}
                        <div class="d-flex justify-content-end mt-2">
                            {{ $reports->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- CDN dan Script DataTables --}}
@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endpush
