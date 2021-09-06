<title>Detox</title>
<?php require('nav.php'); ?>
<div class="row justify-content-around  col-md-8 mx-auto">
  <h1>Les bienfais des cures detox</h1>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus excepturi nobis tempora deserunt beatae itaque! Porro laboriosam quaerat accusamus veritatis, placeat aperiam tenetur dolorem, ducimus doloremque consequuntur quidem sapiente totam!</p>
  <?php
  require('cnx.php');
  $sql = 'SELECT * FROM remede WHERE SUBSTRING(titre, 1,5) = "Detox"';
  $query = $cnx->query($sql);
  $read = $query->fetchAll();
  foreach ($read as $value) {
  ?>
    <div class="card mt-5" style="width: 18rem;">
      <img src="images/<?php echo $value["image"] ?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $value["titre"] ?></h5>
        <p class="card-text"><?php echo (substr($value['contenu'], 0, 100)); ?></p>
        <a href="read.php?id=<?php echo $value["id"] ?>" class="btn btn-primary">Lire la suite</a>
      </div>
    </div>
  <?php
  }
  ?>
</div>
<?php require('footer.php'); ?>