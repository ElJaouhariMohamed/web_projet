
<?php
		session_start();

		$dns ="mysql:host=localhost;dbname=étudiantsbd";
		$user="root";
		$pass = "pass";

		try{
			$con = new PDO($dns,$user,$pass);

			$id = $_POST['id'];
			$nom = $_POST['nom'];
			$log = $_POST['login'];
			$ddn= $_POST['ddns'];
			$email = $_POST['email'];
			$photos="aucune";
			$cv="aucun";
			$chgimg = $_POST['chgimg'];
			$chgcv = $_POST['chgcv'];
			$adr = $_POST['adr'];
			$tel = $_POST['tel'];

			$req = "SELECT * FROM etudiant WHERE `ID` = ".(int)$id.";";
			$res = $con->query($req);
			while($u = $res->fetch(PDO::FETCH_OBJ))
			{$log = $u->login;
			$photos = $u->photos;
			$cv = $u->cv;}


			$req = " UPDATE `etudiant` SET name = '$nom', login = '$log' , email = '$email', address = '$adr ', ddn = '$ddn', tel = '$tel' WHERE  id =".(int)$id." ;";
			$con->exec($req);
		
			if($chgimg=='chgimg'){
				$imgs = dirname(__FILE__)."/photos";
				if(file_exists($_FILES['photo']['tmp_name'])&&is_uploaded_file($_FILES['photo']['tmp_name'])){

				unlink($imgs."/".$photos);
				$photos= $_FILES['photo']['name'];
				$photos = $log."photo.".explode(".",$photos)[1];//new name form : login+photo+extention of the original file (to avoid problems registring long file names in db)
			
				if(!file_exists($imgs)):
					mkdir($imgs);
				endif;
				
			
				move_uploaded_file($_FILES['photo']['tmp_name'],$imgs."/".$photos);

			}
			else{
				$photos="aucune";
			}
			$req = " UPDATE `etudiant` SET photos = '$photos' WHERE  id =".(int)$id." ;";
				
			$con->exec($req);
		}
							
			
			

			if($chgcv=='chgcv'){
				$cvs = dirname(__FILE__)."/cvs";
				if(file_exists($_FILES['cv']['tmp_name'])&&is_uploaded_file($_FILES['cv']['tmp_name'])){
					unlink($cvs."/".$cv);
					
					$cv= $_FILES['cv']['name'];
					$cv = $log."cv.".explode(".",$cv)[1];//new name form : login+cv+extention of the original file (to avoid problems registring long file names in db)

					if(!file_exists($cvs)):
						mkdir($cvs);
					endif;

					

					move_uploaded_file($_FILES['cv']['tmp_name'],$cvs."/".$cv);
					
				}
				else{
					$cv="aucun";
				}
				$req = " UPDATE `etudiant` SET cv = '$cv' WHERE  id =".(int)$id." ;";
				$con->exec($req);
			}


			header("Location:./home.php");
		}
		catch(PDOException $exp){
			header("Location:./home.php?error=Modification echoué");
		}

		
	
?>
