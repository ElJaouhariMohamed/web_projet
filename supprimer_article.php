<!DOCTYPE HTML>
<html>
	<head>
		<title>Etudiants</title>
		<link rel="stylesheet" href="./style.css">
		<link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
	</head>
	<body>
		<main>
		<?php
		require "header.php";
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
        }
		echo "<div class='col-md-12 display-3' style='margin-top:10%;'>";
		echo "<form method='POST' action='execution_supprimer.php'><input type='text'name='id' value=$id hidden><h4 align='center'>Hello, this is a request for deleting your article number $name  </h4> <br>";	
        echo "<h4 align='center'>Under the title : $title </h4> <br>";	
        echo "<h4 align='center'>To confirm your delete request, please select the button below ! </h4><br>";
        echo "<h4 align='center'><input type='submit' value='confirm' class='btn btn-warning' ></h4></form></div>' ";
				
		?>
		</main>
	</body>

</html>