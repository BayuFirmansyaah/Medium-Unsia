@extends('layouts.admin.app')
@section('title', 'Manajemen Pengguna')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-5">
                <div class="card-header">
                    <div class="card-title d-flex justify-content-between align-items-center">
                        <h5 class="text-nowrap mb-0">Manajemen User</h5>
                        <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Tambah User</a>
                    </div>
                </div>                
                <div class="card-body min-full">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Admin</td>
                                <td>admin@example.com</td>
                                <td>Admin</td>
                                <td>
                                    <a href="{{ route('admin.user.edit', 1) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ route('admin.user.destroy', 1) }}" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection