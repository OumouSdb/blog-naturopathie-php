<?php
include('nav.php');
require('cnx.php');

if (isset($_GET['id'])) {

  $id = $_GET['id'];
  $sql = "SELECT * FROM remede WHERE id = $id";
  $query = $cnx->query($sql);
  $read = $query->fetchAll();

  foreach ($read as $value) {
    if (isset($_POST['image'])) {
      if (empty($_POST['image']) && !empty($_POST['titre']) && !empty($_POST['contenu'])) {
        $titre = $_POST['titre'];
        $contenu = $_POST['contenu'];
        $_FILES = $value['image'];
        $new_sql = "UPDATE remede SET titre = :titre, contenu = :contenu WHERE id = $id";
        $new_query = $cnx->prepare($new_sql);
        $new_query->bindValue(':titre', $titre, PDO::PARAM_STR);
        $new_query->bindValue(':contenu', $contenu, PDO::PARAM_STR);
        $new_query->execute();
      }
      header('location: insert.php');
    }
    if (!empty($_POST['titre']) && !empty($_POST['contenu']) && !empty($_POST['image'])) {

      $titre = $_POST['titre'];
      $contenu = $_POST['contenu'];
      $image = $_POST['image'];
      $new_sql = "UPDATE remede SET titre = :titre, image = :image, contenu = :contenu WHERE id = $id";
      $new_query = $cnx->prepare($new_sql);
      $new_query->bindValue(':titre', $titre, PDO::PARAM_STR);
      $new_query->bindValue(':image', $image, PDO::PARAM_STR);
      $new_query->bindValue(':contenu', $contenu, PDO::PARAM_STR);
      $new_query->execute();
    }


?>
    <form class="w-50" method="POST">
      <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" class="form-control" id="" placeholder="Titre" name="titre" value="<?php echo $value['titre']; ?>">
      </div>
      <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" id="" name="image">
        <img src="images/<?php echo $value['image']; ?>" alt="" style="width:100px;" name="image">
      </div>
      <div class="form-group">
        <label for="contenu">Contenu</label>
        <textarea class="form-control" rows="3" name="contenu"><?php echo $value['contenu']; ?></textarea>
      </div>
      <button type="submit" class="btn btn-primary" name="valider">Valider</button>
    </form>
<?php
  }
}
?>

<?php
include('footer.php');
?>