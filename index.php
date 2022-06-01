<!DOCTYPE HTML>
<html>
<head>
		<title>Bienvenue à Studspace</title>
		<link rel="stylesheet" href="./style.css">
		<link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
	</head>
	<body >
		<section class="vh-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">

        <div class="px-5 ms-l-4">
          <img src='./assets/slogonbig.png' class='slogonbiglog' alt='Studspace'></a>
        </div>

        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 ">
          
          <form method="post" action="login.php">

            

            <div class="form-outline mb-4">
            	<label class="form-label" >Login</label>
              <input type="text"  name="ulog" class="form-control form-control-lg" maxlength="30" required/>
              
            </div>

            <div class="form-outline mb-4">
            	<label class="form-label" >Mot de passe</label>
              <input type="password" name="upass" class="form-control form-control-lg" maxlength="20" required/>
              
            </div>


            <div class="pt-1 mb-4">
              <input type="submit" value="Login" class="btn btn-success"/>
            </div>
            </form>

            <!-- gestion d'erreurs de connexion à la base de donnée-->
            
            <?php
            	if(isset($_GET['error'])){
            		echo "<script>alert('".$_GET['error']."')</script>";
            	}
            ?>
            
          

        </div>

      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="./assets/icon.png"
          alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>
	</body>
</html>