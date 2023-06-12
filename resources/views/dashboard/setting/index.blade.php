@extends('dashboard.template.main')
@section('content')
<div class="row justify-content-start">

    <div class="col-xl-6 col-10 mb-3">
        @if(session()->has('successEdit'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('successEdit') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        
        <div class="card shadow">   
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Fitur</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($features as $feature)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $feature->nama_fitur }}</td>
                                    <td>{{ $feature->status }}</td>
                                    <td>
                                        <form action="{{ "/dashboard/setting/edit/" . $feature->id }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select class="custom-select" name="status" onchange="this.form.submit()">
                                                <option selected>Change Status</option>
                                                <option value="Enable">Enable</option>
                                                <option value="Disable">Disable</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Buat Fitur --}}
{{-- <div class="modal fade" id="createWebSetting" tabindex="-1" aria-labelledby="createWebSettingLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createWebSettingLabel">Buat Web Setting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/dashboard/tamu-undangan/create" method="POST">
                    @csrf
                    <div class="form-group">
                        <strong>Nama Fitur</strong>
                        <input type="text" name="nama_fitur" class="form-control" placeholder="Nama Fitur">
                    </div>
                    <div class="form-group">
                        <strong>Status</strong>
                        <select class="custom-select" name="status">
                            <option value="Enable">Enable</option>
                            <option value="Disable">Disable</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
@endsection