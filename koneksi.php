    <?php
    // Membuat koneksi ke server MySQL
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "pegawai_db";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Mengecek koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
    ?>