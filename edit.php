<?php 
include 'db.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id=$id");
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

</head>
<body>
<h2>✏️ Edit Data Mahasiswa</h2>

<form action="" method="post">
    <label>Nama:</label>
    <input type="text" name="nama" value="<?= $data['nama'] ?>" required>

    <label>NIM:</label>
    <input type="text" name="nim" value="<?= $data['nim'] ?>" required>

    <label>Tanggal Lahir:</label>
    <input type="date" name="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>" required>

    <label>Alamat:</label>
    <textarea name="alamat" required><?= $data['alamat'] ?></textarea>

    <button type="submit" name="update">Update</button>
    <a href="index.php" class="btn">Kembali</a>
</form>

<?php
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $tgl = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];

    mysqli_query($conn, "UPDATE mahasiswa SET 
        nama='$nama', 
        nim='$nim', 
        tanggal_lahir='$tgl', 
        alamat='$alamat'
        WHERE id=$id");

    echo "<script>alert('Data berhasil diupdate!');window.location='index.php';</script>";
}
?>
</body>
</html>
