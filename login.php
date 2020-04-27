<?php
session_start();

if ( isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$userinfo = array(
                'admin'=>'admin',
                'kasir'=>'kasir'
                );


if(isset($_POST['username'])) {
    if (array_key_exists($_POST['username'],$userinfo)) {
        if($userinfo[$_POST['username']] == $_POST['password']) {
            $_SESSION['username'] = $_POST['username'];
            header('Location: index.php');
        }else{
          $_SESSION['error'] = "Password salah";
          header('Location: login.php');
          return;
      }

    }
    else{
        $_SESSION['error'] = "Username / Password salah";
        header('Location: login.php');
        return;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Penjualan ATK</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg" style="background-color: #2ea8ff; background-image: linear-gradient(#2ea8ff, #5f9dca);">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-5 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900">Login ~ Penjualan ATK</h1>
                    <p style = "color:red">&nbsp
                    <?php
                        if (isset($_SESSION["error"])) {
                            echo $_SESSION["error"];
                            unset($_SESSION["error"]);
                            //var_dump($_SESSION);
                        }
                    ?>
                    </p>
                  </div>
                  <form action="" class="user" method="POST">
                    <div class="form-group">
                      <input type="username" class="form-control form-control-user" name="username" aria-describedby="emailHelp" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-success btn-user btn-block">
                      Login
                    </button>
                  </form>
                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
