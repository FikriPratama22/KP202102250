<?php
include 'koneksi.php';

$nisn = $_GET['nisn'] ?? '';

if (!empty($nisn)) {
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
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Lihat Data Terkirim</title>
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Lihat Data Terkirim</h2>
        <a href="tabelsiswa.php" type="button" class="btn btn-success mt-3">Kembali</a>

        <?php if (isset($errorMessage)): ?>
            <div class="alert alert-danger mt-3"><?php echo $errorMessage; ?></div>
        <?php elseif (isset($row)): ?>
            <div class="card mt-3">
                <div class="card-header">
                    Detail Siswa
                </div>
                <div class="card-body">
                    <p><strong>NISN:</strong> <?php echo $row['nisn']; ?></p>
                    <p><strong>NIK:</strong> <?php echo $row['nik']; ?></p>
                    <p><strong>Nama Lengkap:</strong> <?php echo $row['namalengkap']; ?></p>
                    <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                    <p><strong>Jenis Kelamin:</strong> <?php echo $row['jeniskelamin']; ?></p>
                    <p><strong>Tempat Lahir:</strong> <?php echo $row['tempatlahir']; ?></p>
                    <p><strong>Tanggal Lahir:</strong> <?php echo $row['tanggallahir']; ?></p>
                    <p><strong>Alamat:</strong> <?php echo $row['alamat']; ?></p>
                    <p><strong>Agama:</strong> <?php echo $row['agama']; ?></p>
                    <p><strong>Telepon:</strong> <?php echo $row['telepon']; ?></p>
                    <p><strong>NIK Ayah:</strong> <?php echo $row['ayahnik']; ?></p>
                    <p><strong>Nama Ayah:</strong> <?php echo $row['ayahnama']; ?></p>
                    <p><strong>Pendidikan Ayah:</strong> <?php echo $row['ayahpendidikan']; ?></p>
                    <p><strong>Pekerjaan Ayah:</strong> <?php echo $row['ayahpekerjaan']; ?></p>
                    <p><strong>Penghasilan Ayah:</strong> <?php echo $row['ayahpenghasilan']; ?></p>
                    <p><strong>Telepon Ayah:</strong> <?php echo $row['ayahtelepon']; ?></p>
                    <p><strong>NIK Ibu:</strong> <?php echo $row['ibunik']; ?></p>
                    <p><strong>Nama Ibu:</strong> <?php echo $row['ibunama']; ?></p>
                    <p><strong>Pendidikan Ibu:</strong> <?php echo $row['ibupendidikan']; ?></p>
                    <p><strong>Pekerjaan Ibu:</strong> <?php echo $row['ibupekerjaan']; ?></p>
                    <p><strong>Penghasilan Ibu:</strong> <?php echo $row['ibupenghasilan']; ?></p>
                    <p><strong>Telepon Ibu:</strong> <?php echo $row['ibutelepon']; ?></p>
                    <p><strong>NIK Wali:</strong> <?php echo $row['walinik']; ?></p>
                    <p><strong>Nama Wali:</strong> <?php echo $row['walinama']; ?></p>
                    <p><strong>Pekerjaan Wali:</strong> <?php echo $row['walipekerjaan']; ?></p>
                    <p><strong>Telepon Wali:</strong> <?php echo $row['walitelepon']; ?></p>
                    <p><strong>NPSN Sekolah Asal:</strong> <?php echo $row['sekolahnpsn']; ?></p>
                    <p><strong>Nama Sekolah Asal:</strong> <?php echo $row['sekolahnama']; ?></p>
                    <!-- Lanjutkan menampilkan bidang lainnya dengan format yang sama -->

                    <p><strong>Foto Siswa:</strong></p>
                    <img src="fotosiswa/<?php echo $row['foto']; ?>" style="width: 80px;" alt="Foto Siswa">
                    
                    <p><strong>Scan Ijazah Depan:</strong></p>
                    <img src="fotosiswa/<?php echo $row['scanijazahdepan']; ?>" style="width: 80px;" alt="Scan Ijazah Depan">

                    <p><strong>Scan Ijazah Belakang:</strong></p>
                    <img src="fotosiswa/<?php echo $row['scanijazahbelakang']; ?>" style="width: 80px;" alt="Scan Ijazah Belakang">
                </div>
                <div class="card-footer">
                    <a href="edit_siswa.php?nisn=<?php echo $row['nisn']; ?>" class="btn btn-primary">Edit</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>





