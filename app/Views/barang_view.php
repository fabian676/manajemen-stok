<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Barang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    .container {
      max-width: 800px;
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <!-- CONTAINER -->
  <div class="container">
    <!-- CARD -->
    <div class="card">
      <div class="card-header bg-secondary text-white">
        Data Barang
      </div>
      <div class="card-body">
        <!-- text pencarian -->
        <form action="" method="get">
          <div class="input-group mb-3">
            <input type="text" class="form-control" value="<?php echo $katakunci ?>" name="katakunci"
              placeholder="Masukkan kata kunci" aria-label="masukkan kata kunci" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Cari</button>
          </div>
        </form>
        <!-- Modal -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
          + Tambah Data Barang
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">form barang</h1>
                <button type="button" class="btn-close tombol-tutup" data-bs-dismiss="modal"
                  aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- kalau error -->
                <div class="alert alert-danger error" role="alert" style="display: none">
                </div>
                <!-- kalau sukses -->
                <div class="alert alert-primary sukses" role="alert" style="display: none">
                </div>
                <!-- Form input barang -->
                <input type="hidden" id="inputId">
                <div class="mb-3 row">
                  <label for="inputNamaBarang" class="col-sm-2 col-form-label">Barang</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputNamaBarang">
                  </div>
                </div>
                <!-- Form input Kategori -->
                <div class="mb-3 row">
                  <label for="inputKategori" class="col-sm-2 col-form-label">Kategori</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputKategori">
                  </div>
                </div>
                <!-- Form input stok -->
                <div class="mb-3 row">
                  <label for="inputStok" class="col-sm-2 col-form-label">Stok</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputStok">
                  </div>
                </div>
                <!-- Form input harga -->
                <div class="mb-3 row">
                  <label for="inputHarga" class="col-sm-2 col-form-label">Harga</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputHarga">
                  </div>
                </div>
                <!-- Form input deskripsi -->
                <div class="mb-3 row">
                  <label for="inputDeskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputDeskripsi">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary tombol-tutup" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="tombolSimpan">Simpan</button>
              </div>
            </div>
          </div>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Kategori</th>
              <th>Stok</th>
              <th>Harga</th>
              <th>Deskripsi</th>
              <th>Tanggal Dibuat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $halamanSaatIni = $pager->getCurrentPage(); // Ambil halaman saat ini
            $jumlahBaris = 5; // Sesuai jumlah data per halaman
            $nomor = ($halamanSaatIni - 1) * $jumlahBaris + 1; // Hitung nomor awal
            foreach ($dataBarang as $key => $value) {
              # code..
              ?>
              <tr>
                <td><?php echo $nomor++; ?></td> <!-- Gunakan $nomor++ agar terus naik -->
                <td><?php echo $value['nama_barang'] ?></td>
                <td><?php echo $value['kategori'] ?></td>
                <td><?php echo $value['stok'] ?></td>
                <td><?php echo $value['harga'] ?></td>
                <td><?php echo $value['deskripsi'] ?></td>
                <td><?= $value['tanggal_dibuat'] ?></td> <!-- Tanggal Dibuat -->
                <td>
                  <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                    data-bs-target="#exampleModal" onclick="edit(<?php echo $value['id_barang'] ?>)">Edit</button>
                  <button type="button" class="btn btn-danger btn-sm"
                    onclick="hapus(<?php echo $value['id_barang'] ?>)">Hapus</button>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <?php
        $linkPagination = $pager->links();
        $linkPagination = str_replace('<li class="active">', '<li class="page-item active">', $linkPagination);
        $linkPagination = str_replace('<li>', '<li class="page-item">', $linkPagination);
        $linkPagination = str_replace("<a", "<a class='page-link'", $linkPagination);
        echo $linkPagination;
        ?>
      </div>
    </div>
  </div>

  <!-- SCRIPT JAVASCRIPT -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

  <script>
    function hapus(id_barang) {
      if (!id_barang) {
        alert('ID Barang tidak valid!');
        return;
      }

      var result = confirm('Yakin ingin menghapus data ini?');

      if (result) {
        window.location.href = "<?= base_url('barang/hapus') ?>/" + id_barang;
      }
    }

    function edit($id_barang) {
      var url = "<?php echo site_url('barang/edit') ?>/" + $id_barang;
      console.log("Request URL:", url); // Tambahkan ini untuk debugging
      $.ajax({
        url: "<?php echo site_url("barang/edit/") ?>" + $id_barang,
        type: "get",
        success: function (hasil) {
          console.log("Response dari server:", hasil); // Tambahkan ini untuk cek hasil AJAX
          var $obj = $.parseJSON(hasil);
          $('#exampleModal').modal('show'); // Tampilkan modal sebelum set value

          if ($obj.id_barang != ' ') {
            $('#inputId').val($obj.id_barang);
            $('#inputNamaBarang').val($obj.nama_barang);
            $('#inputKategori').val($obj.kategori);
            $('#inputStok').val($obj.stok);
            $('#inputHarga').val($obj.harga);
            $('#inputDeskripsi').val($obj.deskripsi);
          }
        }
      });
    }

    function bersihkan() {
      $('#inputId').val('');
      $('#inputNamaBarang').val('');
      $('#inputKategori').val('');
      $('#inputStok').val('');
      $('#inputHarga').val('');
      $('#inputDeskripsi').val('');
    }
    $('.tombol-tutup').on('click', function name(params) {
      if ($('.sukses').is(":visible")) {
        window.location.href = "<?php echo current_url() . "?" . $_SERVER['QUERY_STRING'] ?>";
      }
      $('.alert').hide();
      bersihkan();
    });

    $('#tombolSimpan').on('click', function () {
      var $id_barang = $('#inputId').val();
      var $barang = $('#inputNamaBarang').val();
      var $kategori = $('#inputKategori').val();
      var $stok = $('#inputStok').val();
      var $harga = $('#inputHarga').val();
      var $deskripsi = $('#inputDeskripsi').val();

      $.ajax({
        url: "<?php echo site_url("barang/simpan") ?>",
        type: "POST",
        data: {
          id_barang: $id_barang,
          nama_barang: $barang,
          kategori: $kategori,
          stok: $stok,
          harga: $harga,
          deskripsi: $deskripsi
        },
        success: function (hasil) {
          var $obj = $.parseJSON(hasil);
          if ($obj.sukses == false) {
            $('.sukses').hide();
            $('.error').show();
            $('.error').html($obj.error);
          } else {
            $('.error').hide();
            $('.sukses').show();
            $('.sukses').html($obj.sukses);
          }
        }
      });
      bersihkan();

    });
  </script>
</body>

</html>