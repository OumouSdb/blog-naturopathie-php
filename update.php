<?php
  if(isset($_GET['id'])){
    require('cnx.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM remede WHERE id = $id" ;
    $query = $cnx->query($sql);
    $read = $query->fetchAll();
    foreach($read as $value){
       ?>
       <form action="">
           <input type="text" value="<?php echo $value['titre'] ?>" name="titre">
           <input type="file" value="<?php echo $value['image'] ?>" name="file">
           <textarea name="" id="" cols="30" rows="10" name="contenu"><?php echo $value['contenu'] ?></textarea>
           <a type="submit" name="update" href="insert.php">Enregistrer</a>
       </form>
    <?php
    }
    
}
      if(isset($_POST['update'])){

          $titre = $_POST['titre'];
          $file = $_POST['file'];
          $contenu = $_POST['contenu'];
          $id = $_POST['id'];

          if(empty($_POST['titre'])  && empty($_POST['contenu'])){
            echo 'Erreur';
         
        } 
         else{
            $sql = "UPDATE remede SET titre = :titre, image = :file, contenu = :contenu WHERE id = $id" ;
            $query = $cnx->prepare($sql);
            $query->bindValue(':titre', $titre, PDO::PARAM_STR);
            $query->bindValue(':contenu', $contenu, PDO::PARAM_STR);
            $query->execute();
          }
         
      }
 
  ?>