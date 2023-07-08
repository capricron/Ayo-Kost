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
  <img src="../../../images/transfer/transfer.jpg" alt="" srcset="">
  <br/>
  <br>
  <h5>Jika bukti transfer ini palsu tekan tombol "Tolak"</h5>
  <button type="button" class="btn btn-success">Terima</button>
  <button type="button" class="btn btn-danger">Tolak</button>
</div>

</body>
</html>



@endsection


