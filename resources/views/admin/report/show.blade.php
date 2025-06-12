@extends('layouts.main')
@section('title', 'Detail Laporan')

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
                        <table id="w0" class="table table-striped table-bordered detail-view">
                            <tbody>
                                <tr>
                                    <th>Detail Data Report</th>
                                </tr>

                                <tr>
                                    <td>Kode Laporan</td>
                                    <td>{{ $report->code }}</td>
                                </tr>
                                <tr>
                                    <td>Pelapor</td>
                                    <td>{{ $report->resident->user->email }} - {{ $report->resident->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Kategori Laporan</td>
                                    <td>{{ $report->reportCategory->name }}</td>
                                </tr>
                                 <tr>
                                    <td>Judul Laporan</td>
                                    <td>{{ $report->title }}</td>
                                </tr>
                                 <tr>
                                    <td>Deskripsi Laporan</td>
                                    <td>{{ $report->description }}</td>
                                </tr>
                                 <tr>
                                    <td>Bukti Laporan</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $report->image) }}" alt="image" width="200">
                                    </td>
                                </tr>
                                 <tr>
                                    <td>Latitude</td>
                                    <td>{{ $report->latitude }}</td>
                                </tr>
                                 <tr>
                                    <td>Longitude</td>
                                    <td>{{ $report->longitude }}</td>
                                </tr>
                                <tr>
                                    <td>Map view</td>
                                    <td>
                                        <div id="map" style="height: 300px"></div>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>Alamat Laporan</td>
                                    <td>{{ $report->address }}</td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    var mymap = L.map('map').setView([{{ $report->latitude }}, {{ $report->longitude }}], 13);

    var marker = L.marker([{{ $report->latitude }}, {{ $report->longitude }}]).addTo(mymap);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
        maxZoom: 18
    }).addTo(mymap);

    marker.bindPopup("<b>Lokasi Laporan</b><br />berada di {{ $report->address }}").openPopup();
</script>
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
    </script>
@endpush
