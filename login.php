<?php

@include 'config.php';

if (session_status() == PHP_SESSION_NONE) {
   session_start();
}

if(isset($_POST['submit'])){
    
   $email = mysqli_real_escape_string($conn, $_POST['usermail']);
   $pass = sha1($_POST['password']);

   $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      $_SESSION['usermail'] = $email;
      
      // Check user's level
      if ($row['level'] === 'admin') {
         header('location: halamanadmin.php');
      } else if ($row['level'] === 'siswa') {
         header('location:halamansiswa.php');
      } else {
         // Handle other levels or set a default behavior
         header('location:halamansiswa.php');
      }
   } else {
      $error[] = 'Password Salah!';
   }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css2/style.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
<!-- <nav class="navbar fixed-top bg-success">
		<div class="container-fluid">
		  <a class="navbar-brand  text-light" href="#">
			<img src="img/iklas.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">Login
		  </a>
		</div>
	  </nav> -->
    
<div class="form-container">

    <form action="" method="post">
        <h3 class="title">LOGIN</h3>
        <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            }
         }
      ?>
        <input type="email" name=" usermail" placeholder="Masukan Email" class="box" required>
        <input type="password" name="password" placeholder="Masukan Password" class="box" required>
        <input type="submit" value="login now" class="form-btn" name="submit">
        <a href="index.php" type="button"  class="form-btn" name="button">Kembali Ke Menu Awal</a>
        <p>Belum Memiliki Akun? <a href="register_form.php">Daftar Sekarang</a></p>
    </form>

</div>
<footer class="bg-success text-center pb-1 justify-content-center">
<p class="text-white">Created By <a href="https://www.instagram.com/fikri.pratama22/" class="text-white fw-bold"> 202102250 Fikri Pratama </a></p>
    </footer>
</body>
</html>