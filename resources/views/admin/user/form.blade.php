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
                    <form action="{{ route('admin.user.store') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">
                                Nama <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">
                                Email <span class="text-danger">*</span>
                            </label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">
                                Password <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="password" id="confirm_password" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">
                                Konfirmasi Password <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="confirm_password" id="confirm_password" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="role">
                                Role <span class="text-danger">*</span>
                            </label>
                            <select name="role" id="role" class="form-control" required>
                                <option selected disabled>Pilih Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
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