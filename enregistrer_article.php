<?php
		session_start();
		$dns ="mysql:host=localhost;dbname=étudiantsbd";
		$user="root";
		$pass = "pass";

		try{
			$con = new PDO($dns,$user,$pass);
			$log = $_SESSION['clogin'];
			$title = $_POST['title'];
			$content = $_POST['content'];
			$photos = "aucune";
			$cid = (int)$_SESSION["cid"]; 
				
			$imgs = dirname(__FILE__)."/article";
			if(file_exists($_FILES['photo2']['tmp_name'])&&is_uploaded_file($_FILES['photo2']['tmp_name']))
                {

                    $photos = $_FILES['photo2']['name'];
                    $photos = $log."photo.".explode(".",$photos)[1];//new name form : login+photo+extention of the original file (to avoid problems registring long file names in db)
                
                    if(!file_exists($imgs)):
                        mkdir($imgs);
                    endif;
                
                    move_uploaded_file($_FILES['photo2']['tmp_name'],$imgs."/".$photos);
			    }

			$req = "insert into articles(Titre,Id_writer,Text,IMG) values ('$title',$cid,'$content','$photos') ;";
			$con->exec($req);
			
			header("Location:./".$_SESSION['direction']);
		}
		catch(PDOException $exp){
			header("Location:./comptes.php?error=Ajout echoué");
		}

		
	
?>