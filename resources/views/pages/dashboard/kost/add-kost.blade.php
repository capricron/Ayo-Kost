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
        <form action="/dashboard/kost-ku/tambah" method="post" enctype="multipart/form-data">
            @csrf
            <h3>Nama Kost</h3>
            <input type="text" name="nama">
            <h3>Gambar</h3>
            <input type="file" class="form-control-file" id="bukti" name="foto">
            <h5>Alamat</h5>
            <input type="text" name="alamat">
            <h5>Deskripsi</h5>
            <textarea style="width: 100%; height:70px" type="text" name="deskripsi"></textarea>
            <h5>Fasilitas</h5>
            <p>Gunakan spasi bukan koma</p>
            <textarea id="fasilitas" name="fasilitas" placeholder="Fasilitas" style="width: 100%; height:200px"></textarea>
            <br>
            <h5>Jumlah Kamar</h5>
            <input type="number" name="jumlah_kamar">
            <h5>Harga per bulan</h5>
            <input type="number" name="harga">
            <h5>Bank</h5>
            <input type="text" name="bank">
            <h5>No Rekening</h5>
            <input type="number" name="no_rekening">
             {{-- <h5>Bukti Pembayaran</h5>
            <p>Untuk menambahkan kost anda harus membayar ke BCA: 123456789</p>
            <input type="file" class="form-control-file" id="bukti" name="bukti" required> --}}
            <br>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>

@endsection
