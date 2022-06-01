<?php
		require "header.php";
		$dns ="mysql:host=localhost;dbname=étudiantsbd";
        $user="root";
        $pass = "pass";
        $id=$_GET["id"];
        $con = new PDO($dns,$user,$pass);
        $req = " update articles SET valid=1,TEMPV=NOW() where Id_Article = $id ;";
        $res = $con->query($req);
		header("Location:./Management_admin.php");
				
		?>