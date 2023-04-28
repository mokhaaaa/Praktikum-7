<?php
include "koneksi.php";
// Pengecekan form submit
if (isset($_POST["submit"])) {
    $id = $_POST["id_pegawai"];
    $nama = $_POST["nama"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $alamat = $_POST["alamat"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $id_divisi = $_POST["id_divisi"];
    $id_jabatan = $_POST["id_jabatan"];
    // Mengupdate data ke tabel pegawai
    $sql = "UPDATE pegawai SET nama='$nama', tanggal_lahir='$tanggal_lahir', alamat='$alamat', jenis_kelamin='$jenis_kelamin', id_divisi='$id_divisi', id_jabatan='$id_jabatan' WHERE id_pegawai='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil diupdate";
        header("Location: main.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
//Pengecekan ID
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    // Pengupdatean data dengan ID yang telah diberikan
    $sql = "SELECT * FROM pegawai WHERE id_pegawai='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Data Pegawai</title>
</head>
<body>
    <h2>Update Data Pegawai</h2>
    <!-- Form untuk mengupdate data ke tabel pegawai-->
    <form action="" method="post">
        <input type="hidden" name="id_pegawai" value="<?php echo $row['id_pegawai']; ?>">
        <label>Nama</label>
        <input type="text" name="nama" value="<?php echo $row['nama']; ?>"><br>
        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>"><br>
        <label>Alamat</label>
        <textarea name="alamat"><?php echo $row['alamat']; ?></textarea><br>
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin">
            <option value="L" <?php if ($row['jenis_kelamin'] == 'L') echo 'selected'; ?>>Laki-laki</option>
            <option value="P" <?php if ($row['jenis_kelamin'] == 'P') echo 'selected'; ?>>Perempuan</option>
        </select><br>
        <label>Divisi</label>
        <select name="id_divisi">
            <?php
            //Menampilkan data tabel divisi ke dropdown
            $sql_divisi = "SELECT * FROM divisi";
            $result_divisi = mysqli_query($conn, $sql_divisi);
            while ($row_divisi = mysqli_fetch_assoc($result_divisi)) {
                if ($row['id_divisi'] == $row_divisi['id_divisi']) {
                    echo '<option value="' . $row_divisi['id_divisi'] . '" selected>' . $row_divisi['nama_divisi'] . '</option>';
                } else {
                    echo '<option value="' . $row_divisi['id_divisi'] . '">' . $row_divisi['nama_divisi'] . '</option>';
                }
            }
            ?>
        </select><br>
        <label>Jabatan</label>
        <select name="id_jabatan">
            <?php
            //Menampilkan data tabel jabatan ke dropdown
            $sql_jabatan = "SELECT * FROM jabatan";
            $result_jabatan = mysqli_query($conn, $sql_jabatan);
            while ($row_jabatan = mysqli_fetch_assoc($result_jabatan)) {
                if ($row['id_jabatan'] == $row_jabatan['id_jabatan']) {
                    echo '<option value="' . $row_jabatan['id_jabatan'] . '">' . $row_jabatan['nama_jabatan'] . ' - Gaji: ' . $row_jabatan['gaji'] . '</option>';

                } else {
                    echo '<option value="' . $row_jabatan['id_jabatan'] . '">' . $row_jabatan['nama_jabatan'] . ' - Gaji: ' . $row_jabatan['gaji'] . '</option>';

                }
            }
            ?>
        </select>
        <br>
            <button type="submit" name="submit">Simpan</button>
        </form>
    </body>
</html>

