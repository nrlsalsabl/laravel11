@extends('layouts.main')
@section('title', 'Edit Data Laporan')

@section('content')
    @php
        $success = session('success');
    @endphp
    @push('css')
        <style>
            .dataTables_info {
                display: none;
            }

            #simpan {
                text-decoration: none;
            }

            #simpan:hover {
                opacity: 70%;
                text-decoration: none;
            }

            .select2-container {
                width: 100% !important;
                padding: 0;
            }

            .select2-selection {

                padding: 5px !important;
                height: 40px !important;
            }

            label {
                font-size: 13px;
            }

            input {
                padding: 5px !important;
            }
        </style>
    @endpush
    <div class="container">
        <div class="row">
            @component('components.backButtonReport')
            @endcomponent

            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('admin.report.update', $report->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="fw-bold text-dark mb-2" for="code">Kode</label>
                                <input id="code" type="text" name="code" value="{{ $report->code }}" disabled
                                    class="form-control @error('code') is-invalid @enderror">

                                @error('code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="fw-bold text-dark mb-2" for="resident">Pelapor / Masyarakat</label>

                                <select name="resident_id" class="form-control @error('resident_id') is-invalid @enderror">
                                    @foreach ($residents as $resident)
                                        <option value="{{ $resident->id }}"
                                            @if (old('resident_id', $report->resident_id) == $resident->id) selected @endif>
                                            {{ $resident->user->email }} - {{ $resident->user->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('resident')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="fw-bold text-dark mb-2" for="category">Kategori</label>

                                <select name="report_category_id"
                                    class="form-control @error('report_category_id') is-invalid @enderror">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if (old('report_category_id', $report->report_category_id) == $category->id) selected @endif>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('report_category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="fw-bold text-dark mb-2" for="title">Judul Laporan</label>
                                <input id="title" type="text" name="title"
                                    value="{{ old('title', $report->title) }}"
                                    class="form-control @error('title') is-invalid @enderror">

                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="fw-bold text-dark mb-2" for="description">Deskripsi Laporan</label>
                                <textarea id="description" type="text" name="description" value="{{ old('description', $report->description) }}"
                                    class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description', $report->description) }}</textarea>

                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="fw-bold text-dark mb-2" for="image">Bukti Laporan</label>

                                <br>

                                <img src="{{ asset('storage/' . $report->image) }}" alt="image" width="100">

                                <input id="image" type="file" name="image" value="{{ old('image') }}"
                                    class="form-control @error('image') is-invalid @enderror">

                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="fw-bold text-dark mb-2" for="latitude">Latitude</label>
                                <input id="latitude" type="text" name="latitude" value="{{ old('latitude', $report->latitude) }}"
                                    class="form-control @error('latitude') is-invalid @enderror">

                                @error('latitude')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="fw-bold text-dark mb-2" for="longitude">Longitude</label>
                                <input id="longitude" type="text" name="longitude"
                                    value="{{ old('longitude', $report->longitude) }}"
                                    class="form-control @error('longitude') is-invalid @enderror">

                                @error('longitude')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="fw-bold text-dark mb-2" for="address">Alamat Laporan</label>
                                <textarea id="address" type="text" name="address" value="{{ old('address', $report->address) }}"
                                    class="form-control @error('address') is-invalid @enderror" rows="5">{{ old('address', $report->address) }}</textarea>

                                @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('.tombolHapus').click(function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            deletekategori(id, nama);
        })

        function deletekategori(id, nama) {
            Swal.fire({
                title: "Yakin Ingin Menghapus",
                text: "Data " + nama,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Batal",
                confirmButtonText: "Ya, Hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $(`#delete${id}`).submit();
                }
            });
        }
        $(function() {
            $(".flatpickr_datetime").flatpickr({
                enableTime: false

            })

        })

        $('#biaya').on('keyup', function() {
            const biaya = $(this).val().replace(/\D/g, ''); // Menghapus semua karakter non-angka
            const formatted = formatRupiah(biaya)
            console.log(formatted);
            const hasil = $(this).val(formatted);

        });

        function formatRupiah(angka) {
            var formatted = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(angka);

            return formatted.replace('Rp', 'Rp. '); // Menambahkan Rp dengan titik
        }
    </script>
@endpush
