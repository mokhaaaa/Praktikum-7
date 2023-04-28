<?php
include "koneksi.php";
// Pengecekan form submit
if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $alamat = $_POST["alamat"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $id_divisi = $_POST["id_divisi"];
    $id_jabatan = $_POST["id_jabatan"];

    $sql = "SELECT MAX(id_pegawai) as max_id FROM pegawai";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $new_id = $row["max_id"] + 1;
    // Menambahkan data ke tabel pegawai
    $sql_insert = "INSERT INTO pegawai (id_pegawai, nama, tanggal_lahir, alamat, jenis_kelamin, id_divisi, id_jabatan) 
            VALUES ('$new_id', '$nama', '$tanggal_lahir', '$alamat', '$jenis_kelamin', '$id_divisi', '$id_jabatan')";
    if (mysqli_query($conn, $sql_insert)) {
        $last_id = mysqli_insert_id($conn);
        echo "Data berhasil disimpan. ID Pegawai terakhir adalah: " . $last_id;
        header("Location: main.php");
    exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }        
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pegawai</title>
</head>
<body>
    <h2>Tambah Pegawai</h2>
    <!-- Form untuk menambahkan data ke tabel pegawai-->
    <form method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>
        <br>
        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
        <br>
        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat" required></textarea>
        <br>
        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
        <br>
        <label for="id_divisi">Divisi:</label>
        <select id="id_divisi" name="id_divisi" required>
            <?php
            //Menampilkan data tabel divisi ke dropdown
            $sql = "SELECT * FROM divisi";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row["id_divisi"] . "'>" . $row["nama_divisi"] . "</option>";
            }
            ?>
        </select>
        <br>
        <label for="id_jabatan">Jabatan:</label>
        <select id="id_jabatan" name="id_jabatan" required>
            <?php
            //Menampilkan data tabel jabatan ke dropdown
            $sql = "SELECT * FROM jabatan";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row["id_jabatan"] . "'>" . $row["nama_jabatan"] . " - Gaji: " . $row["gaji"] . "</option>";

            }
            ?>
        </select>
        <br>
        <button type="submit" name="submit">Simpan</button>
    </form>
</body>
</html>
