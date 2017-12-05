<?php 

error_reporting(0);
include 'config.php';

if(!isset($_SESSION['username'] )== 0) { /* Halaman ini tidak dapat diakses jika belum ada yang login */
	header('Location: home.php'); 
}
$nama            = $_POST['nama'];
$username 		 = $_POST['username'];
$email 			 = $_POST['email'];
$password 		 = md5($_POST['password']."ALS52KAO09");
$confirmPassword = md5($_POST['confirmPassword']."ALS52KAO09");

if(isset($username, $email, $password, $confirmPassword)) { 
	if(strstr($email, "@")) {
		if($password == $confirmPassword) {
			try {
				$sql = "SELECT * FROM user WHERE username = :username OR email = :email";
				$stmt = $conn->prepare($sql);
				$stmt->bindParam(':username', $username);
				$stmt->bindParam(':email', $email);
				$stmt->execute();
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}

			$count = $stmt->rowCount();
			if($count == 0) {
				try {
					$sql = "INSERT INTO user SET nama = :nama, username = :username, email = :email, password = :password";
					$stmt = $conn->prepare($sql);
					$stmt->bindParam(':nama', $nama);
					$stmt->bindParam(':username', $username);
					$stmt->bindParam(':email', $email);
					$stmt->bindParam(':password', $password);
					$stmt->execute();
				}
				catch(PDOException $e) {
					echo $e->getMessage();
				}
				if($stmt) {
					echo "<div class='alert alert-success fade in'>Selamat Anda berhasil Register, anda dapat Login</div>";
				}
			}else{
				echo "<div class='alert alert-warning fade in'>Username dan Email sudah pernah digunakan";
			}
		}else{
			echo "<div class='alert alert-danger fade in'>Password tidak sama";
		}
	}else{
		echo "<div class='alert alert-success fade in'>Email Tidak Valid</div>";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIGN UP</title>

  <!-- Bootstrap -->
    <link href="css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="css/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>
    <div>
      <div class="login_wrapper">
          <section class="login_content">
             <form  action="" autocomplete="on" method="post">
              <h1 style="color:#FFFFFF">SIGN UP</h1>
              <div>
                <input class="form-control" id="nama" name="nama" required="required" type="text" placeholder="Nama" />
              </div>
              <div>
                <input class="form-control" id="username" name="username" required="required" type="text" placeholder="Username"/>
              </div>
              <div>
                <input class="form-control" id="email" name="email" required="required" type="email" placeholder="Email" />
              </div>
              <div>
                <input class="form-control" id="password" name="password" required="required" type="password" placeholder="Password"/>
              </div>
             <div>
                <input class="form-control" id="confirmPassword" name="confirmPassword" required="required" type="password" placeholder="Confirm Password" /></br>
            </div>
              <div> 
                <input class="btn btn-danger" type="submit" name="register" value="SIGN UP"/>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link" style="color:#FFFFFF">Sudah Mempunyai Akun ?
                <a href="index.php" class="btn btn-primary" style="color:#FFFFFF; margin-left: 20px">Login</a>
                </p>

                <div class="clearfix"></div>
                <br /> 
				
              </div>
            </form>
          </section>
        </div>
        </div>