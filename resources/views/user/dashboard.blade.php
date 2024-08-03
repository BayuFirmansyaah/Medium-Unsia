@extends('layouts.user.app')
@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-md-6 mt-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h6 class="text-nowrap mb-1">Total Ungahan Postingan</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mt-sm-auto">
                        <h3 class="mb-0">{{ $countContent }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h6 class="text-nowrap mb-1">Total Pengunjung</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mt-sm-auto">
                        <h3 class="mb-0">{{ $sumViewCount }}</h3>
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
                                <th>Dilihat</th>
                                <th>Komentar</th>
                                <th>Dibuat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contents as $key => $content)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $content->title }}</td>
                                    <td>{{ $content->view_count }}</td>
                                    <td>{{ $content->comments->count() }}</td>
                                    <td>{{ $content->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
