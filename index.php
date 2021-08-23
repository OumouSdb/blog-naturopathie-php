<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se soigner avec les plantes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require('nav.php');
?>
    <main>
        <div class="image_pp">
            <img src="images/alexander-mils-5X8oLkzZ1fI-unsplash.jpg" alt="">
          </div>
          <h1>Bientôt l'été ? Une cure détox, ça vous tente ?</h1>
    </main>
    <div class=" row col d-flex justify-content-around mx-auto">
<?php
require('cnx.php');

$sql = 'SELECT * FROM remede WHERE SUBSTRING(titre, 1,5) = "Detox" ';
$query = $cnx->query($sql);
$read = $query->fetchAll();
foreach($read as $value){
   
   ?>
      <div class="card" style="width: 18rem;">
  <img src="images/<?php echo $value["image"] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $value["titre"] ?></h5>
   
    <p class="card-text"><?php echo (substr($value["contenu"],0,100)); ?></p>
    <a href="#" class="btn btn-primary">Lire la suite</a>
  </div>
</div>
<?php 
}

?>

</div>
<?php require("footer.php");?>