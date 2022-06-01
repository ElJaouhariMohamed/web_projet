<!DOCTYPE html>
<html>
<head>
	<title>Modifier l'utilisateur <?php echo $_GET["id"];?></title>
	<link rel="stylesheet" href="./style.css">
	<link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
</head>
<body>

		<?php
		require "header.php";
		?>
		<main>
<?php
	$dns ="mysql:host=localhost;dbname=étudiantsbd";
	$user="root";
	$pass = "pass";


	$id=$_GET["id"];

	try{

		echo "
		<div class='container form-group'>
		<form id='modiff' method='POST' action='enregistrer_modifier_compte.php' enctype='multipart/form-data'>
			<h4 align='center'>Modifier l'étudiant N°$id</h4>";

		$con = new PDO($dns,$user,$pass); 

		$req = "SELECT * FROM articles WHERE `ID` = ".(int)$id.";";
		$res = $con->query($req);
		while($u = $res->fetch(PDO::FETCH_OBJ)){
			echo "
			<input type='number' name='id' value= $id hidden>
			<label>Nom :</label>
			<input type='text' name='nom' value=".$u->name.">
			<br>
			<label>Login :</label>
			<input type='text' name='login' value=".$u->login.">
			<script type='text/javascript' src='Javascript_traitement.js' >  </script>
			<br>
			
			";
			
				if(isset($_GET['error'])){
				$err = $_GET['error'];
				echo "<div class='errormodif' style='display:inline;color:red;border:1px solid red;'>$err</div>";
			}
			echo "
	
			<label>Photos : <span style='color:red'>*</span></label>
			<input id='photo' type='file' accept='image/*'' name='photo' onchange='file2()' >
			<br>
			<label>CV :</label>
			<input id='cv' type='file' accept='.pdf,.docx,.doc' name='cv' onchange='file1()' >
			<br>
			<label>Changer l'image</label><input type='checkbox' name='chgimg' value='chgimg'>
			<label>Changer le cv</label><input type='checkbox' name='chgcv' value='chgcv'><br>
			<label>Date de naissance :</label>
			<input type='date' name='ddns' required value= ".$u->ddn." >
			<br>
			<label>Email :</label>
			<input type='email' name='email' required value=".$u->email.">

			<br>
			<label>Telephone :</label>
			<input type='tel' name='tel' required value=".$u->tel.">
			<br>
			<label>Adresse :</label>
			<input type='text' name='adr' required value=".$u->address.">
			<br>

			<!-- Capcha  par : I.E. -->
			<label for='numbers'>Entrer le nombre suivant : </label>";

			$numbers = array();
			for( $i =0 ; $i<6 ; $i++){
			array_push($numbers,rand(rand(),rand())%10);
			}

			$numbers = implode("",$numbers);
			echo "<br><p style='display:inline;font-size:30px;border:2px solid #efc497;color:#efc497' id='rightnumbers'>$numbers</p>";
			
			echo "<br><input type='text' id='numbers' required><br>
			<input type='button' value='Save' class = 'btn btn-success' OnClick='form_modify()'; >
			<input type='reset' class='btn btn-danger' value='Clear'>
			</div>";
			
		}

	}
	catch(PDOException $exp){
			header("Location:./home.php?error=Modification echoué");
		}

?>
</main>
</body>
</html>