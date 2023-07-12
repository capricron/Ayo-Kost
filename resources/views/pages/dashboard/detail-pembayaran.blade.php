@extends('layouts.sidebar')

@section("content")
<!DOCTYPE html>
<html>
<head>
<style>
.center {
    background-color: white;
    padding: 70px 0;
    text-align: center;
    height: 100%;
}
</style>
</head>
<body>
<div class="center">
    <img src="{{ $bukti->bukti }}" alt="" srcset="">
    <br/>
    <br>
    <h5>Jika bukti transfer ini palsu tekan tombol "Tolak"</h5>
    <a href="/dashboard/pembayaran/{{ $bukti->id }}/terima"><button type="button" class="btn btn-success">Terima</button></a>
    <a href="/dashboard/pembayaran/{{ $bukti->id }}/tolak"><button type="button" class="btn btn-danger">Tolak</button></a>

</div>

</body>
</html>



@endsection


