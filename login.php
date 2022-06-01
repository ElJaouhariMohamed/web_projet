<?php

	

	$login = (String)$_POST['ulog'];
	$passwrd = $_POST['upass'];

	//check si dans la bd : 
	$dns = "mysql:host=localhost;dbname=étudiantsbd";
	$user="root";
	$pass = "pass";

	try{
		$con = new PDO($dns,$user,$pass);
		$req = "SELECT * FROM etudiant;";
		$res= $con->query($req);

		

		while($u = $res->fetch(PDO::FETCH_OBJ)){
			if (!strcmp($passwrd,$u->password)) {
    	echo 'Password is valid!';
		} else {
    	echo 'Invalid password.';
		}
			if(strcmp($login,(String)$u->login)==0 && !strcmp($passwrd,$u->password)){
				session_start();

				$_SESSION["clogin"]=$login;
				$_SESSION["cid"]=$u->ID;
				$_SESSION["cnom"]=$u->name;
				$_SESSION["photo"]=$u->photos;
				$_SESSION["cv"]=$u->cv;
				$signed=1;
				$_SESSION["utype"]=2;
				if(strcmp($login,"loginfo")){
				$_SESSION["utype"]=1;}
				header("Location:./home.php");
			}
			if(strcmp($login,(String)$u->login)==0 && strcmp($passwrd,$u->password)!=0){

				header("Location:./index.php?error=Mauvais mot de passe");
			}
			
			if(!(strcmp($login,(String)$u->login)==0) && !strcmp($passwrd,$u->password)){
				header("Location:./index.php?error=Mauvais Login");
			}
		}
			if(!isset($signed)){
			header("Location:./index.php?error=Vous (".$login.",".$passwrd.") êtes pas enregistrés sur le site");}
			
	}catch(PDOException $exp){
			header("Location:./index.php?error=Connexion echoué");
		}


?>