@include('layouts.navbar')

<link rel="stylesheet" href="../css/mykost.css">

<div class="container">
    <h1>Riwayat Kost Mu</h1>
    @for($i = 1; $i <= 8; $i++)
        <div class="p-4 kost">
            <div class="row">
                <div class="col-4">
                    <img src="../images/kost-pak-haji/1.jpg" width="100%">
                </div>
                <div class="col-8 info-kost">
                    <h2>Kost Pak Haji</h2>
                    <p><i class="fa-sharp fa-solid fa-location-dot"></i> Pedurungan, Semarang</p>
                    <p>Jatuh Tempo 21 Mei 2022 <span class="text-danger">Belum dibayar</span></p>
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="mr-2">Rp 500.000 / bulan</h3>
                        <a href="/pembayaran/1"><button type="button" class="btn btn-primary">Bayar Sekarang</button></a>
                    </div>
                </div>
            </div>
        </div>
    @endfor
</div>
