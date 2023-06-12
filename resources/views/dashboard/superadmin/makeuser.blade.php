@extends('dashboard.template.main')
@section('content')
<div class="row">
    <div class="col-xl-4 col-10 mb-2">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Error Message:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session()->has('successPost'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('successPost') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <form action="/dashboard/makeuser/post" method="POST">
                    @csrf
                    <h4 class="text-center">Form Registrasi User Baru</h4>
                    <hr>
                    <div class="form-group">
                        <strong>Nama</strong>
                        <input type="text" name="name" class="form-control" placeholder="Masukan Nama">
                    </div>
                    <div class="form-group">
                        <strong>Username</strong>
                        <input type="text" name="username" class="form-control" placeholder="Masukan Username">
                    </div>
                    <div class="form-group">
                        <strong>Password</strong>
                        <input type="password" name="password" class="form-control" placeholder="Masukan Password">
                    </div>
                    <div class="form-group">
                        <strong>Role</strong>
                        <select class="custom-select" name="role">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                            <option value="superadmin">Superadmin</option>
                          </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection