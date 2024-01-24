<?php
    include 'koneksi.php';

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){

            

            $nip = $_POST['nip'];
            $nama_tu = $_POST['nama_tu'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $foto_tu = $_FILES['foto_tu']['name'];
            $tugas = $_POST['tugas'];

            $dir = "img/";
            $tmpFile = $_FILES['foto_tu']['tmp_name'];

            move_uploaded_file( $tmpFile, $dir.$foto_tu);

            $query = "INSERT INTO tb_tu VALUES(null,'$nip','$nama_tu','$jenis_kelamin','$foto_tu','$tugas')";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: datatu.php");
                //echo "Data Berhasil DItambahkan <a href='index.php'>[Home]</a> ";
            } else {
                echo $query;
            }
            //echo "Tambah Data <a href='index.php'>[Home]</a>";
        } else if ($_POST['aksi'] == "edit") {
            $id_tu = $_POST['id_tu'];
            $nip = $_POST['nip'];
            $nama_tu = $_POST['nama_tu'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $tugas = $_POST['tugas'];
        
            // Ambil data foto lama
            $queryShow = "SELECT * FROM tb_tu WHERE id_tu = '$id_tu';";
            $sqlShow = mysqli_query($conn, $queryShow);
            $result = mysqli_fetch_assoc($sqlShow);
            $foto_tu = $result['foto_tu'];
        
            if (!empty($_FILES['foto_tu']['name'])) {
                // Hapus foto lama jika ada
                if (!empty($foto_tu) && file_exists("img/" . $foto_tu)) {
                    unlink("img/" . $foto_tu);
                }
        
                // Pindahkan foto baru
                $foto_tu = $_FILES['foto_tu']['name'];
                move_uploaded_file($_FILES['foto_tu']['tmp_name'], 'img/' . $_FILES['foto_tu']['name']);
            } else {
                $foto_tu = $foto_tu;
            }
        
            // Gunakan Prepared Statements
            $query = "UPDATE tb_tu SET nip=?, nama_tu=?, jenis_kelamin=?, tugas=?, foto_tu=? WHERE id_tu=?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "sssssi", $nip, $nama_tu, $jenis_kelamin, $tugas, $foto_tu, $id_tu);
            
            if (mysqli_stmt_execute($stmt)) {
                header("location: datatu.php");
            } else {
                echo "Error: " . mysqli_error($conn); // Tampilkan pesan kesalahan
            }
        
            mysqli_stmt_close($stmt);
        }
        
}

if(isset($_GET['hapus'])){
    $id_tu = $_GET['hapus'];

    $queryShow = "SELECT * FROM tb_tu WHERE id_tu = '$id_tu';";
    $sqlShow = mysqli_query($conn, $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    unlink("img/".$result['foto_tu']);

    $query ="DELETE FROM tb_tu WHERE id_tu = '$id_tu';";
    $sql = mysqli_query($conn, $query);

    if($sql){
        header("location: datatu.php");
    } else {
        echo $query;
    }
   // echo "Hapus Data <a href='index.php'>[Home]</a>";
}
?>