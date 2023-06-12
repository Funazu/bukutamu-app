# bukutamu-app
## Manajement Pembukuan Tamu Dan Undangan

Aplikasi ini dibuat untuk memenuhi tugas akhir PKL di Telkom Kudus


## Fitur

- Reservasi Tamu
- QrCode Tamu
- Dashboard (ADMIN)
- Manajemen Tamu (ADMIN)
- Manajemen Undangan (ADMIN)
- Scan QR Tamu Undangan (ADMIN)
- LINK Undangan + QrCode
- Management User (SUPERADMIN)
- Web Setting (SUPERADMIN)


## Teknologi

Teknologi yang dipakai BukuTamu-APP:

- [Laravel](https://laravel.com/) - Framework PHP
- [Bootstrap](http://getbootstrap.com/) - Framework CSS
- [AdminLTE](https://adminlte.io/) - Dashboard
- [JQuery](https://jquery.com/) - JavaScript Library
- [DataTables](https://datatables.net/) - Plugin JQuery Table
- [FontAwesome](https://fontawesome.com/) - Icon
- [html5-qrcode](https://github.com/mebjas/html5-qrcode) - QrScanner
- [Simple-QrCode](https://github.com/SimpleSoftwareIO/simple-qrcode) - QrCode


## Instalasi

BukuTamu-APP Membutuhkan [PHP](https://www.php.net/) v8.0+

Install Package:

```sh
cd bukutamu-app
composer install
```

Database:
```sh
php artisan migrate
```

## Preview:

## TAMU
##### Tampilan Form Tamu (Reservasi Tamu)
![form-tamu](https://imgur.com/GAZtFBr.png)

#### Tampilan Berhasil Reservasi
- QrCode dapat di Scan guna melihat detail informasi tamu
![form-success](https://imgur.com/XdeJMA4.png)

#### Tampilan Detail Tamu
- Tampilan ketika QrCode di Scan

![qrcode-scan](https://imgur.com/0R3K4XV.png)

## ADMIN
#### Dashboard
![dashboard](https://imgur.com/nwNowAp.png)

#### Halaman Daftar Tamu
- Halaman ini admin bisa memanajemen tamu, seperti edit data, hapus data, dan lihat data
![daftartamu](https://imgur.com/brM2uyM.png)

#### Halaman Tamu Undangan
- Halaman ini admin bisa memanajemen tamu undangan, seperti membuat, edit, hapus, dan lihat data
![tamu-undangan](https://imgur.com/A4P44sb.png)

#### Scan Undangan
- Halaman ini admin bisa Scan QrCode Undangan untuk merubah data tamu apakah sudah hadir atau belum
![scan-qr](https://imgur.com/r6Q1tpd.png)

#### Halaman Undangan
- Halaman Undangan ini merupakan halaman yang diberikan oleh admin untuk Tamu Undangan, Halaman ini wajib di buka ketika Tamu Undangan menghadiri acara agar QrCode nya bisa di Scan untuk pendataan hadir atau tidak
![scan-qrcode](https://imgur.com/Rxb8AUp.png)


## License

MIT

**Fauzun Naja & Julia Wulandari**
