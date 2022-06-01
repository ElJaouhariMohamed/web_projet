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
        }
        
        echo "<div class='col-md-12 lh-base ' style='margin-top :5%'>";
        echo "<h1 class='col-md-12 text-center'>$title</h1><br>";
        if(isset(explode(' ',$date)[0]) & isset(explode(' ',$date)[1])){
            echo "<h3 class='col-md-4' style='float:right'>Published the ".explode(' ',$date)[0]." at ".explode(' ',$date)[1]."</h3><br><br>";
        } else{
            echo "<h3 class='col-md-4' style='float:right'>Not yet published...</h3><br><br>";
        }
        echo "<p class='fs-3 fw-bolder lh-base' style='margin-left : 10%'>$text</p></div>";
        ?>

		</main>
	</body>
</html>