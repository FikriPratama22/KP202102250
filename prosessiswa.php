<?php
    include 'koneksi.php';

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){

            

            $nisn = $_POST['nisn'];
            $nama_siswa = $_POST['nama_siswa'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $foto = $_FILES['foto']['name'];
            $alamat = $_POST['alamat'];

            $dir = "img/";
            $tmpFile = $_FILES['foto']['tmp_name'];

            move_uploaded_file( $tmpFile, $dir.$foto);

            $query = "INSERT INTO tb_siswa VALUES(null,'$nisn','$nama_siswa','$jenis_kelamin','$foto','$alamat')";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: berhasiltambah.php");
                //echo "Data Berhasil DItambahkan <a href='index.php'>[Home]</a> ";
            } else {
                echo $query;
            }
            //echo "Tambah Data <a href='index.php'>[Home]</a>";
        } else if($_POST['aksi'] == "edit"){
           
            $id_siswa = $_POST['id_siswa'];
            $nisn = $_POST['nisn'];
            $nama_siswa = $_POST['nama_siswa'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $alamat = $_POST['alamat'];

            $queryShow = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa';";
            $sqlShow = mysqli_query($conn, $queryShow);
            $result = mysqli_fetch_assoc($sqlShow);

            if($_FILES['foto']['name'] == ""){
            }else{
                $foto = $_FILES['foto']['name'];
                unlink("img/".$result['foto_siswa']);
                move_uploaded_file($_FILES['foto']['tmp_name'], 'img/'.$_FILES['foto']['name']);
            }

            $query ="UPDATE tb_siswa SET nisn='$nisn', nama_siswa='$nama_siswa', jenis_kelamin='$jenis_kelamin', alamat='$alamat', foto_siswa = '$foto' WHERE id_siswa='$id_siswa';";
            $sql = mysqli_query($conn, $query);
            header("location: tabelsiswa.php");
    }
}

if(isset($_GET['hapus'])){
    $nisn = $_GET['hapus'];

    $queryShow = "SELECT * FROM tabel_siswa WHERE nisn = '$nisn';";
    $sqlShow = mysqli_query($conn, $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    unlink("fotosiswa/".$result['foto']);

    $query ="DELETE FROM tabel_siswa WHERE nisn= '$nisn';";
    $sql = mysqli_query($conn, $query);

    if($sql){
        header("location: tabelsiswa.php");
    } else {
        echo $query;
    }
   // echo "Hapus Data <a href='index.php'>[Home]</a>";
}
?>