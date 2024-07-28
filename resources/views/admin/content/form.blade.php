@extends('layouts.admin.app')
@section('title', 'Tambah Postingan')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Postingan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.content.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="title">
                                Judul <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="title" id="name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="image">
                                Thumbnail <span class="text-danger">*</span>
                            </label>
                            <input type="file" name="image" id="image" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="content">
                                Isi Konten <span class="text-danger">*</span>
                            </label>
                            <textarea name="content" id="content" rows="10" class="form-control" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary w-100">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection