<?php 
//error_reporting(0);
include 'config.php';

if(!isset($_SESSION['username'])== 0) {
  header('Location: index.php');
}

if(isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']."ALS52KAO09");

  try {
    $sql = "SELECT * FROM user WHERE username = :username AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $count = $stmt->rowCount();
    if($count == 1) {
      $_SESSION['username'] = $username;
      header("Location:form_pendaftar.php");
      return;
    }else{
      echo "<div class='alert alert-warning fade in'>Username Atau Password Salah!</div>";
    }
  }
  catch(PDOException $e) {
    echo $e->getMessage();
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

    <title>LOGIN</title>

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
        <div class="animate form login_form">
          <section class="login_content">
             <form action="" autocomplete="on" method="post"> 
              <h1 style="color:#FFFFFF">LOGIN</h1>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <select class="form-control">
                  <option value="ADMIN">ADMIN</option>
                  <option value="STAFF">STAFF</option>
                  <option value="SANTRI">SANTRI</option>
                </select>
              </div>
              <div>
                <input class="btn btn-danger" type="submit" name="login" value="Login" style="margin-left:20px; margin-top: 20px;" href="datastaff.php"/>
              </div>
              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link" style="color:#FFFFFF">Belum mempunyai akun?
                <a href="staff.php" class="btn btn-primary" style="color:#FFFFFF">SIGN UP</a>
                </p>

                <div class="clearfix"></div>
                <br />
              </div>
            </form>
          </section>
        </div>
        </div>
    </div>
  </body>
</html>