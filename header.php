<?php
session_start();
?>
<header class='header'>
	<nav class="navbar navbar-expand-lg ">
  <a class="navbar-brand" href="#"><img src='./assets/slogonsmall.png' alt='Studspace'></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ">
      <li class="nav-item nav-links">
        <a class="nav-link " href="./home.php">Home</a>
      </li>
      <li class="nav-item nav-links">
        <a class="nav-link" href="./trombinoscope.php">Trombinoscope</a>
      </li>
      <?php 
      if($_SESSION["utype"]!=1){
      echo '
      <li class="nav-item nav-links">
        <a class="nav-link" href="./comptes.php">Comptes</a>
      </li>';
    }
      ?>
      <li class="nav-item nav-links">
        <a class="nav-link" href="./myprofile.php">Mon Profile</a>
      </li>
      <?php 
        if($_SESSION["utype"]!=1){
          echo "<li class='nav-item nav-links'>";
          echo "<a class='nav-link' href='./Management_admin.php'>Manage Articles</a>";
          echo "</li>";
          
        }
        echo "<li class='nav-item nav-links'>";
        echo "<a class='nav-link' href='./Management_etud.php'>Your Articles</a>";
        echo "</li>";
      ?>

      <li class="nav-item nav-links">
        <a class="nav-link " href="./a_propos.php">A propos</a>
      </li>
      <li class="nav-item nav-links">
        <a class="nav-link " href="./logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
</header>