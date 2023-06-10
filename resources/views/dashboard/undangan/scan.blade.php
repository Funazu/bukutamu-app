@extends('dashboard.template.main')
@section('content')
<style>
    .result {
        background-color: green;
        color: #fff;
        padding: 20px;
    }
</style>

<div class="row justify-content-center">
    <div class="col-xl-6 col-12 mb-3">
        <div class="card shadow mb-2">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div style="width:400px;" id="reader"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <form action="/dashboard/tamu-undangan/scan" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <strong>Uniqid</strong>
                        <input type="text" id="uniqid" name="uniqid" class="form-control" placeholder="UniqID">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- <script src="https://reeteshghimire.com.np/wp-content/uploads/2021/05/html5-qrcode.min_.js"></script> --}}
<script src="/AdminLTE/plugins/qrscanner/qrscanner.js"></script>
<script type="text/javascript">
    function onScanSuccess(qrCodeMessage) {
        $('#uniqid').val(qrCodeMessage);
        // document.getElementById('result').innerHTML = '<span class="result">' + qrCodeMessage + '</span>';
    }

    function onScanError(errorMessage) {
        //handle scan error
    }
    var html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 60,
            qrbox: 250,
            showTorchButtonIfSupported: true
        });
    html5QrcodeScanner.render(onScanSuccess, onScanError);
</script>
@endsection