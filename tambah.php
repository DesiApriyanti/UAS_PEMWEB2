<?php

include_once 'Connection.php';
if (isset($_POST["submit"])) {

  if (tambah($_POST) > 0) {
    echo "
    <script>
      alert('data berhasil ditambahkan');
      document.location.href = 'admin.php';
    </script>
    ";
  } else {
    echo "
    <script>
      alert('data gagal ditambahkan');
      document.location.href = 'admin.php';
    </script>
    ";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Tambah data</title>
  <style>
    body {
      margin: 0;
      padding: 10px;
    }

    .row {
      padding: 20px;
    }
  </style>
</head>

<body>
  <form action="" method="post" enctype="multipart/form-data">
    <h1>Tambah Data stok obat</h1>
    <div class="col-md-6">
      <label for="nama_obat" class="form-label">nama obat</label>
      <input type="text" name="nama_obat" class="form-control" id="nama_obat" placeholder="Masukkan nama obat" required autocomplete="off">
    </div>
    <div class="col-md-6">
      <label for="kode_obat" class="form-label">kode obat</label>
      <input type="text" name="kode_obat" class="form-control" id="kode_obat" placeholder="Masukkan kode obat" required autocomplete="off">
    </div>
    <div class="col-md-6">
      <label for="golongan" class="form-label">Golongan</label>
      <select id="golongan" name="golongan" class="form-select" required autocomplete="off">
        <option>SEMUA</option>
        <option>DEWASA</option>
        <option>ANAK-ANAK</option>
      </select>
    </div>
    <div class="col-md-6">
      <label for="jenis" class="form-label">Jenis</label>
      <select id="jenis" name="jenis" class="form-select" required autocomplete="off">
        <option>ANTIBIOTIK</option>
        <option>BIOTIK</option>
      </select>
    </div>
    <div class="col-md-6">
      <label for="bentuk" class="form-label">Bentuk</label>
      <select id="bentuk" name="bentuk" class="form-select" required autocomplete="off">
        <option>KAPSUL</option>
        <option>TABLET</option>
        <option>SIRUP</option>
      </select>
    </div>
    <div class="col-md-6">
      <label for="kemasan" class="form-label">Kemasan</label>
      <input type="text" name="kemasan" class="form-control" id="kemasan" required autocomplete="off">
    </div>
    <div class="col-md-6">
      <label for="stock" class="form-label">Stock</label>
      <input type="text" name="stock" class="form-control" id="stock" required autocomplete="off">
    </div>
    <div class="col-md-6">
      <label for="expired" class="form-label">Expired</label>
      <input type="date" name="expired" class="form-control" id="expired" required autocomplete="off">
    </div>
    <div class="col-12">
      <label for="gambar" class="form-label">Gambar</label><br><img src="image/<?= $mhs["gambar"] ?>" width="50"><br>
      <input type="file" name="gambar" class="form-control" id="gambar" autocomplete="off">
    </div>
    <div class="col-12 mt-3">
      <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
    </div>
  </form>
</body>

</html>