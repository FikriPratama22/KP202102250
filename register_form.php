<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
    
   $email = mysqli_real_escape_string($conn, $_POST['usermail']);
   $pass = sha1($_POST['password']);
   $cpass = sha1($_POST['cpassword']);
   $level = ($_POST['level']);

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'user already exist';
   }else{
      if($pass != $cpass){
         $error[] = 'password not mathched!';
      }else{
         $insert = "INSERT INTO user_form(email, password, level) VALUES('$email','$pass', '$level')";
         mysqli_query($conn, $insert);
         header('location:login.php');
      }
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
<nav class="navbar fixed-top bg-success">
		<div class="container-fluid">
		  <a class="navbar-brand  text-light" href="#">
			<img src="img/iklas.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">Register
		  </a>
		</div>
	  </nav>
    
<div class="form-container mt-5">

   <form action="" method="post">
      <h3 class="title">Form Register</h3>
      <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            }
         }
      ?>
      <input type="email" name="usermail" placeholder="Masukkan email" class="box" required>
      <input type="password" name="password" placeholder="Masukkan Password" class="box" required>
      <input type="password" name="cpassword" placeholder="Konfirmasi Ulang Password" class="box" required>
      <input type="text" name="level" class="box "value="siswa" readonly>
      <input type="submit" value="register now" class="form-btn" name="submit">
      <p>sudah memiliki akun? <a href="login.php">login sekarang</a></p>
   </form>

</div>
<footer class="bg-success text-center pb-1 justify-content-center">
<p class="text-white">Created By <a href="https://www.instagram.com/fikri.pratama22/" class="text-white fw-bold"> 202102250 Fikri Pratama </a></p>
    </footer>
</body>
</html>