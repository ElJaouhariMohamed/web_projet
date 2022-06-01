<?php
		
		$dns ="mysql:host=localhost;dbname=étudiantsbd";
		$user="root";
		$pass = "pass";

		try{
			$con = new PDO($dns,$user,$pass);

			$nom = $_POST['nom'];
			$log = $_POST['login'];
			$pwd = ($_POST['pass']);
			$cpwd = $_POST['cpass'];
			$ddn= $_POST['ddns'];
			$email = $_POST['email'];
			$photos="aucune";
			$cv="aucun";
			$adr = $_POST['adr'];
			$tel = $_POST['tel'];//idée : vérifier qu'il s'agit vraiment d'un numéro de téléphone (9 chiffres + le signe '+' et le code du pays)

		if($pwd==$cpwd){
			
			$imgs = dirname(__FILE__)."/photos";
			$cvs = dirname(__FILE__)."/cvs";

			$imgs = dirname(__FILE__)."/photos";
				if(file_exists($_FILES['photo']['tmp_name'])&&is_uploaded_file($_FILES['photo']['tmp_name'])){
				$random = rand();
				$photos = $_FILES['photo']['name'];
				$photos = str_replace(" ","",trim($log."photo_".$random.explode(".",$photos)[1]));//new name form : login+photo+extention of the original file (to avoid problems registring long file names in db)
			
				if(!file_exists($imgs)):
					mkdir($imgs);
				endif;
			
				move_uploaded_file($_FILES['photo']['tmp_name'],$imgs."/".$photos);
			}
			if(file_exists($_FILES['cv']['tmp_name'])&&is_uploaded_file($_FILES['cv']['tmp_name'])){
					$cv= $_FILES['cv']['name'];
					$cv = str_replace(" ","",trim($log."cv.".explode(".",$cv)[1]));//new name form : login+cv+extention of the original file (to avoid problems registring long file names in db)

					if(!file_exists($cvs)):
						mkdir($cvs);
					endif;
					move_uploaded_file($_FILES['cv']['tmp_name'],$cvs."/".$cv);
				}

			
				//idée : sotre the hashcode of the password (more security to accounts)
			$pwd = $pwd;

			$req = "INSERT INTO etudiant (name,login,password,email,photos,cv,address,ddn,tel) VALUES ('$nom', '$log', '$pwd','$email', '$photos', '$cv', '$adr','$ddn', '$tel') ;";
				
			$con->exec($req);

			
			
			header("Location:./comptes.php");
		}
		else{
			$error="Mot de passe non confirmé";
			header("Location:./ajouter_compte.php?error='".$error."'");
		die;
		}
		}
		catch(PDOException $exp){
			header("Location:./comptes.php?error=Ajout echoué");
		}

		
	
?>