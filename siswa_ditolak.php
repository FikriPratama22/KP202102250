<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nisn = $_POST['nisn'];
    $nik = $_POST['nik'];
    $namalengkap = $_POST['namalengkap'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    // Lakukan proses penyimpanan data ke tabel siswa_ditolak
    $insertQuery = "INSERT INTO siswa_ditolak (nisn, nik, namalengkap, email, telepon) VALUES ('$nisn','$nik', '$namalengkap', '$email', '$telepon')";
    $insertResult = mysqli_query($conn, $insertQuery);

    if ($insertResult) {
        echo 'success';
    } else {
        echo 'error';
    }
}
?>
