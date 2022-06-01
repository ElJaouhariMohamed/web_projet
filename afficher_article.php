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
		
        $dns ="mysql:host=localhost;dbname=étudiantsbd";
        $user="root";
        $pass = "pass";
        $id=$_GET["id"];
        $con = new PDO($dns,$user,$pass);
        $req = "select * from articles where Id_Article=$id";
        $res = $con->query($req);

        while($u = $res->fetch(PDO::FETCH_OBJ)){
            $name = $u->Id_writer;
            $title = $u->Titre;
            $date = $u->TEMPV;
            $text = $u->Text;
            $img = $u->IMG;
        }
        $img = "./article/".$img;
		echo "<div class='container'>";
		echo "
		<div class='row'>
			<div class='col'>Welcome back, User!</div>
		</div>
		";
        echo "<div class='row'>
			<div class='col-2'></div>
			<div class='col-8 text-center fs-1 '><u>".$title."</u></div>
			<div class='col-2'></div>
		</div>"; 
		echo "<div class='row'>
			<div class='col-2'></div>
			<div class='col-8 '> <img src='$img' class='d-block w-100' alt='article_photo'  > </div>
			<div class='col-2'></div>
		</div>";
		echo "<div class='row'>
			<div class='col-1'></div>
			<div class='col-10 lead text-capitalize fs-2' style='margin-top:2%'>".$text."</div>
			<div class='col-1'></div>
		</div>"; 
		?>
		</main>
	</body>
</html>