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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createTamuUndangan">
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
                                <th>Instansi</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $dt)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $dt->nama }}</td>
                                <td>{{ $dt->instansi }}</td>
                                <td>
                                    <?php 
                                        if($dt->hadir == 'true') {
                                            echo "Hadir";
                                        } else {
                                            echo "Tidak Hadir";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <form action="/dashboard/tamu-undangan/delete/{{ $dt->id }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger mb-1" onclick="return confirm('Are you sure you want to delete')"><i class="fas fa-trash"></i></button>
                                        <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#edit-{{ $dt->id }}">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                        <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#detail-{{ $dt->id }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-secondary mb-1" onclick="test('{{ env('APP_URL') }}/tamu-undangan/{{ $dt->uniqid }}')"><i class="fas fa-clipboard"></i></button>
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
                <h5 class="modal-title" id="edit-{{ $dt->id }}Label">Edit Tamu Undangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/dashboard/tamu-undangan/edit/{{ $dt->id }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <strong>Nama Tamu</strong>
                        <input type="text" name="nama" value="{{ $dt->nama }}" class="form-control" placeholder="Nama Tamu">
                    </div>
                    <div class="form-group">
                        <strong>Asal / Instansi</strong>
                        <input type="text" name="instansi" value="{{ $dt->instansi }}" class="form-control" placeholder="Asal / Instansi">
                    </div>
                    <div class="form-group">
                        <strong>Perihal</strong>
                        <textarea class="form-control" name="perihal"
                            placeholder="Perihal">{{ $dt->perihal }}</textarea>
                    </div>
                    <div class="form-group">
                        <strong>Waktu</strong>
                        <input type="date" name="waktu" value="{{ $dt->waktu }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <strong>Kontak (NO. HP)</strong>
                        <input type="number" name="nohp" value="{{ $dt->nohp }}" class="form-control" placeholder="Kontak (NO. HP)">
                    </div>
                    <div class="form-group">
                        <strong>Alamat</strong>
                        <input type="text" name="alamat" value="{{ $dt->alamat }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <strong>Hadir</strong>
                        <select class="custom-select" name="hadir">
                            <option value="false">Tidak Hadir</option>
                            <option value="true">Hadir</option>
                          </select>
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

{{-- Detail --}}
@foreach ($data as $dt)    
<div class="modal fade" id="detail-{{ $dt->id }}" tabindex="-1" aria-labelledby="detail-{{ $dt->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detail-{{ $dt->id }}Label">Detail Tamu Undangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <strong>Nama Tamu</strong>
                    <input type="text" name="nama" value="{{ $dt->nama }}" class="form-control" placeholder="Nama Tamu" disabled>
                </div>
                <div class="form-group">
                    <strong>Asal / Instansi</strong>
                    <input type="text" name="instansi" value="{{ $dt->instansi }}" class="form-control" placeholder="Asal / Instansi" disabled>
                </div>
                <div class="form-group">
                    <strong>Perihal</strong>
                    <textarea class="form-control" name="perihal"
                        placeholder="Perihal" disabled>{{ $dt->perihal }}</textarea>
                </div>
                <div class="form-group">
                    <strong>Waktu</strong>
                    <input type="date" name="waktu" value="{{ $dt->waktu }}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <strong>Kontak (NO. HP)</strong>
                    <input type="number" name="nohp" value="{{ $dt->nohp }}" class="form-control" placeholder="Kontak (NO. HP)" disabled>
                </div>
                <div class="form-group">
                    <strong>Alamat</strong>
                    <input type="text" name="alamat" value="{{ $dt->alamat }}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <strong>Hadir</strong>
                    <input type="text" value="
                    <?php
                    if($dt->hadir == 'true') {
                        echo "Hadir";
                    } else {
                        echo "Tidak Hadir";
                    }
                    ?>
                    " class="form-control" disabled>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

{{-- Buat Tamu --}}
<div class="modal fade" id="createTamuUndangan" tabindex="-1" aria-labelledby="createTamuUndanganLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTamuUndanganLabel">Buat Tamu Undangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/dashboard/tamu-undangan/create" method="POST">
                    @csrf
                    <div class="form-group">
                        <strong>Nama Tamu</strong>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Tamu">
                    </div>
                    <div class="form-group">
                        <strong>Asal / Instansi</strong>
                        <input type="text" name="instansi" class="form-control" placeholder="Asal / Instansi">
                    </div>
                    <div class="form-group">
                        <strong>Perihal</strong>
                        <textarea class="form-control" name="perihal"
                            placeholder="Perihal"></textarea>
                    </div>
                    <div class="form-group">
                        <strong>Waktu</strong>
                        <input type="date" name="waktu" class="form-control">
                    </div>
                    <div class="form-group">
                        <strong>Kontak (NO. HP)</strong>
                        <input type="number" name="nohp" class="form-control" placeholder="Kontak (NO. HP)">
                    </div>
                    <div class="form-group">
                        <strong>Alamat</strong>
                        <input type="text" name="alamat" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function test(data) {
    alert(data);
}

</script>

@endsection