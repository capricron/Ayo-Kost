@include('layouts.navbar')

<link rel="stylesheet" href="../css/kost.css">

<div class="container">
    <div class="row mt-5">
        <div class="p-5 col-8" style="background-color: white">
            <div class="image-gallery">
                <img id="mainImage" src="{{ $kost->foto }}" alt="Image 1" data-index="1">
                </div>
        </div>
        <div class="col-4 infone">
            <div class=" info-harga">
                <p>Harga Mulai</p>
                <h3>Rp {{ $kost->harga }} / bulan</h3>
            </div>
            <div class="pilih-kamar">
                <h3>Pilih Kamar</h3>
                @for ($i = 1; $i <= $kost->jumlah_kamar; $i++)
                    @if (in_array($i, $kamar))
                        <div class="kotak tidak-tersedia" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">{{ $i }}</div>
                    @else
                        <div class="kotak tersedia" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">{{ $i }}</div>
                    @endif
                @endfor
            </div>
        </div>
    </div>
    <div class="mt-5 informasi">
            <div class="info-kost">
                <h1>{{ $kost->nama }}</h1>
                <p><i class="fa-sharp fa-solid fa-location-dot"></i> {{ $kost->alamat }}</p>

                <div class="row align-items-center">
                    <div class="col-md-2">
                    <div class="profile-image">
                        <div class="ratio ratio-1x1">
                        <img src="{{ $user->profile }}" alt="Gambar Profil" class="img-fluid rounded-circle">
                        </div>
                    </div>
                    </div>
                    <div class="col-md-9">
                        <h4 class="profile-username">{{ $user->name }}</h4>
                    </div>
                </div>

                <div class="mt-5 mb-5 fasilitas">
                    <h5>{{ $kost->deskripsi }}</h5>
                    <h4>Fasilitas Yang Tersedia</h4>
                    <div class="row">
                        @foreach ($fasilitas as $item)
                            <div class="col-6">
                                <li>{{ $item }}</li>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <br>

    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 id="modal-title" class="fs-5" id="exampleModalToggleLabel">Modal 1</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img width="100%" src="{{ $kost->foto }}" alt="" srcset="">
                    <br>
                    <br>
                    <h4>Fasilitas Yang Tersedia</h4>
                    <div class="row">
                        @foreach ($fasilitas as $item)
                            <div class="col-6">
                                <li>{{ $item }}</li>
                            </div>
                        @endforeach
                    </div>
                    <h5>Rp {{ $kost->harga }} / Bulan</h5>
                </div>
                <div class="modal-footer">
                    <a id="link" href="/pembayaran/{{ $kost->slug }}/" data-id="{{ $kost->slug }}"><button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Pesan Sekarang</button></a>
                </div>
            </div>
        </div>
    </div>


</div>

<script>
    const thumbnails = document.querySelectorAll('.thumbnail');
    const mainImage = document.getElementById('mainImage');

    thumbnails.forEach((thumbnail) => {
        thumbnail.addEventListener('click', () => {
        const index = thumbnail.dataset.index;
        const imageSrc = `../images/kost-pak-haji/${index}.jpg`;
        mainImage.src = imageSrc;
        });
    });

    const kotakElements = document.querySelectorAll('.kotak');
    const modalTitle = document.getElementById('modal-title');
    const link = document.getElementById('link');

    kotakElements.forEach(kotak => {
      kotak.addEventListener('click', () => {
        if (kotak.classList.contains('tersedia') && !kotak.classList.contains('dipilih')) {
          // Hapus kelas "dipilih" dari kotak yang dipilih sebelumnya (hanya bisa memilih satu kotak)
          const kotakDipilih = document.querySelector('.kotak.dipilih');
          if (kotakDipilih) {
            kotakDipilih.classList.remove('dipilih');
          }

          // Tambahkan kelas "dipilih" pada kotak yang baru dipilih
          kotak.classList.add('dipilih');

          console.log(modalTitle)
          // Perbarui angka terpilih
          modalTitle.textContent = `Spesifikasi Kamar ${kotak.textContent}`;

            const id = kotak.textContent;
            link.setAttribute('href', `/pembayaran/{{ $kost->slug }}/${id}`);
            link.setAttribute('data-id', id);
        }
      });
    });

</script>
