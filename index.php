<?php
include 'db.php';
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Loby & Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* ✨ Animasi tampil sembunyi */
        .hidden { display: none; }
        .fade-in {
            animation: fadeIn 0.8s ease forwards;
        }
        .topnav {
            text-align: center;
            margin-bottom: 25px;
        }
        .topnav a {
            color: #fff;
            margin: 0 10px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }
        .topnav a:hover {
            color: #00c6ff;
        }
    </style>
</head>
<body>

    <!-- ======== LOBY ======== -->
    <div id="loby" class="loby-container fade-in">
        <h1>🎓 Sistem Data Mahasiswa</h1>
        <p>Selamat datang <br>
           Anda dapat menambah, mengedit, dan menghapus data mahasiswa dengan mudah.</p>
        <div class="loby-buttons">
            <button class="btn" onclick="masukData()">Masuk ke Data</button>
            <a href="#" class="btn secondary" onclick="alert('Selamat Datang')">Tentang</a>
        </div>
    </div>

    <!-- ======== HALAMAN DATA ======== -->
    <div id="dataPage" class="container hidden fade-in">
        <div class="topnav">
            <a href="#" onclick="kembaliLoby()">🏠 Kembali ke Loby</a>
        </div>
        <h2>📚 Data Mahasiswa</h2>
        <a href="add.php" class="btn">+ Tambah Data</a>
        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>{$no}</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['nim']}</td>
                    <td>{$row['tanggal_lahir']}</td>

                    <td>{$row['alamat']}</td>
                    <td>
                        <a href='edit.php?id={$row['id']}' class='edit'>Edit</a> |
                        <a href='delete.php?id={$row['id']}' class='delete' onclick='return confirm(\"Yakin hapus data ini?\")'>Hapus</a>
                    </td>
                </tr>";
                $no++;
            }
            ?>
        </table>
    </div>

    <script>
        // 🌟 Script navigasi antara Loby dan Data
        function masukData() {
            document.getElementById("loby").classList.add("hidden");
            document.getElementById("dataPage").classList.remove("hidden");
        }

        function kembaliLoby() {
            document.getElementById("dataPage").classList.add("hidden");
            document.getElementById("loby").classList.remove("hidden");
        }
    </script>

</body>
</html>
