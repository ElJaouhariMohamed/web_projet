<?php 
    require "header.php";
    $dns ="mysql:host=localhost;dbname=étudiantsbd";
    $user="root";
    $pass = "pass";
    $id=$_POST["id"];
    $con = new PDO($dns,$user,$pass);
    $res = $con->query("select * from articles where Id_Article=$id");
    while($u = $res->fetch(PDO::FETCH_OBJ)){
        $photos = $u->IMG;
    }
    $imgs = dirname(__FILE__)."/article";
    unlink($imgs."/".$photos);
    $req = "delete from articles where Id_Article=$id";
    $res = $con->exec($req);



    header("Location:./Management_etud.php");
?>