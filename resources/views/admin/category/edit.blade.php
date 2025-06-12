@extends('layouts.main')
@section('title', 'Edit Data Kategori')

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
            @component('components.backButtonCategory')
            @endcomponent

            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('admin.report-category.update', $category->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="fw-bold text-dark mb-2" for="name">Nama</label>
                                <input id="name" type="text" name="name"
                                    value="{{ old('name', $category->name) }}"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama">

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <p>Gambar / Ikon Lama</p>
                                <img src="{{ asset('storage' . $category->image) }}" alt="image" width="200">
                                <br>
                                <label class="fw-bold text-dark mb-2" for="image">Gambar / Ikon</label>
                                <input id="image" type="file" name="image"
                                    class="form-control @error('image') is-invalid @enderror">

                                @error('image')
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
