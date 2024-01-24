	<?php
		include 'koneksi.php';

		$query = "SELECT * FROM tabel_siswa;";
		$sql = mysqli_query($conn, $query);
		$no = 0;

	?>

	<html>
	<head>
		<meta charset="utf-8" />
		<!--Bootstrap-->
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

		<title>belajar_crud</title>
	</head>
	<body>
		<nav class="navbar bg-success">
			<div class="container-fluid">
			<a class="navbar-brand text-light" href="#">
				<img src="img/iklas.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
				DATA SISWA
			</a>
			</div>
		</nav>
		<!--Judul-->

		<div class="container">
		<h1 class="mt-4">Data Pendaftaran Calon Peserta Didik Baru</h1>
		<figure>
			<blockquote class="blockquote">
			<p>Berisi Data calon siswa yang telah tersimpan</p>
			</blockquote>
			<figcaption class="blockquote-footer">KEMENAG <cite title="Source Title">Kabupaten Mempawah</cite></figcaption>
		</figure>
		<a href="halamanadmin.php" type="button" class="btn btn-success mb-3">Kembali</a>
		<!-- <a href="kelolasiswa.php" type="button" class="btn btn-primary mb-3">Tambah Data</a> -->
		<div class="table-responsive">
			<table class="table align-middle table-bordered table-hover">
			<thead>
				<tr>
					<th><center>No.</center></th>
					<th>NISN</th>
					<th>Nama Siswa</th>
					<th>Jenis Kelamin</th>
					<th>Email</th>
					<th><center>Foto Siswa</center></th>
					<th>Alamat</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
					while($result = mysqli_fetch_assoc($sql)){
				?>
				<tr>
					<td><center>
					<?php echo ++$no;  ?>
					</center></td>
					<td><?php echo $result['nisn'];  ?></td>
					<td><?php echo $result['namalengkap'];  ?></td>
					<td><?php echo $result['jeniskelamin'];  ?></td>
					<td><?php echo $result['email'];  ?></td>
					<td><center><img src="fotosiswa/<?php echo $result['foto'];  ?>" style="width:80px;"></center></td>
					<td><?php echo $result['alamat'];  ?></td>
					<td><?php echo $result['status'];  ?></td>
					<td>
					<div class="btn-group" role="group">
						<a href="lihatdata.php?nisn=<?php echo $result['nisn']; ?>" type="button" class="btn btn-success btn-sm">Lihat</a>
						<a href="#" class="btn btn-secondary btn-sm" onclick="confirmDelete('<?php echo $result['nisn']; ?>')">Hapus</a>
						<a href="#" class="btn btn-primary btn-sm" onclick="terimaSiswa('<?php echo $result['email']; ?>', '<?php echo $result['nisn']; ?>',  '<?php echo $result['namalengkap']; ?>')">Terima</a>
						<a href="#" class="btn btn-danger btn-sm" onclick="tolakSiswa('<?php echo $result['email']; ?>', '<?php echo $result['nisn']; ?>','<?php echo $result['nik']; ?>', '<?php echo $result['namalengkap']; ?>', '<?php echo $result['telepon']; ?>')">Tolak</a>
					</div>


					</td>
				</tr>
				<?php
					}
				?>
			</tbody>

			</div>
		</div>
		</div>

<script>
function terimaSiswa(email, nisn, namalengkap) {
    if (confirm('Apakah anda yakin ingin menerima peserta ini dan mengirim email?')) {
        // Kirim email
        window.location.href = "mailto:" + email + "?subject=Kepada%20Yth%20Bapak/Ibu%20Calon%20Wali%20Murid&body=Selamat%20kepada%20ananda%20"+namalengkap+"%20telah%20lolos%20seleksi%20administrasi.Selanjutnya%20silahkan%20menunggu%20jadwal%20wawancara%20yang%20akan%20kami%20melalui%20email%20dan%20nomor%20whatsapp.Terima%20kasih%20telah%20memilih%20MTSN%2001%20Mempawah%20Hilir%20sebagai%20sekolah%20tujuan.";

        // Arahkan ke halaman konfirmasi
        window.location.href = "konfirmasi.php?nisn=" + nisn + "&status=Diterima";
    }
}

function tolakSiswa(email, nisn, nik, namalengkap, telepon) {
    if (confirm('Apakah anda yakin ingin menolak peserta ini dan mengirim email?')) {
        // Kirim email
        window.location.href = "mailto:" + email + "?subject=Kepada%20Yth%20Bapak/Ibu%20Calon%20Wali%20Murid&body=Dengan%20ini%20kami%20sampaikan%20bahwa%20Ananda%20"+namalengkap+"%20belum%20dapat%20diterima%20di%20MTSN%2001%20Mempawah%20Hilir%20karena%20belum%20memenuhi%20kriteria%20yang%20ditentukan.Terima%20kasih%20telah%20memilih%20MTSN%2001%20Mempawah%20Hilir%20sebagai%20sekolah%20tujuan.";

        // Simpan data ke tabel siswa_ditolak
        $.post('siswa_ditolak.php', { nisn: nisn, namalengkap: namalengkap, nik: nik, email: email, telepon: telepon }, function(response) {
            if (response === 'success') {
                // Arahkan ke halaman konfirmasi
                window.location.href = "konfirmasi.php?nisn=" + nisn + "&status=Ditolak";
            } else {
                alert('Gagal menyimpan data ke tabel siswa_ditolak.');
            }
        });
    }
}

function confirmDelete(nisn) {
            if (confirm('Apakah Anda yakin ingin menghapus data siswa ini?')) {
                window.location.href = 'proses_hapus.php?nisn=' + nisn;
            }
        }

</script>

	</body>
	</html>
