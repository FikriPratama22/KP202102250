<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nisn = $_POST['nisn'];
    $nik = $_POST['nik'];
    $namalengkap = $_POST['namalengkap'];
    $email = $_POST['email'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $tempatlahir = $_POST['tempatlahir'];
    $tanggallahir = $_POST['tanggallahir'];
    $alamat = $_POST['alamat'];
    $agama = $_POST['agama'];
    $telepon = $_POST['telepon'];
    $ayahnik = $_POST['ayahnik'];
    $ayahnama = $_POST['ayahnama'];
    $ayahpendidikan = $_POST['ayahpendidikan'];
    $ayahpekerjaan = $_POST['ayahpekerjaan'];
    $ayahpenghasilan = $_POST['ayahpenghasilan'];
    $ayahtelepon = $_POST['ayahtelepon'];
    $ibunik = $_POST['ibunik'];
    $ibunama = $_POST['ibunama'];
    $ibupendidikan = $_POST['ibupendidikan'];
    $ibupekerjaan = $_POST['ibupekerjaan'];
    $ibupenghasilan = $_POST['ibupenghasilan'];
    $ibutelepon = $_POST['ibutelepon'];
    $walinik = $_POST['walinik'];
    $walinama = $_POST['walinama'];
    $walipekerjaan = $_POST['walipekerjaan'];
    $walitelepon = $_POST['walitelepon'];
    $sekolahnpsn = $_POST['sekolahnpsn'];
    $sekolahnama = $_POST['sekolahnama'];

    // Lakukan proses penyimpanan data yang diedit ke dalam database
    $query = "UPDATE tabel_siswa SET
              nik = '$nik',
              namalengkap = '$namalengkap',
              email = '$email',
              jeniskelamin = '$jeniskelamin',
              tempatlahir = '$tempatlahir',
              tanggallahir = '$tanggallahir',
              alamat = '$alamat',
              agama = '$agama',
              telepon = '$telepon',
              ayahnik = '$ayahnik',
              ayahnama = '$ayahnama',
              ayahpendidikan = '$ayahpendidikan',
              ayahpekerjaan = '$ayahpekerjaan',
              ayahpenghasilan = '$ayahpenghasilan',
              ayahtelepon = '$ayahtelepon',
              ibunik = '$ibunik',
              ibunama = '$ibunama',
              ibupendidikan = '$ibupendidikan',
              ibupekerjaan = '$ibupekerjaan',
              ibupenghasilan = '$ibupenghasilan',
              ibutelepon = '$ibutelepon',
              walinik = '$walinik',
              walinama = '$walinama',
              walipekerjaan = '$walipekerjaan',
              walitelepon = '$walitelepon',
              sekolahnpsn = '$sekolahnpsn',
              sekolahnama = '$sekolahnama'
              WHERE nisn = '$nisn'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        // Set pesan sukses dalam sesi
        $_SESSION['success_message'] = "Data siswa berhasil diperbarui.";

        // Redirect ke halaman lihat data setelah penyimpanan
        header("Location: lihatdata.php?nisn=$nisn");
        exit();
    } else {
        $errorMessage = "Terjadi kesalahan saat menyimpan data: " . mysqli_error($conn);
    }
}
?>
