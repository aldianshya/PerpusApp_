<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kartu</title>
    <style>
        /* CSS styling untuk kartu */
        .card {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
    </style>
</head>
<body>

    <!-- Konten Kartu -->
    <div class="card" id="kartuContent">
        <div class="order-complete-tfj">
      <div class="title-1EZ">
        <p class="terima-kasih--8a5">Terima kasih! 🎉</p>
        <p class="tunggu-konfirmasi-dari-kami-eHX">Tunggu Konfirmasi dari kami!</p>
      </div>
      <div class="orders-1-MSq">
        <div class="item-tSm">
          <div class="image-placeholder-2Yy">
            <img class="paste-image-yj7" src="./assets/paste-image-q45.png"/>
          </div>
          <div class="image-placeholder-86D">
            <img class="paste-image-t5P" src="./assets/paste-image-1oX.png"/>
          </div>
          <div class="image-placeholder-dHs">
            <img class="paste-image-nRf" src="./assets/paste-image-teu.png"/>
          </div>
        </div>
        <div class="order-detail-XPF">
          <div class="title-3sP">
            <div class="auto-group-cxnp-o5s">
              <div class="tanggal--99j">Tanggal:</div>
              <div class="total--sLd">Total:</div>
            </div>
            <div class="perpustakaan--1Bw">Perpustakaan :</div>
          </div>
          <div class="info-LED">
            <div class="october-31-2023-tFj">October 31, 2023</div>
            <div class="buku-pfB">3 Buku</div>
            <div class="perpustakaan-universitas-jambi-Zcm">Perpustakaan Universitas Jambi</div>
          </div>
        </div>
      </div>
      <div class="orders-2-VFX">
        <img class="paste-image-Rey" src="./assets/paste-image-xBK.png"/>
        <div class="order-detail-9ay">
          <div class="title-WAd">
            <div class="auto-group-mxu7-rEV">
              <div class="tanggal--ypu">Tanggal:</div>
              <div class="total--W49">Total:</div>
            </div>
            <div class="perpustakaan--F1j">Perpustakaan :</div>
          </div>
          <div class="info-Nc9">
            <div class="october-31-2023-uc5">October 31, 2023</div>
            <div class="buku-SM7">1 Buku</div>
            <div class="perpustakaan-umum-kota-jambi-nA5">Perpustakaan Umum Kota Jambi</div>
          </div>
        </div>
      </div>
    </div>
    </div>

    <!-- Tombol untuk Cetak atau Unduh -->
    <button onclick="cetakKartu()">Cetak Kartu</button>
    <a id="unduhLink" style="display: none">Unduh Kartu</a>

    <!-- Skrip JavaScript -->
    <script>
        function cetakKartu() {
            // Mendapatkan konten kartu
            var kontenKartu = document.getElementById('kartuContent').innerHTML;

            // Membuat jendela pop-up untuk mencetak
            var jendelaCetak = window.open('', '_blank');
            jendelaCetak.document.write('<html><head><title>Kartu Pribadi</title></head><body>');
            jendelaCetak.document.write('<style>@media print {body {visibility: hidden;}}</style>');
            jendelaCetak.document.write('<div>' + kontenKartu + '</div>');
            jendelaCetak.document.write('</body></html>');

            // Menutup jendela pop-up setelah mencetak
            jendelaCetak.document.close();
            jendelaCetak.print();
            jendelaCetak.close();

            // Menampilkan tombol unduh setelah mencetak
            var unduhLink = document.getElementById('unduhLink');
            unduhLink.href = 'data:text/html;charset=utf-8,' + encodeURIComponent('<html><head><title>Kartu Pribadi</title></head><body>' + kontenKartu + '</body></html>');
            unduhLink.download = 'kartu_pribadi.html';
            unduhLink.style.display = 'block';
        }
    </script>

</body>
</html>
