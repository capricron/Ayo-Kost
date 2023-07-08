@extends('layouts.sidebar')

@section('content')

    <style>
        .detail-kost{
            height: auto;
            width: 80%;
            background-color: white;
        }
        input{
            margin-bottom: 20px
        }
        textarea{
            margin-bottom: 20px
        }
    </style>

    <div class="p-4 container detail-kost">
        <form action="/dashboard/kost-ku/edit/{{ $kost->slug }}" method="post" enctype="multipart/form-data">
            @csrf
            <h3>Nama Kost</h3>
            <input type="text" value="{{ $kost->nama }}" name="nama">
            <h3>Gambar</h3>
            <input type="file" class="form-control-file" id="bukti" name="foto">
            <h5>Alamat</h5>
            <input type="text" name="alamat" value="{{ $kost->alamat }}">
            <h5>Deskripsi</h5>
            <textarea style="width: 100%; height:70px" name="deskripsi" type="text">{{ $kost->deskripsi }}</textarea>
            <h5>Fasilitas</h5>
            <textarea id="fasilitas" name="fasilitas" placeholder="Fasilitas" style="width: 100%; height:200px">{{ $kost->fasilitas }}</textarea>
            <br>
            <h5>Jumlah Kamar</h5>
            <input type="number" name="jumlah_kamar" value="{{ $kost->jumlah_kamar }}">
            <h5>Harga</h5>
            <input type="number" name="harga" value="{{ $kost->harga }}">
            <h5>Bank</h5>
            <input type="text" name="bank" value="{{ $kost->bank }}">
            <h5>No Rekening</h5>
            <input type="number" name="no_rekening" value="{{ $kost->no_rekening }}">
            <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

@endsection
