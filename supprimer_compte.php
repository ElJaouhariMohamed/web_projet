<?php

	$dns ="mysql:host=localhost;dbname=étudiantsbd";
	$user="root";
	$pass = "pass";


	$id=$_GET["id"];

	try{
		$con = new PDO($dns,$user,$pass);

		//recupération du login de l'utilisateur (à utiliser après)
		$req = "SELECT * FROM etudiant WHERE `ID` = ".(int)$id.";";
		$res = $con->query($req);
		while($u = $res->fetch(PDO::FETCH_OBJ))
		{$log = $u->login;
		$photo = $u->photos;
		$cv = $u->cv;

		$req = "DELETE FROM `etudiant` WHERE `etudiant`.`ID` = ".(int)$id.";";
		$con->exec($req);

		// suppression des fichiers associés :
		$imgs = dirname(__FILE__)."/photos";
		$cvs = dirname(__FILE__)."/cvs";

		unlink($imgs."/".$photo);
		unlink($cvs."/".$cv);
		}


		header("Location:./comptes.php?msg=L'Utilisateur d'id = $id est supprimé avec succes");

	}catch(PDOException $exp){
			header("Location:./comptes.php?error=Suppression echoué");
		
		}
?>