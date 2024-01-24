<?php
session_start();
include 'koneksi.php';

if (isset($_GET['nisn'])) {
    $nisn = $_GET['nisn'];

    // Lakukan proses penghapusan data siswa dari database
    $deleteQuery = "DELETE FROM tabel_siswa WHERE nisn = '$nisn'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        // Set pesan sukses dalam sesi
        $_SESSION['success_message'] = "Data siswa berhasil dihapus.";

        // Redirect ke halaman tabel siswa setelah penghapusan
        header("Location: tabelsiswa.php");
        exit();
    } else {
        $errorMessage = "Terjadi kesalahan saat menghapus data: " . mysqli_error($conn);
    }
}