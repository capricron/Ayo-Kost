{{--
@if(auth()->user()->role == 'pemilik')
    @extends('layouts.sidebar-pemilik')
@elseif(auth()->user()->role == 'pemilik')
    @extends('layouts.sidebar-admin')
@endif

@section("content")

    <link rel="stylesheet" href="../css/kostku.css">
    <link rel="stylesheet" href="../css/mykost.css">

    <h1>Kost Milik mu</h1>

    <div class="kost-ku">
        <a href="/dashboard/kost-ku/tambah"><button type="button" class="btn btn-success">Tambah Kost</button></a>
    </div>
    <br>
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @foreach ($kost as $k)
    <div class="p-4 kost">
        <div class="row">
            <div class="col-2">
                <img src={{ $k->foto }} width="100%">
            </div>
            <div class="col-8 info-kost">
                <h2>{{ $k->nama }}</h2>
                <p><i class="fa-sharp fa-solid fa-location-dot"></i> {{ $k->alamat }}</p>
                @if($k->disetujui)
                <p class="text-success">Sudah Diverifikasi</p>
                @else
                <p class="text-danger">Belum Diverifikasi</p>
                @endif
                <a href="/dashboard/kost-ku/{{ $k->slug }}"><button type="button" class="btn btn-primary">Detail</button></a>
            </div>
        </div>
    </div>
    @endforeach

@endsection --}}
