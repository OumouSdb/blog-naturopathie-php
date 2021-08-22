<?php
require('nav.php');
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

    ?>
</body>
</html>