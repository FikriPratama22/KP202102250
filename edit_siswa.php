<?php
include 'koneksi.php';

$nisn = $_GET['nisn'] ?? '';

if (!empty($nisn)) {
    // Ambil data siswa dari database berdasarkan nisn
    $query = "SELECT * FROM tabel_siswa WHERE nisn = '$nisn'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            $errorMessage = "Data tidak ditemukan.";
        }
    } else {
        $errorMessage = "Kesalahan kueri database: " . mysqli_error($conn);
    }
} else {
    $errorMessage = "Permintaan tidak valid.";
}

// Handle proses penyimpanan data yang diedit (jika diperlukan)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Proses penyimpanan data yang diedit ke database
    // ...

    // Redirect ke halaman lihat data setelah penyimpanan
    header("Location: lihatdata.php?nisn=$nisn");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Data Siswa</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Edit Data Siswa</h2>
        <div class="container">
        <?php if (isset($errorMessage)): ?>
            <p><?php echo $errorMessage; ?></p>
        <?php elseif (isset($row)): ?>
            <form action="proses_edit.php" method="POST">
                <input type="hidden" name="nisn" value="<?php echo $row['nisn']; ?>">
                <div class="form-group">
                    <label for="nik">NIK:</label>
                    <input type="text" class="form-control" name="nik" value="<?php echo $row['nik']; ?>">
                </div>
                <div class="form-group">
                    <label for="namalengkap">Nama Lengkap:</label>
                    <input type="text" class="form-control" name="namalengkap" value="<?php echo $row['namalengkap']; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                </div>
                <div class="form-group">
                    <label for="jeniskelamin">Jenis Kelamin:</label>
                    <input type="text" class="form-control" name="jeniskelamin" value="<?php echo $row['jeniskelamin']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="tempatlahir">Tempat Lahir:</label>
                    <input type="text" class="form-control" name="tempatlahir" value="<?php echo $row['tempatlahir']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="tanggallahir">Tanggal Lahir:</label>
                    <input type="text" class="form-control" name="tanggallahir" value="<?php echo $row['tanggallahir']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <input type="text" class="form-control" name="alamat" value="<?php echo $row['alamat']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="agama">Agama:</label>
                    <input type="text" class="form-control" name="agama" value="<?php echo $row['agama']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="telepon">Telepon:</label>
                    <input type="text" class="form-control" name="telepon" value="<?php echo $row['telepon']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="ayahnik">NIK Ayah:</label>
                    <input type="text" class="form-control" name="ayahnik" value="<?php echo $row['ayahnik']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="ayahnama">Nama Ayah:</label>
                    <input type="text" class="form-control" name="ayahnama" value="<?php echo $row['ayahnama']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="ayahpendidikan">Pendidikan Ayah:</label>
                    <input type="text" class="form-control" name="ayahpendidikan" value="<?php echo $row['ayahpendidikan']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="ayahpekerjaan">Pekerjaan Ayah:</label>
                    <input type="text" class="form-control" name="ayahpekerjaan" value="<?php echo $row['ayahpekerjaan']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="ayahpenghasilan">Penghasilan Ayah:</label>
                    <input type="text" class="form-control" name="ayahpenghasilan" value="<?php echo $row['ayahpenghasilan']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="ayahtelepon">Telepon Ayah:</label>
                    <input type="text" class="form-control" name="ayahtelepon" value="<?php echo $row['ayahtelepon']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="ibunik">NIK Ibu:</label>
                    <input type="text" class="form-control" name="ibunik" value="<?php echo $row['ibunik']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="ibunama">Nama Ibu:</label>
                    <input type="text" class="form-control" name="ibunama" value="<?php echo $row['ibunama']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="ibupendidikan">Pendidikan Ibu:</label>
                    <input type="text" class="form-control" name="ibupendidikan" value="<?php echo $row['ibupendidikan']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="ibupekerjaan">Pekerjaan Ibu:</label>
                    <input type="text" class="form-control" name="ibupekerjaan" value="<?php echo $row['ibupekerjaan']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="ibupekerjaan">Penghasilan Ibu:</label>
                    <input type="text" class="form-control" name="ibupenghasilan" value="<?php echo $row['ibupenghasilan']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="ibutelepon">Telepon Ibu:</label>
                    <input type="text" class="form-control" name="ibutelepon" value="<?php echo $row['ibutelepon']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="walinik">NIK WALI:</label>
                    <input type="text" class="form-control" name="walinik" value="<?php echo $row['walinik']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="walinama">Nama Wali:</label>
                    <input type="text" class="form-control" name="walinama" value="<?php echo $row['walinama']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="walipekerjaan">Pekerjaan Wali:</label>
                    <input type="text" class="form-control" name="walipekerjaan" value="<?php echo $row['walitelepon']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="sekolahnpsn">NPSN Sekolah Asal:</label>
                    <input type="text" class="form-control" name="sekolahnpsn" value="<?php echo $row['sekolahnpsn']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="sekolahnama">Nama Sekolah Asal:</label>
                    <input type="text" class="form-control" name="sekolahnama" value="<?php echo $row['sekolahnama']; ?>"><br>
                </div>
                <!-- Tambahkan form fields lainnya dengan cara yang sama -->

                <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin ingin mengubah data ini?')">Simpan Perubahan</button>
                
            </form>
            <a href="tabelsiswa.php" class="btn btn-success">Kembali</a>
        <?php endif; ?>
        </div>
    </div>
</body>
</html>
