<!DOCTYPE HTML>
<html>
	<head>
		<title>Etudiants de l'école</title>
		<link rel="stylesheet" href="./style.css">

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
				<style>
		
		.cut-text { 
		text-overflow: ellipsis;
		overflow: hidden;
		white-space: nowrap;
  }</style>
		</head>
	<body >
		<main>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
		<?php
		
		require "header.php";
		
		echo "<h1> Bienvenue <?php echo". $_SESSION['cnom']."</h1>
			<p>L'équipe Studspace souhaite que vous êtes en bonne santé ! </p><br>";

		if(isset($_GET['msg'])){
			echo "<div class='msgaff' style='display:inline;color:green;border:1px solid green;'>".$_GET['msg']."</div>";
		}

		if(isset($_GET['error']))
			echo "<div class='erroraff' style='display:inline;color:red;border:1px solid red;'>".$_GET['error']."</div>";

		$dns = "mysql:host=localhost;dbname=étudiantsbd";
		$user="root";
		$pass = "pass";

		
		$con = new PDO($dns,$user,$pass);
		$req = "SELECT * FROM articles where valid=1;";
		$res= $con->query($req);
		
		$array_articles = [];

		while($u = $res->fetch(PDO::FETCH_OBJ)){
			$id = $u->Id_Article;
			$title = $u->Titre;
			$Text = $u->Text;
			$photo = $u->IMG;
			$array_miniArticle=array($title,$Text,$photo,$id);
			$array_articles[]=$array_miniArticle;
		}
		$size = sizeof($array_articles);
		if($size !=0){
		echo "<div class='container' style='margin-top:3%;'>";
			echo "<div id='carouselExampleCaptions' class='carousel slide' data-bs-ride='carousel'>";
			echo "<div class='carousel-indicators'>";
			for($i=0;$i<$size;$i++){
				if ($i==0) echo"<button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='$i' class='active' aria-current='true' aria-label='Slide $i'></button>";
				else echo "<button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='$i' aria-label='Slide $i'></button>";
			}
			echo "</div>";
		echo "<div class='carousel-inner'>";
		
		for($i=0;$i<$size;$i++){
			if ($i==0){echo "<div class='carousel-item active'>";
				echo "<div class='row'><div class='col-1'></div><div class='col-10'>";
					if($array_articles[$i][2]!='aucun')	{
						$img = "./article/".$array_articles[$i][2];
						echo "<img src='$img' class='d-block w-100' alt='article_".$array_articles[$i][0]."_photo'>";
					} else {
						echo "<img src='./photo_dault.png' class='d-block w-100' alt='article_".$array_articles[$i][0]."_photo' >";
					}
				echo "</div><div class='col-1'></div></div>";
			echo "<div class='carousel-caption d-none d-md-block'>";
		echo "<h5>".$array_articles[$i][0]."</h5>";
		echo "<p class='fs-4 d-inline-block text-truncate' style='max-width: 400px;' ><a href='./afficher_article.php?id=".$array_articles[$i][3]."'>".$array_articles[$i][1]."</a></p>";
		echo "</div></div>";}
		else
		 {
			echo "<div class='carousel-item'>";
			echo "<div class='row'><div class='col-1'></div><div class='col-10'>";
					if($array_articles[$i][2]!='aucun')	{
						$img = "./article/".$array_articles[$i][2];
						echo "<img src='$img' class='d-block w-100' alt='article_".$array_articles[$i][0]."_photo' >";
					} else {
						$img = dirname(__FILE__)."/pp.png";
						echo "<img src='$img' class='d-block w-100' alt='article_".$array_articles[$i][0]."_photo' >";
					}
				echo "</div><div class='col-1'></div></div>";
			echo "<div class='carousel-caption d-none d-md-block'>";
		echo "<h5>".$array_articles[$i][0]."</h5>";
		echo "<p class='fs-4 d-inline-block text-truncate' style='max-width: 400px;' ><a href='./afficher_article.php?id=".$array_articles[$i][3]."'>".$array_articles[$i][1]."</a></p>";
		echo "</div></div>";
		}
				
		}
		echo "</div>";
		if($size>1){
		echo "
		<button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide='prev'>
							<span class='carousel-control-prev-icon' aria-hidden='true'></span>
							<span class='visually-hidden'>Previous</span></button>
		";
		echo "
		<button class='carousel-control-next' type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide='next'>
		<span class='carousel-control-next-icon' aria-hidden='true'></span>
		<span class='visually-hidden'>Next</span>
		</button>
		";
		}
		echo "</div>";
	}
		
		?>
		
			

			<!--<div id='carouselExampleCaptions' class='carousel slide' data-bs-ride='carousel'>
				<div class='carousel-indicators'>
							<button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>
							<button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='1' aria-label='Slide 2'></button>
							<button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='2' aria-label='Slide 3'></button>
						</div>
						<div class='carousel-inner'>
							<div class='carousel-item active'>
							<img src='...' class='d-block w-100' alt='...'>
							<div class='carousel-caption d-none d-md-block'>
								<h5>First slide label</h5>
								<p>Some representative placeholder content for the first slide.</p>
							</div>
							</div>
							<div class='carousel-item'>
							<img src='...' class='d-block w-100' alt='...'>
							<div class='carousel-caption d-none d-md-block'>
								<h5>Second slide label</h5>
								<p>Some representative placeholder content for the second slide.</p>
							</div>
							</div>
							<div class='carousel-item'>
							<img src='...' class='d-block w-100' alt='...'>
							<div class='carousel-caption d-none d-md-block'>
								<h5>Third slide label</h5>
								<p>Some representative placeholder content for the third slide.</p>
							</div>
							</div>
						</div>
						<button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide='prev'>
							<span class='carousel-control-prev-icon' aria-hidden='true'></span>
							<span class='visually-hidden'>Previous</span>
						</button>
						<button class='carousel-control-next' type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide='next'>
							<span class='carousel-control-next-icon' aria-hidden='true'></span>
							<span class='visually-hidden'>Next</span>
				</button> 
</div>-->
		</main>
	</body>
</html>