<?php
  include 'koneksi.php';

    $id_tu = '';
    $nip= '';
    $nama_tu = '';
    $jenis_kelamin ='' ;
    $foto_tu = '';
    $tugas =  '';

  if(isset($_GET['ubah'])){
    $id_tu = $_GET['ubah'];

    $query = "SELECT * FROM tb_tu WHERE id_tu = '$id_tu';";
    $sql = mysqli_query($conn, $query);
    $result= mysqli_fetch_assoc($sql);

    $nip= $result['nip'];
    $nama_tu = $result['nama_tu'];
    $jenis_kelamin = $result['jenis_kelamin'];
    $foto_tu = $result['foto_tu'];
    $tugas = $result['tugas'];
  }
?>


<html>
  <head>
    <meta charset="utf-8" />
    <!--Bootstrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap.bundle.min.js"></script>

    <title>MTsN Mempawah Hilir</title>
  </head>
  <body>
    <nav class="navbar bg-success mb-4">
      <div class="container-fluid">
        <a class="navbar-brand text-light " href="#">
          <img src="img/iklas.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top" />
          Data Tata Usaha
        </a>
      </div>
    </nav>
    <div class="container">

      <form method="POST" action="prosestu.php" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $id_guru;?>" name="id_guru">
      <div class="mb-3 row">
        <label for="nip" class="col-sm-2 col-form-label">NIP</label>
        <div class="col-sm-10">
          <input required type="text" name="nip" class="form-control" id="nip" placeholder="ex: 112233"  value="<?php echo $nip; ?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
          <input required type="text" name="nama_tu"  class="form-control" id="nama" placeholder="ex: Supratno Habibie" value="<?php echo $nama_tu; ?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
        <div class="col-sm-10">
          <select  required id="jenis_kelamin" name="jenis_kelamin" class="form-select" >
            <option <?php if($jenis_kelamin == 'Laki-Laki'){echo "selected";} ?> value="Laki-Laki">Laki-Laki</option>
            <option <?php if($jenis_kelamin == 'Perempuan'){echo "selected";} ?> value="Perempuan">Perempuan</option>
          </select>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="foto_tu" class="col-sm-2 col-form-label">Foto</label>
        <div class="col-sm-10">
          <input <?php if(!isset($_GET['ubah'])){echo "required";}  ?> class="form-control" type="file"  name="foto_tu" id="foto_tu" accept="img/">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tugas" class="col-sm-2 col-form-label">tugas</label>
        <div class="col-sm-10">
          <textarea required class="form-control" id="tugas" name="tugas" rows="3" ><?php echo $tugas; ?></textarea>
        </div>
      </div>
      <div class="mb-3 row mt-4">
        <div class="col">

          <?php
            if(isset($_GET['ubah'])){
          ?>
              <button type="submit"  name="aksi" value="edit" class="btn btn-primary">Simpan Perubahan</button> 
          <?php
            } else {
          ?>
          <button type="submit" name="aksi" value="add"  class="btn btn-primary">Tambahkan</button> 
          <?php
            } 
          ?>

          <a href="datatu.php" type="button" class="btn btn-danger">Batal</a>
        </div>
      </form>

      </div>
    </div>
  </body>
</html>
