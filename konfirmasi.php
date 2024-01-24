<?php
include 'koneksi.php';

if(isset($_GET['nisn']) && isset($_GET['status'])) {
    $nisn = $_GET['nisn'];
    $status = $_GET['status'];

    // Lakukan perubahan status di database
    $updateQuery = "UPDATE tabel_siswa SET status = '$status' WHERE nisn = '$nisn'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if($updateResult) {
        if($status === 'Diterima') {
            echo "Siswa dengan NISN $nisn telah diterima.";
            // Lakukan redirect ke halaman tabel siswa
            header("Location: tabelsiswa.php");
            exit; // Penting untuk menghentikan eksekusi skrip setelah redirect
        } elseif($status === 'Ditolak') {
            echo "Siswa dengan NISN $nisn telah ditolak.";
            // Lakukan redirect ke halaman tabel siswa
            header("Location: tabelsiswa.php");
            exit; // Penting untuk menghentikan eksekusi skrip setelah redirect
        } else {
            echo "Status tidak valid.";
        }
    } else {
        echo "Gagal melakukan perubahan status.";
    }
}    
?>
