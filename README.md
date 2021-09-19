<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<h1 align="center">SISTEM ORDER MENU</h1>

## Apa Itu Sistem Order Menu?

Sistem Order ini dibuat oleh <a href="https://github.com/daman415"> Fathur Rahman </a>. **Sistem Order Menu adalah sebuah sistem yang digunakan untuk melakukan pemesanan makanan atau minuman pada cafee maupun pada tempat makan lainnya.**

## Fitur Sistem Order Menu

- Membutuhkan Autentikasi Login
- Menentukan Hak Akses User
- CRUD Pada Data User
- CRUD Pada Menu Makanan
- CRUD Pada Pesanan
- Terdapat Log Activity (Trigger Mysql)
- dan lain-lain

## Role dan Hak Akses

- Role [manager](#) dapat mengelola data [menu](#) dan melihat [rekapitulasi](#) data pesanan.
- Role [pelayan](#) dapat membuat [orderan](#) baru, [pelayan](#) dapat melihat dan mencetak aktifitas pesanan miliknya saja.
- Role [kasir](#) dapat memproses pesanan yang sudah dibuat.
- Role [pelayan](#) maupun [kasir](#) dapat melihat dan mengubah pesanan yang masih aktif.

## Default Account for testing

**Manager Role Manager**

---

- email: manager@mail.com
- Password: manager123

---

**Pelayan Role Pelayan**

---

- email: pelayan@mail.com
- Password: pelayan123

---

- email: pelayan2@mail.com
- Password: pelayan123

---

**Kasir Role Kasir**

---

- email: kasir@mail.com
- Password: kasir123

---


## Install

1. **Clone Repository**

```bash
$ git clone https://github.com/daman415/order-menu.git
$ cd order-menu
$ composer install
$ cp .env.example .env
```

2. **Buka `.env` lalu isikan `DB_DATABASE` dengan nama `order`, sesuaikan `DB_USERNAME` dan `DB_PASSWORD` dengan pengaturan database masing-masing**

```bash
DB_PORT=3306
DB_DATABASE=order
DB_USERNAME=root
DB_PASSWORD=
```

3. **Membuat Database baru dengan nama `order`**

4. **Jalankan perintah `migrate` untuk membuat tabel pada Database, jangan lupa ditambah `--seed` agar data Default diimputkan kedalam Database**

```bash
$ php artisan migrate --seed `atau`
$ php artisan migrate:fresh --seed
```

5. **Jalankan `php artisan serve` untuk menjalankan sistem**

```bash
$ php artisan serve
```

## License

- Copyright © 2021 Fathur Rahman.
