<!DOCTYPE HTML>
<html>
	<head>
		<title>Etudiants</title>
		<link rel="stylesheet" href="./style.css">
		<link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
	</head>
	<body>
		<?php
		require "header.php";
		?>
		<main>
		<h4 align="center">Liste des comptes étudiants</h4>
			
			<?php
				
				if(isset($_GET['msg'])){
					echo "<div class='msgaff' style='display:inline;color:green;border:1px solid green;'>".$_GET['msg']."</div>";
			}
			
				if(isset($_GET['error']))
					echo "<div class='erroraff' style='display:inline;color:red;border:1px solid red;'>".$_GET['error']."</div>";
			
		echo "<table class='table table-bordered table-hover' width='100%'><thead><td>ID</td><td>NAME</td><td>LOGIN</td><td>email</td><td>photos</td><td>CV</td><td>adresse</td><td>tel</td><td>ACTIONS</td></thead>";
		
		//db connection : 

		$dns = "mysql:host=localhost;dbname=étudiantsbd";
		$user="root";
		$pass = "pass";

		try{
		$con = new PDO($dns,$user,$pass);
		$req = "SELECT * FROM etudiant";
		$res= $con->query($req);
		
		while($u = $res->fetch(PDO::FETCH_OBJ)){
			if($u->photos!='aucune' && $u->cv!='aucun' ){
			echo "<tr><td>".$u->ID."</td><td>$u->name</td><td>$u->login</td><td>$u->email</td><td><a href='./photos/$u->photos'>$u->photos</a></td><td><a href='./cvs/$u->cv'>$u->cv</a></td><td>".$u->address."</td><td>".$u->tel."</td><td><p><a href='./modifier_compte.php?id=".$u->ID."'>Modifier</a> - <a href='./supprimer_compte.php?id=".$u->ID."'>Supprimer</a></p></td></tr>";
		}
		if($u->photos=='aucune' && $u->cv!='aucun' ){
			echo "<tr><td>".$u->ID."</td><td>$u->name</td><td>$u->login</td><td>$u->email</td><td>$u->photos</td><td><a href='./cvs/$u->cv'>$u->cv</a></td><td>".$u->address."</td><td>".$u->tel."</td><td><p><a href='./modifier_compte.php?id=".$u->ID."'>Modifier</a> - <a href='./supprimer_compte.php?id=".$u->ID."'>Supprimer</a></p></td></tr>";
		}
		if($u->photos!='aucune' && $u->cv=='aucun' ){
			echo "<tr><td>".$u->ID."</td><td>$u->name</td><td>$u->login</td><td>$u->email</td><td><a href='./photos/$u->photos'>$u->photos</a></td><td>$u->cv</td><td>".$u->address."</td><td>".$u->tel."</td><td><p><a href='./modifier_compte.php?id=".$u->ID."'>Modifier</a> - <a href='./supprimer_compte.php?id=".$u->ID."'>Supprimer</a></p></td></tr>";
		}
		if($u->photos=='aucune' && $u->cv=='aucun' ){
			echo "<tr><td>".$u->ID."</td><td>$u->name</td><td>$u->login</td><td>$u->email</td><td>$u->photos</td><td>$u->cv</td><td>".$u->address."</td><td>".$u->tel."</td><td><p><a href='./modifier_compte.php?id=".$u->ID."'>Modifier</a> - <a href='./supprimer_compte.php?id=".$u->ID."'>Supprimer</a></p></td></tr>";
		}
		}
		echo '</table><a href="ajouter_compte.php"><button class="btn btn-success">+ Ajouter un nouvel étudiant</button></a>';
		}
		catch(PDOException $exp){
			header("Location:./comptes.php?error=Connexion echoué");
		}
		?>
		</main>
	</body>

</html>