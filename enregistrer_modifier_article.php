<?php
		$dns ="mysql:host=localhost;dbname=étudiantsbd";
		$user="root";
		$pass = "pass";

		session_start();
		try{
			$con = new PDO($dns,$user,$pass);

			$con = new PDO($dns,$user,$pass);
			$title = $_POST['title'];
			$content = $_POST['content'];
			$photos = "aucune";
			$cid = $_POST['id'];
            $chgimg = $_POST['chgimg'];
			$log = $_SESSION['clogin'];
			$res = $con->query("select * from articles where Id_article = $cid ;");
			
			while($u = $res->fetch(PDO::FETCH_OBJ))
				{
					$photos = $u->IMG;
				}

			$req = " update articles SET Titre = '$title', Text = '$content' where Id_Article = $cid ;";
			$con->exec($req);
			
			
				if($chgimg=='chgimg'){
					$imgs = dirname(__FILE__)."/article";
					if(file_exists($_FILES['photo2']['tmp_name'])&&is_uploaded_file($_FILES['photo2']['tmp_name'])){
	
					unlink($imgs."/".$photos);
					$photos= $_FILES['photo2']['name'];
					$photos = $log."photo.".explode(".",$photos)[1];//new name form : login+photo+extention of the original file (to avoid problems registring long file names in db)
				
					if(!file_exists($imgs)):
						mkdir($imgs);
					endif;
					
				
					move_uploaded_file($_FILES['photo2']['tmp_name'],$imgs."/".$photos);
	
				}
				else{
					$photos="aucune";
				}
			$req = " UPDATE articles SET IMG = '$photos' WHERE  Id_Article = $cid ;";
				$con->exec($req);
		}
			header("Location:./Management_etud.php");
		}
		catch(PDOException $exp){
			header("Location:./home.php?error=Modification echoué");
		}

		
	
?>