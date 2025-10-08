<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
<h2>➕ Tambah Data Mahasiswa</h2>

<form action="" method="post">
    <label>Nama:</label>
    <input type="text" name="nama" required>

    <label>NIM:</label>
    <input type="text" name="nim" required>

    <label>Tanggal Lahir:</label>
    <input type="date" name="tanggal_lahir" required>

    <label>Alamat:</label>
    <textarea name="alamat" required></textarea>

    <button type="submit" name="submit">Simpan</button>
    <a href="index.php" class="btn">Kembali</a>
</form>

<?php
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $tgl = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO mahasiswa (nama, nim, tanggal_lahir, alamat)
              VALUES ('$nama', '$nim', '$tgl', '$alamat')";
    mysqli_query($conn, $query);

    echo "<script>alert('Data berhasil ditambah!');window.location='index.php';</script>";
}
?>
</body>
</html>
