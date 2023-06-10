@extends('dashboard.template.main')
@section('content')
<div class="row justify-content-start">
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="small-box bg-gradient-danger">
            <div class="inner">
                <h3>{{ $jumlah_tamu }}</h3>
                <p>Jumlah Tamu</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-plus"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="small-box bg-gradient-success">
            <div class="inner">
                <h3>{{ $jumlah_tamu_undangan }}</h3>
                <p>Jumlah Undangan</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-plus"></i>
            </div>
        </div>
    </div>

</div>
@endsection