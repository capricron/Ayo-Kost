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
                    <div class="align-items-center justify-content-between">
                        <h3 id="totalBiaya" class="mr-2">Rp {{ $kost->harga }} / bulan</h3>
                        <h5>Mau Berapa Bulan?</h5>
                        <div class="row">
                            <div class="d-flex">
                                <button id="minusBtn" class="btn btn-primary">-</button>
                                <input id="bulanInput" type="number" value="1" min="1">
                                <button id="plusBtn" class="btn btn-primary">+</button>
                            </div>
                        </div>
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
                <input id="lamasewa" type="hidden" name="lamasewa">
                <div class="form-group">
                    <input type="file" class="form-control-file" id="bukti" name="bukti">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>
</div>

<script>
    // Dapatkan elemen yang diperlukan
    var minusBtn = document.getElementById('minusBtn');
    var plusBtn = document.getElementById('plusBtn');
    var bulanInput = document.getElementById('bulanInput');
    var harga = {{ $kost->harga }};
    var totalBiaya = harga;

    // Tambahkan event listener untuk tombol minus
    minusBtn.addEventListener('click', function() {
        var currentValue = parseInt(bulanInput.value);
        if (currentValue > 1) {
            bulanInput.value = currentValue - 1;
        }
        hitungTotalBiaya()

    });

    // Tambahkan event listener untuk tombol plus
    plusBtn.addEventListener('click', function() {
        var currentValue = parseInt(bulanInput.value);
        bulanInput.value = currentValue + 1;
        hitungTotalBiaya()
    });

    // Update harga saat nilai bulanInput berubah
    bulanInput.addEventListener('change', function() {
        var currentValue = parseInt(bulanInput.value);
        if (currentValue < 1) {
            bulanInput.value = 1;
        }
        hitungTotalBiaya()
    });

    // Fungsi untuk menghitung total biaya
    function hitungTotalBiaya() {
        var jumlahBulan = parseInt(bulanInput.value);
        totalBiaya = jumlahBulan * harga;
        console.log('Total Biaya:', totalBiaya);
        // Lakukan logika lain yang diperlukan, seperti memperbarui tampilan atau variabel lainnya
        document.getElementById('totalBiaya').innerHTML = 'Rp ' + totalBiaya + ' / bulan';
        document.getElementById('lamasewa').value = bulanInput.value;
    }

    // Panggil fungsi hitungTotalBiaya saat halaman dimuat atau nilai bulanInput berubah
    document.addEventListener('DOMContentLoaded', hitungTotalBiaya);
    bulanInput.addEventListener('change', hitungTotalBiaya);
</script>
