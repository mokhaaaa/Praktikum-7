	<?php
	include "koneksi.php";

	// mengambil data dari database
	$sql = "SELECT pegawai.*, jabatan.nama_jabatan, divisi.nama_divisi, jabatan.gaji
			FROM pegawai 
			JOIN divisi ON pegawai.id_divisi = divisi.id_divisi
			JOIN jabatan ON pegawai.id_jabatan = jabatan.id_jabatan ";

	$result = mysqli_query($conn, $sql);
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Pegawai</title>
	</head>
	<body>
		<h2>Data Pegawai</h2>
		<a href="add.php">Tambah Data</a>
		<br><br>
		<!--Membuat tabel untuk menampilkan data-->
		<table border="1">
			<tr>
				<th>ID Pegawai</th>
				<th>Nama</th>
				<th>Tanggal Lahir</th>
				<th>Alamat</th>
				<th>Jenis Kelamin</th>
				<th>Nama Divisi</th>
				<th>Nama Jabatan</th>
				<th>Gaji</th>
				<th> </th>
			</tr>
			<?php 
				// Menampilkan data ke tabel
				while ($row = mysqli_fetch_assoc($result)) { ?>
			<tr>
				<td><?php echo $row["id_pegawai"]; ?></td>
				<td><?php echo $row["nama"]; ?></td>
				<td><?php echo $row["tanggal_lahir"]; ?></td>
				<td><?php echo $row["alamat"]; ?></td>
				<td><?php echo $row["jenis_kelamin"]; ?></td>
				<td><?php echo $row["nama_divisi"]; ?></td>
				<td><?php echo $row["nama_jabatan"]; ?></td>
				<td><?php echo $row["gaji"]; ?></td>
				<td>
					<a href="update.php?id=<?php echo $row["id_pegawai"]; ?>">Edit</a>
					<a href="delete.php?id=<?php echo $row["id_pegawai"]; ?>">Hapus</a>
				</td>
			</tr>
			<?php } ?>
		</table>
	</body>
	</html>
