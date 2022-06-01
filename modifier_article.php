<!DOCTYPE html>
<html>
<head>
	<title>Modifier l'article N° <?php echo $_GET["id"];?></title>
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
		<form class='border' style='text-align : center;' id='modiff_artic' method='POST' action='enregistrer_modifier_article.php' enctype='multipart/form-data'>
			<h4 align='center'>Modifier l'étudiant N°$id</h4>";

			$con = new PDO($dns,$user,$pass); 

			$req = "SELECT * FROM articles WHERE Id_Article = $id ;";
			$res = $con->query($req);
			while($u = $res->fetch(PDO::FETCH_OBJ))
			{
				$titre =$u->Titre;
				$text = $u->Text;

			}
					echo " <center>
					<input type='number' name='id' value= $id hidden>
					<label for='title'> Title :<span style='color:red'>*</span></label><br>
					<input type='text' name='title' value=".$titre."></center>
					<br> <center>
					<label for='content'>   Article Content :<span style='color:red'>*</span></label><br>
					<textarea name='content' cols='70' rows='10'>.$text.</textarea></center>
					<script type='text/javascript' src='Javascript_traitement.js' >  </script>
					<br>
					";
					
						if(isset($_GET['error'])){
						$err = $_GET['error'];
						echo "<div class='errormodif' style='display:inline;color:red;border:1px solid red;'>$err</div>";
					}
					echo "
					<center>
					<label> Photo : </label><br><br>
					<input id='photo2' type='file' accept='image/*' name='photo2' onchange='FilePhotoArticle()'  >
					</center><br>
					<label>Change the image <span style='color:red'>*</span></label><br><input type='checkbox' name='chgimg' value='chgimg'><br>
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
			<input type='button' value='Save' class = 'btn btn-success' OnClick='form_modify_article()'; >
			<input type='reset' class='btn btn-danger' value='Clear'>
			</div>";
		}
	catch(PDOException $exp){
			header("Location:./home.php?error=Modification echoué");
		}

?>
</main>
</body>
</html>