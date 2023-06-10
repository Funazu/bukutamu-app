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

    @if(session()->has('successPost'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('successPost') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(session()->has('successEdit'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('successEdit') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(session()->has('successDelete'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('successDelete') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif


    <div class="col-12">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createBukuTamu">
            Buat
        </button>
    </div>
    
    <div class="col-12 mt-2">
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Asal</th>
                                <th>Waktu</th>
                                <th>Keterangan</th>
                                <th>Kontak</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $dt)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $dt->nama }}</td>
                                <td>{{ $dt->asal }}</td>
                                <td>{{ $dt->waktu }}</td>
                                <td>{{ $dt->keterangan }}</td>
                                <td>{{ $dt->kontak }}</td>
                                <td>
                                    <form action="/dashboard/bukutamu/delete/{{ $dt->id }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger mb-1" onclick="return confirm('Are you sure you want to delete')"><i class="fas fa-trash"></i></button>
                                        <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#edit-{{ $dt->id }}">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                        <a href="{{ "/tamu/" . $dt->uniqid }}" class="btn btn-success mb-1"><i class="fas fa-eye"></i></a>
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


<!-- Modal Edit -->
@foreach ($data as $dt)    
<div class="modal fade" id="edit-{{ $dt->id }}" tabindex="-1" aria-labelledby="edit-{{ $dt->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-{{ $dt->id }}Label">Edit Buku Tamu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/dashboard/bukutamu/edit/{{ $dt->id }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <strong>Nama Tamu</strong>
                        <input type="text" name="nama" value="{{ $dt->nama }}" class="form-control" placeholder="Nama Tamu">
                    </div>
                    <div class="form-group">
                        <strong>Asal / Instansi</strong>
                        <input type="text" name="asal" value="{{ $dt->asal }}" class="form-control" placeholder="Asal / Instansi">
                    </div>
                    <div class="form-group">
                        <strong>Waktu</strong>
                        <input type="date" name="waktu" value="{{ $dt->waktu }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <strong>Keterangan / Keperluan</strong>
                        <textarea class="form-control" name="keterangan" name="keterangan"
                            placeholder="Keterangan / Keperluan">{{ $dt->keterangan }}</textarea>
                    </div>
                    <div class="form-group">
                        <strong>Kontak (NO. HP)</strong>
                        <input type="number" name="kontak" value="{{ $dt->kontak }}" class="form-control" placeholder="Kontak (NO. HP)">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<div class="modal fade" id="createBukuTamu" tabindex="-1" aria-labelledby="createBukuTamuLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createBukuTamuLabel">Buat Buku Tamu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/dashboard/bukutamu/create" method="POST">
                    @csrf
                    <div class="form-group">
                        <strong>Nama Tamu</strong>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Tamu">
                    </div>
                    <div class="form-group">
                        <strong>Asal / Instansi</strong>
                        <input type="text" name="asal" class="form-control" placeholder="Asal / Instansi">
                    </div>
                    <div class="form-group">
                        <strong>Waktu</strong>
                        <input type="date" name="waktu" class="form-control">
                    </div>
                    <div class="form-group">
                        <strong>Keterangan / Keperluan</strong>
                        <textarea class="form-control" name="keterangan" name="keterangan"
                            placeholder="Keterangan / Keperluan"></textarea>
                    </div>
                    <div class="form-group">
                        <strong>Kontak (NO. HP)</strong>
                        <input type="number" name="kontak" class="form-control" placeholder="Kontak (NO. HP)">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




@endsection