<title>Maladie & Remede</title>
<?php
require('nav.php');
?>
   <h1>Remede au naturel</h1> 
   <div class="row col d-flex justify-content-around mx-auto">
    <?php
    require('cnx.php');
    $sql = 'SELECT * FROM remede where SUBSTRING(titre, 1,5) != "Detox"';
    $requete = $cnx->query($sql);
    $read = $requete->fetchAll();

    foreach($read as $value){
      
    ?>
   <div class="card mt-5" style="width: 18rem;">
  <img src="images/<?php echo $value['image'] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $value['titre'] ?></h5>
   
    <p class="card-text"><?php echo (substr($value['contenu'],0,100)).'...' ?></p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

<?php
}
?>
</div>


<?php
require('footer.php');
?>