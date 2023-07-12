@extends('layouts.sidebar')

@section("content")

    <link rel="stylesheet" href="../css/kostku.css">
    <link rel="stylesheet" href="../css/mykost.css">

    <h1>Penghuni Kost</h1>

    @foreach ($menghuni as $m)
        @foreach ($m->penghuni as $p )
            <div class="p-4 kost">
                <div class="row">
                    <div class="col-1">
                        <img width="100" src="{{ $p->user->profile }}" width="100%">
                    </div>
                    <div class="col-10 info-kost">
                        <h2>{{ $p->user->name }}</h2>
                        <p>{{ $m->nama }}</p>
                        <p>Kamar : {{ $p->kamar }}</p>
                        <p>Jatuh Tempo {{date('d-m-Y', strtotime('+1 month', strtotime($p->tanggal_masuk )))}} <span class="text-danger"></span></p>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
@endsection


