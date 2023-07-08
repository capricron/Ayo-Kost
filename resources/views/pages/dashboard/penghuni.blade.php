@extends('layouts.sidebar')

@section("content")

    <link rel="stylesheet" href="../css/kostku.css">
    <link rel="stylesheet" href="../css/mykost.css">

    <h1>Penghuni Kost</h1>

    @for($i = 1; $i <= 8; $i++)
        <div class="p-4 kost">
            <div class="row">
                <div class="col-1">
                    <img width="100" src="../images/penghuni/supri.jpg" width="100%">
                </div>
                <div class="col-10 info-kost">
                    <h2>Supriyadi</h2>
                    <p>Penghuni : Kost Pak Haji</p>
                    <p>Kamar : 9</p>
                    <p>Jatuh Tempo : 5 Desember 2023</p>
                </div>
            </div>
        </div>
    @endfor
@endsection


