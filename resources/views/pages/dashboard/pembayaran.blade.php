@extends('layouts.sidebar')

@section("content")

    <link rel="stylesheet" href="../css/kostku.css">
    <link rel="stylesheet" href="../css/mykost.css">

    <h1>Pembayaran</h1>

    @for($i = 1; $i <= 8; $i++)
        <div class="p-4 kost">
            <div class="row">
                <h2>Supriyadi</h2>
                <p>Penghuni : Kost Pak Haji</p>
                <p>Kamar : 9</p>
                <div class="col-12">
                    <a href="/dashboard/pembayaran/1" class="btn btn-primary">Cek Bukti Pembayaran</a>
                </div>
            </div>
        </div>
    @endfor

@endsection
