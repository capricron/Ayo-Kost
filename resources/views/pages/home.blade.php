@include('layouts.navbar')

<link rel="stylesheet" href="../../css/home.css">

<div class="home">
    {{-- banner kost --}}
    <div class="banner">
        <div class="pt-5 container banner-text">
            <h1 class="text-center">Kamu Sedang Mencari Kost?</h1>
            <p class="text-center">Kami bisa membantu mencarikan mu segera sesuai apa yang kamu butuhkan</p>
        </div>
    </div>
    {{-- end banner kost --}}

    <div class="container kosts">
        <p class="yuk">Siapa Tau Kamu Suka</p>
        <div class="kumpulan-kost">
            <div class="row">
                @foreach ($kost as $k )
                <div class="col-3 mt-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $k->foto }}" width="250px" height="150px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $k->nama }}</h5>
                            <p><i class="fa-sharp fa-solid fa-location-dot"></i> {{ $k->alamat }}</p>
                            <a href="/kost/{{ $k->slug }}" class="btn btn-primary"><span class="d-inline-block"> Rp {{ $k->harga }} </span> / bulan</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
