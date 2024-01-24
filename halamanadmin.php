<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css" />

    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Halaman Admin</title>
</head>
<body>
<nav class="navbar fixed-top bg-success">
		<div class="container-fluid">
		  <a class="navbar-brand  text-light" href="halamanadmin.php">
			<img src="img/iklas.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
			ADMIN PAGES
		  </a>
		</div>
	  </nav>

      <section class="jumbotron text-center">
      <img src="img/iklas.png" alt="ikhlas beramal" width="200" />
      <h1 class="display-4">SELAMAT DATANG ADMIN </h1>
      <p class="lead">HALAMAN ADMIN MTsN MEMPAWAH HILIR</p><br>

      <a class="btn btn-success" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"> Log Out </a>

      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasExampleLabel">Log Out</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <div class="dropdown mt-3">
            <a href="index.php"><button class="btn btn-secondary" type="button" >LOG OUT</button></a>
            </div>
        </div>
      </div>
      
  
      </section>

      <section>
      <div class="container">
        <div class="row text-center mb-3">
          <div class="col" >
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 mb-3">
            <div class="card" >
              <img src="img/kartunguru.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">Data Guru</h5>
                <p class="card-text">Berisi Data-Data Guru yang Telah tedaftar pada database sekolah</p>
                <a href="dataguru.php" class="btn btn-success" data-aos="zoom-in">Atur Sebagai Admin</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card" >
              <img src="img/pnskartun.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">Data Tata Usaha</h5>
                <p class="card-text">Berisi Data-Data Staf TU yang Telah tedaftar pada database sekolah</p>
                <a href="datatu.php" class="btn btn-success" data-aos="zoom-in">Atur Sebagai Admin</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card" >
              <img src="img/kegiatan.png" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">Data Pendaftaran Siswa Baru</h5>
                <p class="card-text">Berisi Data-Data calon siswa yang Telah tedaftar pada database sekolah</p>
                <a href="tabelsiswa.php" class="btn btn-success" data-aos="zoom-in">Atur Sebagai Admin</a>
              </div>
            </div>
          </div>
          </section>
    

    

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path
        fill="#e2edff"
        fill-opacity="1"
        d="M0,96L48,112C96,128,192,160,288,154.7C384,149,480,107,576,80C672,53,768,43,864,69.3C960,96,1056,160,1152,160C1248,160,1344,96,1392,64L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
      ></path>
    </svg>

    <footer class="bg-success text-center pb-1 justify-content-center">
    <p class="text-white">Created By <a href="https://www.instagram.com/fikri.pratama22/" class="text-white fw-bold"> 202102250 Fikri Pratama </a></p>
    </footer>

    
</body>
</html>