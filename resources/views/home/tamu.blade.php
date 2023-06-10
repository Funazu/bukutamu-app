<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Buku Tamu | {{ $title }}</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-xl-6 col-10 mb-2">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="text-center">Detail Tamu</h4>
                        <hr>
                        <div class="form-group">
                            <strong>Nama Tamu</strong>
                            <input type="text" name="nama" value="{{ $data->nama }}" class="form-control" placeholder="Nama Tamu" disabled>
                        </div>
                        <div class="form-group">
                            <strong>Asal / Instansi</strong>
                            <input type="text" name="asal" class="form-control" value="{{ $data->asal }}" placeholder="Asal / Instansi" disabled>
                        </div>
                        <div class="form-group">
                            <strong>Waktu</strong>
                            <input type="date" name="waktu" value="{{ $data->waktu }}" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <strong>Keterangan / Keperluan</strong>
                            <textarea class="form-control" name="keterangan" name="keterangan"
                                placeholder="Keterangan / Keperluan" disabled>{{ $data->keterangan }}</textarea>
                        </div>
                        <div class="form-group">
                            <strong>Kontak (NO. HP)</strong>
                            <input type="number" name="kontak" value="{{ $data->kontak }}" class="form-control" placeholder="Kontak (NO. HP)" disabled>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>