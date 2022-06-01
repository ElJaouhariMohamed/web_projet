<!DOCTYPE HTML>
<html>
	<head>
		<title>Etudiants de l'école</title>
		<link rel="stylesheet" href="./style.css">
		<link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
	</head>
	<body >
		<?php
		require "header.php";
		?>
		<main>
		<h4 align="center">Trombinoscope des étudiants</h4>
		<div class='trombcontainer container flex-column'>
<?php
	$dns = "mysql:host=localhost;dbname=étudiantsbd";
	$user="root";
	$pass = "pass";

	try{
		$con = new PDO($dns,$user,$pass);
		$req = "SELECT * FROM etudiant";
		$res= $con->query($req);
		
		$n = 0;

		while($u = $res->fetch(PDO::FETCH_OBJ)){
			if($n%6==0){
				echo "<div class='d-flex flex-row bd-highlight mb-6'>";
			}
			echo "
					<div class='container '>

					<form id='idprofile".$u->ID."' action='aprofile.php' method='post'>
					<input hidden type='text' name='ID' value='".$u->ID."'>
					</form>
					
					<div class=' flex-column trombcontainer' style='background-color:#efc497; width:105%; height:105%'>
					<script type='text/javascript'>
					function visitprofile(id){
						document.getElementById('idprofile'+id).submit();
					}
						</script>

					<img onclick = 'visitprofile(\"".$u->ID."\")' src='./photos/$u->photos' alt='Voir le profile de $u->name' class='trombimg rounded-3' style='border:3px solid #1e6761;'><br>
					<div >
					<p class=' text-uppercase justify-content-center' style='text-align:center;color:#1e6761;'>$u->name</p>
					<input type='button' onclick='' value='envoyer un message' class='trombbuttonjustify-content-center btn-success'>
					</div>
					</div>
					</div>
			";
			$n+=1;
			if($n%6==0){
				echo "</div><br>";
			}
		}
	}
	catch(PDOException $exp){
			header("Location:./comptes.php?error=Affichage du trombinoscope echoué");
		}

?>
	</div>
</main>
</body>
</html>