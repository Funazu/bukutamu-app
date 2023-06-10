@extends('dashboard.template.main')
@section('content')
<div class="row">
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


    <div class="col-xl-4 col-md-6 mb-3">
        <div class="card shadow">
            <div class="card-body">
                <h4>Change Password</h4>
                <hr>
                <form action="{{ "/auth/account/changepassword/" . auth()->user()->id }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <strong>Masukan Password Baru</strong>
                        <input type="password" class="form-control" name="password" placeholder="Masukan Password">
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