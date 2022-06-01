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
		<h4 align="center">All Articles :</h4>
			
		<?php
			$cid = $_SESSION['cid'];	
				if(isset($_GET['msg'])){
					echo "<div class='msgaff' style='display:inline;color:green;border:1px solid green;'>".$_GET['msg']."</div>";
			}
			
				if(isset($_GET['error']))
					echo "<div class='erroraff' style='display:inline;color:red;border:1px solid red;'>".$_GET['error']."</div>";
			
		echo "<table class='table table-bordered table-hover' width='100%'><thead><td>Article Code</td><td>Title</td><td>Owner ID</td><td>Request Date </td><td>Publishing Date</td><td>Article Content</td><td>Article Image</td><td>Article Statue</td><td>Actions</td></thead>";
		
		//db connection : 

		$dns = "mysql:host=localhost;dbname=étudiantsbd";
		$user="root";
		$pass = "pass";

		try{
		$con = new PDO($dns,$user,$pass);
		$req = "SELECT * FROM articles ;";
		$res= $con->query($req);
		
		while($u = $res->fetch(PDO::FETCH_OBJ)){
			if($u->IMG!='aucune' ){
			echo "<tr><td>".$u->Id_Article."</td><td>$u->Titre</td><td>$u->Id_writer</td><td>$u->TEMPAJ</td><td>".$u->TEMPV."</td><td>".$u->Text."</td><td><a href='./article/$u->IMG'>$u->IMG</a></td><td>$u->valid</td><td><p><a href='./afficher_article.php?id=".$u->Id_Article."'>Afficher</a> - <a href='./modifier_article.php?id=".$u->Id_Article."'>Modifier</a> - <a href='./supprimer_article.php?id=".$u->Id_Article."'>Supprimer</a> - <a href='./valider_article.php?id=".$u->Id_Article."'>Valider</a></p></td></tr>";
		}
		if($u->IMG=='aucune' ){
			echo "<tr><td>".$u->Id_Article."</td><td>$u->Titre</td><td>$u->Id_writer</td><td>$u->TEMPAJ</td><td>".$u->TEMPV."</td><td>".$u->Text."</td><td>$u->IMG</td><td>$u->valid</td><td><p><a href='./afficher_article.php?id=".$u->Id_Article."'>Afficher</a> - <a href='./modifier_article.php?id=".$u->Id_Article."'>Modifier</a> - <a href='./supprimer_article.php?id=".$u->Id_Article."'>Supprimer</a> - <a href='./valider_article.php?id=".$u->Id_Article."'>Valider</a></p></td></tr>";
		}

		}
		}
		catch(PDOException $exp){
			header("Location:./comptes.php?error=Connexion echoué");
		}
		?>
		</main>
	</body>

</html>