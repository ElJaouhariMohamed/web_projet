<!DOCTYPE html>
<html>
	<head>
		<title>Ajouter un utilisateur</title>
		<link rel="stylesheet" href="./style.css">
		<link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
	</head>
	<body>
		<?php
		require "header.php";
		?>
		<main>
		<div class="container form-group" >
			
		<form id="add" method="POST" action="enregistrer_compte.php" enctype='multipart/form-data'>
			<h4 align="center"><s new article : /></h4>
			<div class='row'>
				<div class='col'>
			<label>Nom :<span style="color:red">*</span></label>
			<input type="text" name="nom" required>
				</div>
				<div class='col'>
			<label>Login :<span style="color:red">*</span></label>
			<input type="text" name="login" required>
				</div>
			</div>
			<br>
			<div class='row'>
				<div class='col'>
			<label>Password :<span style="color:red">*</span></label>
			<input type="password" name="pass" required>
			</div>
				<div class='col'>
			<label>Confirm Password :<span style="color:red">*</span></label>
			<input type="password" name="cpass" required>
			</div>
			
			<?php
				if(isset($_GET['error']))
					echo "<div class='col'><div class='erroraff' style='display:inline;color:red;border:2px solid red;'>".$_GET['error']."</div></div>";
			?>
			</div>
			<br>

			<script type="text/javascript" src="Javascript_traitement.js" >  </script>

			<div class='row'>
				<div class='col'>
			<label>Photos : </label>
			<input id="photo" type="file" accept="image/*" name="photo" onchange="file2()"  >
				</div>
			<div class='col'>
			<label>CV :</label>
			<input id="cv" type="file" accept=".pdf,.docx,.doc" name="cv" onchange="file1()"  >
				</div>
			</div>
			<br>

			<div class='row'><div class='col'>
			<label>Date de naissance :<span style="color:red">*</span></label>
			<input type="date" name="ddns" required >
			</div></div>
			<br>

			<div class='row'>
				<div class='col'>
			<label>Email :<span style="color:red">*</span></label>
			<input type="email" name="email" required>
				</div>
				<div class='col'>
			<label>Telephone :<span style="color:red">*</span></label>
			<input type="tel" name="tel" required>
				</div>
			</div>
			<br>

			<div class='row'>
				<div class='col'>
			<label>Adresse :<span style="color:red">*</span></label>
			<input type="text" name="adr" required>
			</div>
			</div>
			<br>

			<!-- Capcha  par : I.E. -->
			<div class='row'>
				<div class='col'>
			<label for="numbers">Entrer le nombre suivant :<span style="color:red">*</span></label>
			</div>
			<div class='col'>
			<?php
				$numbers = array();
			for( $i =0 ; $i<6 ; $i++){
			array_push($numbers,rand(rand(),rand())%10);
			}
			$numbers = implode("",$numbers);
			echo "<p style='display:inline;font-size:30px;border:2px solid #efc497;color:#efc497' id='rightnumbers'>$numbers</p>";
			?>
			</div>
				<div class='col'>
			<input type="text" id="numbers" required><br>
				</div>
			</div>
			<br>
			<div class='row'>
			<div class='col submitclear' align="center" >
			<input type="button" class='btn btn-success' value="Save" OnClick="form_submit()"; >
			<input type="reset" class='btn btn-danger' value="Clear" >
		</div>
	</div>

		</form>
		 
	</div>
</main>
	</body>
	
</html>