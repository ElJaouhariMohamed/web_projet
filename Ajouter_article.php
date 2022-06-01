<!DOCTYPE html>
<html>
	<head>
		<title>Ajouter un utilisateur</title>
		<link rel='stylesheet' href='./style.css'>
		<link rel='stylesheet' href='./assets/bootstrap/css/bootstrap.css'>
        
	</head>
	<body>
    
		<?php
		require 'header.php';
		?>
		<main>
        <!-- Voir si c'est un admin ou étudiant -->
        <?php 
            $type=$_SESSION["utype"];
            if($type==2){
                $_SESSION['direction'] = "Management_admin.php";
            }else{
                $_SESSION['direction'] ="Management_user.php";
            }
        ?>
            <div class='container form-group'  >
                <br>
                <form class='border' style='text-align : center;' id="article" method='POST' action='enregistrer_article.php' enctype='multipart/form-data'>
                    <h4 align='center'> New Article : </h4>
                    
                    <center>
                    <label for='title'> Title :<span style='color:red'>*</span></label><br>
                    <input type='text' name='title' required>
                    </center>

                    <br>

                    <center>
                    <label for='content'>   Article Content :<span style='color:red'>*</span></label><br>
                    <textarea name='content' cols='70' rows='10'></textarea>
                    </center>
                    <script type="text/javascript" src="Javascript_traitement.js"></script>
                    <br>
                    <center>
                    <label> Photo : </label><br><br>
                    <input id='photo2' type='file' accept='image/*' name='photo2' onchange='FilePhotoArticle()'  >
                    </center>
                    <br>

                    <!-- Capcha  par : I.E. -->

                    <label >Entrer le nombre suivant :  <span style='color:red'>*</span></label>
                    <?php
                        $numbers = array();
                    for( $i =0 ; $i<6 ; $i++){
                    array_push($numbers,rand(rand(),rand())%10);
                    }
                    $numbers = implode('',$numbers);
                    echo "<p style='display:inline;font-size:30px;border:2px solid #efc497;color:#efc497' id='rightnumbers'>$numbers</p><br>";
                    ?>
                    <br>
                    <input type='text' id='numbers' required><br>
                    <br>
                    
                    
                    <div class='submitclear' align='center' >
                        <input type='button' onclick="form_submit_article()" class='btn btn-success' value='Save' ; >
                        <input type='reset' class='btn btn-danger' value='Clear' >
                    </div>

                </form>
            </div> 
        </main>
	</body>
</html>