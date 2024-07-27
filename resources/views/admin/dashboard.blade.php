@extends('layouts.admin.app')
@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-md-4 mt-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h6 class="text-nowrap mb-1">Total Ungahan Postingan</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mt-sm-auto">
                        <h3 class="mb-0">138</h3>
                    </div>
                    <div class="text-muted mt-3">
                        Hari ini {{ date('d-m-Y') }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h6 class="text-nowrap mb-1">Total Pengunjung Harian</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mt-sm-auto">
                        <h3 class="mb-0">7,9K</h3>
                    </div>
                    <div class="text-muted mt-3">
                        Hari ini {{ date('d-m-Y') }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h6 class="text-nowrap mb-1">Total Aktivitas Komentar</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mt-sm-auto">
                        <h3 class="mb-0">1K</h3>
                    </div>
                    <div class="text-muted mt-3">
                        Hari ini {{ date('d-m-Y') }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header card-title">
                    <h6 class="text-nowrap mb-1">Trending Postingan</h6>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Dilihat</th>
                                <th>Komentar</th>
                                <th>Dibuat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Belajar Laravel</td>
                                <td>Admin</td>
                                <td>100</td>
                                <td>10</td>
                                <td>2021-10-10</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Belajar PHP</td>
                                <td>Admin</td>
                                <td>200</td>
                                <td>20</td>
                                <td>2021-10-10</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Belajar Vue Js</td>
                                <td>Admin</td>
                                <td>300</td>
                                <td>30</td>
                                <td>2021-10-10</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
