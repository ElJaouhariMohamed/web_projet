<!DOCTYPE HTML>
<html>
	<head>
		<title>Etudiants de l'école</title>
		<link rel="stylesheet" href="./style.css">
		<link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
	</head>
	<body >
		<main>
		<?php
		require "header.php";
		if(isset($_GET['msg'])){
					echo "<div class='msgaff' style='display:inline;color:green;border:1px solid green;'>".$_GET['msg']."</div>";
			}
			
				if(isset($_GET['error']))
					echo "<div class='erroraff' style='display:inline;color:red;border:1px solid red;'>".$_GET['error']."</div>";
		?>
		
			<h1> Bienvenue <?php echo $_SESSION['cnom'] ;?>,</h1>
			<p>L'équipe Studspace souhaite que vous êtes en bonne santé ! </p>
		</main>
	</body>
</html>