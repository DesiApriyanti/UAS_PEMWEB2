<?php
$conn = mysqli_connect("localhost", "root", "", "db_stokobat");
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;
    $nama_obat = htmlspecialchars($data["nama_obat"]);
    $kode_obat = htmlspecialchars($data["kode_obat"]);
    $golongan = htmlspecialchars($data["golongan"]);
    $jenis = ($data["jenis"]);
    $bentuk = ($data["bentuk"]);
    $kemasan = htmlspecialchars($data["kemasan"]);
    $stock = htmlspecialchars($data["stock"]);
    $expired = htmlspecialchars($data["expired"]);
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO data_sobat VALUES ('','$nama_obat','$kode_obat','$golongan','$jenis',
  '$bentuk','$kemasan','$stock','$expired','$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        echo "<script>
            alert('Pilih gambar terlebih dahulu');
        </script>";
        return false;
    }
    $gambarvalid = ['jpg', 'jpeg', 'png'];
    $eksengambar = explode('.', $namaFile);
    $eksengambar = strtolower(end($eksengambar));
    if (!in_array($eksengambar, $gambarvalid)) {
        echo "<script>
            alert('silakan pilih gambar kembali');
        </script>";
        return false;
    }

    if ($ukuranFile > 1000000) {
        echo "<script>
        alert('Ukuran foto terlalu besar');
    </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $eksengambar;
    move_uploaded_file($tmpName, 'image/' . $namaFileBaru);

    return $namaFileBaru;
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM data_sobat WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function edit($data)
{
    global $conn;
    $id = $data["id"];
    $nama_obat = htmlspecialchars($data["nama_obat"]);
    $kode_obat = htmlspecialchars($data["kode_obat"]);
    $kemasan = htmlspecialchars($data["kemasan"]);
    $golongan = htmlspecialchars($data["golongan"]);
    $jenis = ($data["jenis"]);
    $bentuk = ($data["bentuk"]);
    $stock = htmlspecialchars($data["stock"]);
    $expired = htmlspecialchars($data["expired"]);
    $gambarlama = htmlspecialchars($data["gambarlama"]);

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarlama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE data_sobat SET nama_obat ='$nama_obat', kode_obat ='$kode_obat',
  golongan = '$golongan', jenis= '$jenis',
  bentuk = '$bentuk', kemasan = '$kemasan', stock = '$stock', expired = '$expired',gambar = '$gambar'
  WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($key)
{
    $query = "SELECT * FROM data_sobat WHERE 
    nama_obat LIKE '%$key%' OR
    kode_obat LIKE '%$key%' OR
    golongan LIKE '%$key%' OR
    stock LIKE '%$key%' OR
    expired LIKE '%$key%'
    ";

    return query($query);
}
