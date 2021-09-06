<title>Questions</title>

<?php
include('nav.php');
?>
<h1>Resultat de votre recherche</h1>
<div class="row justify-content-around container mx-auto ">
  <?php

  if (isset($_GET['question'])) {
    $question = $_GET['question'];
    require('cnx.php');
    $sql = "SELECT * FROM remede WHERE contenu like '%$question%' OR titre like '%$question%'";
    $query = $cnx->query($sql);
    $read = $query->fetchAll();


    if (strlen($question) >= 3) {

      foreach ($read as $value) {

  ?>
        <div class="card mt-5" style="width: 18rem;">
          <img src="images/<?php echo $value['image'] ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $value['titre'] ?></h5>
            <p class="card-text"><?php echo (substr($value['contenu'], 0, 150)) . '...' ?></p>
            <a href="#" class="btn btn-primary">Lire la suite</a>
          </div>
        </div>
  <?php
        $question = true;
      }
    }
    if ($question == 0) {

      $message = 'Votre recherche n\'a pu aboutir';
      echo '<h3>' . $message . '</h3>';
      echo "<img src='images/404-error-3060993_640.png' class='error'>";
    }
  }
  ?>
</div>


<?php
include('footer.php');
?>