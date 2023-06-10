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
            <div class="col-xl-6 col-10 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="text-center">SUKSESS</h4>
                        <hr>
                        <p class="text-center">Silahkan Simpan / Foto QRCode Bukti Pendaftaran</p>
                        <p class="text-center">
                            {{ $qrcode }}
                        </p>
                        <p class="text-center">Terimakasih Sudah Mengikuti Prosedur Kami</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>