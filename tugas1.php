<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "myDB";

// Membuat Koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Mengecek Koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Membuat tabel buku_tamu
$sql = "CREATE TABLE buku_tamu (
ID_BT INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
NAMA VARCHAR(200) NOT NULL,
EMAIL VARCHAR(50) NOT NULL,
ISI text
)";

if (mysqli_query($conn, $sql)) {
    echo "Tabel buku tamu berhasil dibuat";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
