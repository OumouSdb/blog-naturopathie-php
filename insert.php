<?php
require('nav.php');
require('cnx.php');

?>
    <form action="" method="POST" class="w-50">
  <div class="form-group ">
    <label for="formGroupExampleInput">Titre</label>
    <input type="text" class="form-control" id="" placeholder="Example input placeholder" name='titre'>
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Choisir une image</label>
    <input type="file" class="form-control-file" id="" name="image">
  </div>
  <div class="form-group">
    <label for="message">Editer un article</label>
    <textarea class="form-control" name="contenu" rows="3"></textarea>
    <button class="btn btn-primary" type="submit" name="insert">Envoyer</button>
  </div>
</form>
<?php
  if(isset($_GET['id'])){
    $id= $_GET['id'];
  }
   $sql = "SELECT * FROM remede ";
   $query = $cnx->query($sql);
   $read = $query->fetchAll();
   foreach($read as $value){
     ?>
     <form style="display: inline;" action="" method="GET">
       <li><?php echo 'Titre : '.$value['titre'] ?></li>
       <li><img src="images/<?php echo $value['image'] ?>" alt="" style="width: 100px;"></li>
       <li><?php echo 'contenu : '.$value['contenu'] ?></li>
       <a class="btn btn-info" href="update.php?id=<?php echo $value['id'] ?>">Modifier</a>
       <a class="btn btn-danger" name="supprimer" href="insert.php?id=<?php echo $value['id'] ?>">Supprimer</a>
       <hr>
   </form>

     <?php
   }
   ?>
    <?php
   if(isset($_POST['insert'])){
   if(isset($_POST['titre']) && isset($_POST['image']) && isset($_POST['contenu'])){
    $titre = $_POST['titre'];
    $image = $_POST['image'];
    $contenu = $_POST['contenu'];
    require('cnx.php');
    $sql = 'INSERT INTO remede (titre, image, contenu) VALUES (:titre, :image, :contenu)';
    $query = $cnx->prepare($sql);
    $query->bindValue(':titre', $titre, PDO::PARAM_STR);
    $query->bindValue(':image', $image, PDO::PARAM_STR);
    $query->bindValue(':contenu', $contenu, PDO::PARAM_STR);
    $query->execute();
   }
   }else{
       die('Une erreur est survenue');
   }
   if(isset($POST['supprimer'])){
     $id = $POST['supprimer'];
    $sql = "DELETE FROM remede WHERE id = $id";
    $del = $cnx->prepare($sql);
    $del->bindValue('id', $id, PDO::PARAM_INT);
    $del->execute();
   }
 ?>
   </body>
</html>