<?php
include "koneksi.php";
//Pengecekan ID
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    // Penghapusan data dengan ID yang telah diberikan
    $sql = "DELETE FROM pegawai WHERE id_pegawai = $id";
    if (mysqli_query($conn, $sql)) {
        // update data dengan ID lebih besar atau sama dengan ID yang dihapus
        $update_sql = "UPDATE pegawai SET id_pegawai = id_pegawai - 1 WHERE id_pegawai >= $id";
        mysqli_query($conn, $update_sql);
        
        header("Location: main.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
