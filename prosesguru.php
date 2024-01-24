<?php
    include 'koneksi.php';

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){

            

            $nip = $_POST['nip'];
            $nama_guru = $_POST['nama_guru'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $foto = $_FILES['foto']['name'];
            $pelajaran = $_POST['pelajaran'];

            $dir = "img/";
            $tmpFile = $_FILES['foto']['tmp_name'];

            move_uploaded_file( $tmpFile, $dir.$foto);

            $query = "INSERT INTO tb_guru VALUES(null,'$nip','$nama_guru','$jenis_kelamin','$foto','$pelajaran')";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: dataguru.php");
                //echo "Data Berhasil DItambahkan <a href='index.php'>[Home]</a> ";
            } else {
                echo $query;
            }
            //echo "Tambah Data <a href='index.php'>[Home]</a>";
        } else if($_POST['aksi'] == "edit"){
           
            $id_guru = $_POST['id_guru'];
            $nip = $_POST['nip'];
            $nama_guru = $_POST['nama_guru'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $pelajaran = $_POST['pelajaran'];

            $queryShow = "SELECT * FROM tb_guru WHERE id_guru = '$id_guru';";
            $sqlShow = mysqli_query($conn, $queryShow);
            $result = mysqli_fetch_assoc($sqlShow);

            if($_FILES['foto']['name'] == ""){
            }else{
                $foto = $_FILES['foto']['name'];
                unlink("img/".$result['foto_guru']);
                move_uploaded_file($_FILES['foto']['tmp_name'], 'img/'.$_FILES['foto']['name']);
            }

            $query ="UPDATE tb_guru SET nip='$nip', nama_guru='$nama_guru', jenis_kelamin='$jenis_kelamin', pelajaran='$pelajaran', foto_guru = '$foto' WHERE id_guru='$id_guru';";
            $sql = mysqli_query($conn, $query);
            header("location: dataguru.php");
    }
}

if(isset($_GET['hapus'])){
    $id_guru = $_GET['hapus'];

    $queryShow = "SELECT * FROM tb_guru WHERE id_guru = '$id_guru';";
    $sqlShow = mysqli_query($conn, $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    unlink("img/".$result['foto_guru']);

    $query ="DELETE FROM tb_guru WHERE id_guru = '$id_guru';";
    $sql = mysqli_query($conn, $query);

    if($sql){
        header("location: dataguru.php");
    } else {
        echo $query;
    }
   // echo "Hapus Data <a href='index.php'>[Home]</a>";
}
?>