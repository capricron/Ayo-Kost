@extends('layouts.sidebar')

@section("content")

    <link rel="stylesheet" href="../css/kostku.css">
    <link rel="stylesheet" href="../css/mykost.css">

    <h1>Pembayaran</h1>

    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @foreach ($menghuni as $m)
    @foreach ($m->penghuni as $p )
        <div class="p-4 kost">
            <div class="row">
                <div class="col-10 info-kost">
                    <h2>{{ $p->user->name }}</h2>
                    <p>Penghuni : {{ $m->nama }}</p>
                    <p>Kamar : {{ $p->kamar }}</p>
                    @if($p->disetujui == "diterima")
                        <p>Jatuh Tempo {{date('d-m-Y', strtotime('+1 month', strtotime($p->tanggal_masuk )))}} <span class="text-danger"></span></p>
                        <a href="/dashboard/pembayaran/{{ $p->id }}" class="btn btn-success">Cek Bukti Pembayaran</a>
                    @elseif($p->disetujui == "ditolak")
                        <a href="/dashboard/pembayaran/{{ $p->id }}" class="btn btn-danger">Cek Bukti Pembayaran</a>
                    @else
                        <a href="/dashboard/pembayaran/{{ $p->id }}" class="btn btn-primary">Cek Bukti Pembayaran</a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
@endforeach

@endsection

