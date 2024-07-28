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
                    @php
                        $route = null;

                        if(isset($content)) {
                            $route = route('admin.content.update', $content->id);
                        } else {
                            $route = route('admin.content.store');
                        }
                    @endphp
                    <form action="{{ $route }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($content))
                            @method('PUT')
                        @endif

                        <div class="form-group mb-3">
                            <label for="title">
                                Judul <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" name="title" 
                                id="name" class="form-control"
                                required
                                value="{{ isset($content) ? $content->title : '' }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="image">
                                Thumbnail 
                                @if(!isset($content))
                                    <span class="text-danger">*</span>
                                @endif
                            </label>
                            <input 
                                type="file" name="image" 
                                id="image" class="form-control"
                                @if(!isset($content)) required @endif>
                        </div>

                        <div class="form-group mb-3">
                            <label for="content">
                                Isi Konten <span class="text-danger">*</span>
                            </label>
                            <textarea name="content" id="content" rows="10" class="form-control" required>{{ isset($content) ? $content->content : '' }}</textarea>
                        </div>

                        @if(isset($content))
                            @php
                                $listStatus = ['draft', 'published'];   
                            @endphp
                            <div class="form-group mb-3">
                                <label for="status">
                                    Status <span class="text-danger">*</span>
                                </label>
                                <select name="status" id="status" class="form-control">
                                    @foreach($listStatus as $status)
                                        <option value="{{ $status }}" {{ $content->status == $status ? 'selected' : '' }}>
                                            {{ ucfirst($status) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary w-100">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection