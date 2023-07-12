@extends('layouts.sidebar')

<link rel="stylesheet" href="../../css/mykost.css">

@section("content")
    <h1>Riwayat Kost Mu</h1>
    @if($menghuni->isEmpty())
        <p>Anda belum memesan.</p>
    @else
    <div class="p-4 kost">
        @foreach ($menghuni as $m )
            <div class="row">
                <div class="col-4">
                    <img src="{{ $m->foto }}" width="100%">
                </div>
                <div class="col-8 info-kost">
                    <h2>{{ $m->nama }}</h2>
                    <p><i class="fa-sharp fa-solid fa-location-dot"></i> {{ $m->alamat }}</p>
                    <div class="align-items-center justify-content-between">
                        <h3 class="mr-2">Rp {{ $m->harga }} / bulan</h3>
                        @if($m->disetujui == "diterima")
                            <p>Jatuh Tempo {{date('d-m-Y', strtotime("+$m->lama_sewa month", strtotime($m->tanggal_masuk )))}} <span class="text-danger"></span></p>
                        @elseif($m->disetujui == "tolak")
                            <button href="/pembayaran/{{ $m->slug }}/{{ $m->kamar }}" class="btn btn-danger">Pembayaran Ditolak</button>
                        @else
                            <button  href="/pembayaran/{{ $m->slug }}/{{ $m->kamar }}" type="button" class="btn btn-primary">Tunggu Verifikasi</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif
@endsection
