@extends('layouts.admin.app')
@section('title', 'Manajemen Pengguna')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Pengguna</h5>
                </div>
                <div class="card-body">
                    @php
                        $route = route('admin.user.index');

                        if(isset($user)) {
                            $route = route('admin.user.update', $user->id);
                        }
                    @endphp
                    <form action="{{ $route }}" method="post">
                        @csrf
                        @isset($user)
                            @method('put')
                        @endisset

                        <div class="form-group mb-3">
                            <label for="name">
                                Nama <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" name="name" 
                                id="name" class="form-control" 
                                value="{{ $user->name ?? old('name') }}"
                                required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">
                                Email <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="email" name="email" 
                                id="email" class="form-control" 
                                value="{{ $user->email ?? old('email') }}"
                                required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">
                                Password <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" name="password" 
                                id="password" class="form-control" 
                                value="{{ old('password') ?? '' }}"
                                @if(!isset($user)) required @endif>
                        </div>
                        <div class="form-group mb-3">
                            <label for="confirm_password">
                                Konfirmasi Password <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" name="confirm_password" 
                                id="confirm_password" class="form-control" 
                                value="{{ old('confirm_password') ?? '' }}"
                                @if(!isset($user)) required @endif>
                        </div>
                        <div class="form-group mb-3">
                            @php
                              $role = ['admin', 'user'];
                            @endphp
                            <label for="role">
                                Role <span class="text-danger">*</span>
                            </label>
                            <select name="role" id="role" class="form-control" required>
                                <option selected disabled>Pilih Role</option>
                                @foreach ($role as $item)
                                    <option value="{{ $item }}" @isset($user) @if($user->role == $item) selected @endif @endisset>{{ $item }}</option>
                                @endforeach
                            </select>
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