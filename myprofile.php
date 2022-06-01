<!DOCTYPE HTML>
<html>
	<head>
		<title> Mon profile </title>
		<link rel="stylesheet" href="./style.css">
		<link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
	</head>
	<body>
		<?php
		require "header.php";
		$id=$_SESSION['cid'];
		$dns ="mysql:host=localhost;dbname=étudiantsbd";
		$user="root";
		$pass = "pass";
		$con = new PDO($dns,$user,$pass);
		$req = "SELECT * FROM etudiant WHERE `ID` = ".(int)$id.";";
		$res = $con->query($req);
		while($u = $res->fetch(PDO::FETCH_OBJ)){
			$ddn =$u->ddn;
			$add = $u->address;
			$tel = $u->tel;
			$email = $u->email;
		}
		?>
		<main>
			<div class='container'>
				<div class='row'>
					<div class='col'>
						<a><img src="./photos/<?php echo $_SESSION['photo'];?>" alt='Pas de photo de profile' class='profilephoto rounded-3'/></a>
					</div>
					<div class='col'>
						<h1><?php echo $_SESSION['cnom'] ; ?></h1>
						<h4>Contacte :</h4>
							<h5>N° de téléphone : <?php echo $tel; ?></h5>
							<h5>Email : <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></h5>
					</div>
				</div>
					<div class='row'>
						<div class='col'>
							<a href='./modifier_compte.php?id=<?php echo $_SESSION['cid'];?>'><button class='btn btn-info'>Modifier ses informations</button></a>
						</div>
						<div class='col'>
							<h4>Date de naissance : <?php echo $ddn;?></h4>
							<h4>Address : <?php echo $add;?></h4>
						</div>
					</div>
			<p> </p>

		</div>
		</main>
	</body>
</html>