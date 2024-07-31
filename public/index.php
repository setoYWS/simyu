
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Homepage SIMYU</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">SIMYU</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.html">Home</a>
            </li>
           
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <h2><strong>SISTEM MANAGEMENT WAREHOUSE <br> PEMOTONG KAYU</strong></h2>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
					<div class="container">
<form role="form" method = "post">

<div class="form-group">
	<label for="email">Username:</label>
	<input type="text" class="form-control" id="email" name="username" required>
</div>
<div class="form-group">
	<label for="pwd">Password:</label>
	<input type="password" class="form-control" id="pwd"  name="password" required>
</div>

		
 <div class="radio">
		 <label><input type="radio" name="manajer"> Manajer</label><br>
		 <label><input type="radio" name="petugas"> Petugas Gudang</label>
 </div>

<center><button type="submit" class="btn btn-primary" name="login">Login</button></center>

 <?php
 	if(isset($_POST['login'])){
	 	include 'config/database.php';
	 	include_once 'objects/pegawai.php';
	 	include_once 'objects/manajer.php';

	 	$database = new Database();	
		$db = $database->getConnection();
	 	$user = $_POST['username'];
	 	$password = $_POST['password'];



	 	if(isset($_POST['manajer'])){
	 		$pemakai = new Manajer($db);
	 	}
	 	else if(isset($_POST['petugas'])){
	 		$pemakai = new Pegawai($db);
	 	}

	 	if($pemakai->login($user,$password)){
	 		if(!isset($_SESSION)) 
   			 { 
  			      session_start(); 
		    }
	 		$_SESSION['admin_username']=$user;
	 		$_SESSION['admin_password']=$password;
	 		/*session_start();
	 		$_SESSION['admin_username']=$user;
	 		$_SESSION['admin_password']=$password;*/
	 		if(isset($_POST['manajer'])){
	 			$_SESSION['admin_manajer']=1;
	 			header("location:view-pembelianbarang.php");
	 		}
	 		else if(isset($_POST['petugas'])){
	 			$_SESSION['admin_pegawai']=1;
	 			header("location:view-penjualanbarang.php");
	 		}
	 	}else{
	 		 echo '<div class="alert alert-danger alert-dismissable">';
          		echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
         		  echo 'Username Atau Password Salah.';
      		 echo '</div>';
	 	}
	 } 
	
 	?>


</form>
</div>
					
          </div>
        </div>
      </div>
		</header>
		<section class="bg-dark text-white">
      <div class="container text-center">
	
	
	<center><h3>2019 Copyright SIMYU Coorporation</h3></center>
      </div>
    </section>
  


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>

  </body>

</html>