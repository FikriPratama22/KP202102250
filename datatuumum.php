<?php
	include 'koneksi.php';

	$query = "SELECT * FROM tb_tu;";
	$sql = mysqli_query($conn, $query);
	$no = 0;

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
    <nav class="navbar bg-success">
		<div class="container-fluid">
		  <a class="navbar-brand text-light" href="#">
			<img src="img/iklas.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
			DATA TATA USAHA
		  </a>
		</div>
	  </nav>
    <!--Judul-->

    <div class="container">
      <h1 class="mt-4">DATA TATA USAHA</h1>
	  <a href="index.php" type="button" class="btn btn-success mb-3">Kembali</a>
      <figure>
        <blockquote class="blockquote">
          <p>TATA USAHA MTsN Mempawah Hilir</p>
        </blockquote>
        <figcaption class="blockquote-footer">KEMENAG <cite title="Source Title">Kabupaten Mempawah</cite></figcaption>
      </figure>
    
	  <div class="table-responsive">
		<table class="table align-middle table-bordered table-hover">
		<thead>
			<tr>
				<th><center>No.</center></th>
				<th>NIP</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th><center>Foto</center></th>
				<th>Tugas</th>
				
			</tr>
		</thead>
		<tbody>
			<?php
				while($result = mysqli_fetch_assoc($sql)){
			?>
			<tr>
				<td><center>
					<?php echo ++$no;  ?>
				</center></td>
				<td><?php echo $result['nip'];  ?></td>
				<td><?php echo $result['nama_tu'];  ?></td>
				<td><?php echo $result['jenis_kelamin'];  ?></td>
				<td><center><img src="img/<?php echo $result['foto_tu'];  ?>" style="width:80px;"></center></td>
				<td><?php echo $result['tugas'];  ?></td>
				
					
			</tr>
			<?php
				}
			?>
		</tbody>

		</div>
	  </div>
    </div>
  </body>
</html>
