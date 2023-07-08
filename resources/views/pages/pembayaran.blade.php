@include('layouts.navbar')

<link rel="stylesheet" href="../../css/pembayaran.css">

<div class="background">
    <div class="container p-4">
        <div class="profile">
            <div class="row d-flex align-items-center">
                <div class="col-2">
                    <div class="ratio ratio-1x1">
                        <img src="{{ $user->profile }}" alt="Gambar Profil" class="img-fluid rounded-circle">
                    </div>
                </div>
                <div class="col-6">
                    <h3>{{ $user->name }}</h3>
                </div>
            </div>
        </div>
        <br>
        <div class="kost">
            <div class="row">
                <div class="col-4">
                    <img src="{{ $kost->foto }}" width="100%">
                </div>
                <div class="col-8 info-kost">
                    <h2>{{ $kost->nama }}</h2>
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="mr-2">Rp {{ $kost->harga }} / bulan</h3>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="transfer">
            <h3>Transfer ke Rekening</h3>
            <div class="row">
                <div class="col-2">
                    <img width="100px" height="100px" src="../../images/bank.png" alt="BCA" class="img-fluid">
                </div>
                <div class="col-10">
                    <h4>{{ $kost->bank }}</h4>
                    <p id="rekening"><i class="fas fa-clipboard" id="copyButton"></i> {{ $kost->no_rekening }}</p>
                </div>
            </div>
        </div>

        <script>
            const rekeningElement = document.getElementById('rekening');
            rekeningElement.addEventListener('click', () => {
                navigator.clipboard.writeText(rekeningElement.textContent)
                    .then(() => {
                        alert('Nomor rekening telah disalin ke clipboard');
                    })
                    .catch((error) => {
                        console.error('Gagal menyalin nomor rekening:', error);
                    });
            });
        </script>
        <br>
        <h3>Upload Bukti Pembayaran</h3>
        <div class="upload-bukti">
            <form action="/pembayaran/{{ $slug }}/{{ $id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" class="form-control-file" id="bukti" name="bukti">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>
</div>
