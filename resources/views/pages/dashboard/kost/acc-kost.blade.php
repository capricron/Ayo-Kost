@extends('layouts.sidebar')

@section('content')

    <style>
        .detail-kost{
            height: auto;
            width: 80%;
            background-color: white;
        }
    </style>

    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="p-4 container detail-kost">
        <h3>Nama Kost</h3>
        <h5>{{ $kost->nama }}</h5>
        <img src="{{ $kost->foto }}" width="100%" alt="" srcset="">
        <br>
        <br>
        <h5>Deskripsi</h5>
        <p>{{ $kost->deskripsi }}</p>
        <h5>Jumlah Kamar</h5>
        <p>{{ $kost->jumlah_kamar }}</p>
        <h5>Fasilitas</h5>
        <div class="row">
            @foreach ($fasilitas as $item)
                <div class="col-6">
                    <li>{{ $item }}</li>
                </div>
            @endforeach
        </div>
        <br>
        <h5>Harga</h5>
        <p>Rp. {{ $kost->harga }} / Bulan</p>
        <h5>Bank</h5>
        <p>{{ $kost->bank }}</p>
        <h5>No Rekening</h5>
        <p>{{ $kost->no_rekening }}</p>
        <h5>Bukti Pembayaran</h5>
        <img src="{{ $kost->bukti }}" width="100%" alt="" srcset="">
        <br>
        <br>
        <a href="/dashboard/pembayaran/{{ $kost->id }}/terima"><button type="button" class="btn btn-success">Terima</button></a>
        <a href="/dashboard/pembayaran/{{ $kost->id }}/tolak"><button type="button" class="btn btn-danger">Tolak</button></a>
    </div>

@endsection
