<?php
require('nav.php');
?>
   <h1>Remede au naturel</h1> 
   <div class="row col d-flex justify-content-between">
    <?php
    require('cnx.php');
    $sql = 'SELECT * FROM remede';
    $requete = $cnx->query($sql);
    $read = $requete->fetchAll();

    foreach($read as $value){
    
    ?>
   <div class="card" style="width: 18rem;">
  <img src="images/<?php echo $value['image'] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $value['titre'] ?></h5>
    <p class="card-text"><?php echo $value['contenu'] ?></p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

<?php
}
?>
</div>
