@extends('layouts.sidebar')

<link rel="stylesheet" href="../css/kostku.css">
<link rel="stylesheet" href="../css/mykost.css">

@section("content")
    <h1>Riwayat Kost Mu</h1>
    @if($menghuni->isEmpty())
        <p>Anda belum memesan.</p>
    @else
    <div class="p-4 kost">
        @foreach ($menghuni as $k)
        <div class="p-4 kost">
            <div class="row">
                <div class="col-2">
                    <img src={{ $k->foto }} width="100%">
                </div>
                <div class="col-8 info-kost">
                    <h2>{{ $k->nama }}</h2>
                    <p><i class="fa-sharp fa-solid fa-location-dot"></i> {{ $k->alamat }}</p>
                    <p>Kamar : {{ $k->kamar }}</p>
                    @if($k->acc == 'diterima')
                        <p>Jatuh Tempo {{date('d-m-Y', strtotime("+$k->lama_sewa month", strtotime($k->tanggal_masuk )))}} <span class="text-danger"></span></p>
                        <p class="text-success font-weight-bold">Sudah Diverifikasi</p>
                    @elseif($k->acc == 'ditolak')
                        <p class="text-danger font-weight-bold">Sudah Diverifikasi</p>
                    @else
                        <p class="text-warning font-weight-bold">Belum Diverifikasi</p>
                    @endif

                    @if(date('d-m-Y', strtotime("+$k->lama_sewa month", strtotime($k->tanggal_masuk ))) > time() + (7 * 24 * 60 * 60))
                        <a id="link" href="/pembayaran/{{ $k->slug }}/{{ $k->kamar }}"><button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Perpanjang Sekarang</button></a>
                    @endif
                </div>

            </div>
        </div>
        @endforeach
    @endif

@endsection
