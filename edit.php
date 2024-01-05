<?php

include_once 'Connection.php';

$id = $_GET["id"];

$mhs = query("SELECT * FROM data_sobat WHERE id = $id")[0];


if (isset($_POST["submit"])) {

  if (edit($_POST) > 0) {
    echo "
    <script>
      alert('data berhasil diedit');
      document.location.href = 'admin.php';
    </script>
    ";
  } else {
    echo "
    <script>
      alert('data gagal diedit');
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
  <title>edit data</title>
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
    <h1>Edit Data stok obat</h1>
    <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
    <input type="hidden" name="gambarlama" value="<?= $mhs["gambar"]; ?>">
    <div class="col-md-6">
      <label for="nama_obat" class="form-label">nama obat</label>
      <input type="text" name="nama_obat" class="form-control" id="nama_obat" placeholder="Masukkan nama obat" required autocomplete="off" value="<?= $mhs["nama_obat"] ?>">
    </div>
    <div class="col-md-6">
      <label for="kode_obat" class="form-label">kode obat</label>
      <input type="text" name="kode_obat" class="form-control" id="kode_obat" placeholder="Masukkan kode obat" required autocomplete="off" value="<?= $mhs["kode_obat"] ?>">
    </div>
    <div class="col-md-6">
      <label for="golongan" class="form-label">Golongan</label>
      <select id="golongan" name="golongan" class="form-select" required autocomplete="off" value="<?= $mhs["golongan"] ?>">
        <option>SEMUA</option>
        <option>DEWASA</option>
        <option>ANAK-ANAK</option>
      </select>
    </div>
    <div class="col-md-6">
      <label for="jenis" class="form-label">Jenis</label>
      <select id="jenis" name="jenis" class="form-select" required autocomplete="off" value="<?= $mhs["jenis"] ?>">
        <option>ANTIBIOTIK</option>
        <option>BIOTIK</option>
      </select>
    </div>
    <div class="col-md-6">
      <label for="bentuk" class="form-label">Bentuk</label>
      <select id="bentuk" name="bentuk" class="form-select" required autocomplete="off" value="<?= $mhs["bentuk"] ?>">
        <option>KAPSUL</option>
        <option>TABLET</option>
        <option>SIRUP</option>
      </select>
    </div>
    <div class="col-md-6">
      <label for="kemasan" class="form-label">Kemasan</label>
      <input type="text" name="kemasan" class="form-control" id="kemasan" required autocomplete="off" value="<?= $mhs["kemasan"] ?>">
    </div>
    <div class="col-md-6">
      <label for="stock" class="form-label">Stock</label>
      <input type="text" name="stock" class="form-control" id="stock" required autocomplete="off" value="<?= $mhs["stock"] ?>">
    </div>
    <div class="col-md-6">
      <label for="expired" class="form-label">Expired</label>
      <input type="date" name="expired" class="form-control" id="expired" required autocomplete="off" value="<?= $mhs["expired"] ?>">
    </div>
    <div class="col-12">
      <label for="gambar" class="form-label">Gambar</label><br><img src="image/<?= $mhs["gambar"] ?>" width="50"><br>
      <input type="file" name="gambar" class="form-control" id="gambar" autocomplete="off" value="<?= $mhs["gambar"] ?>">
    </div>
    <div class="col-12 mt-3">
      <button type="submit" name="submit" class="btn btn-primary">Edit</button>
    </div>
  </form>
</body>

</html>