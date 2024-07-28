@extends('layouts.admin.app')
@section('title', 'Manajemen Postingan')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-5">
                <div class="card-header">
                    <div class="card-title d-flex justify-content-between align-items-center">
                        <h5 class="text-nowrap mb-0">Manajemen Postingan</h5>
                        <a href="{{ route('admin.content.create') }}" class="btn btn-primary">Tambah Postingan</a>
                    </div>
                </div>                
                <div class="card-body min-full">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Thumbnail</th>
                                <th>Dilihat</th>
                                <th>Penulis</th>
                                <th>Status</th>
                                <th>Komentar</th>
                                <th>Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($contents->count() > 0)
                                @foreach($contents as $content)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $content->title }}</td>
                                        <td>
                                            <img src="{{ asset($content->image) }}" alt="{{ $content->title }}" class="img-fluid" style="max-width: 80px;">
                                        </td>
                                        <td>{{ $content->view_count }}</td>
                                        <td>{{ $content->author->name }}</td>
                                        <td>{{ $content->status }}</td>
                                        <td>{{ $content->comments->count() }}</td>
                                        <td>{{ $content->created_at->format('d F Y H:i') }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="{{ route('admin.content.edit', $content->id) }}" class="dropdown-item">
                                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                                    </a>
                                                    <form action="{{ route('admin.content.destroy', $content->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="dropdown-item delete-item"><i
                                                            class="bx bx-trash me-1"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="container-fluid">
                        <div class="row mt-4">
                            <div class="col-12 d-flex justify-content-end">
                                {{ $contents->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection