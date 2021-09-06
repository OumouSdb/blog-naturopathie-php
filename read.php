<?php
include('nav.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    require('cnx.php');
    $sql = "SELECT * FROM remede where id = $id";
    $requete = $cnx->query($sql);
    $read = $requete->fetchAll();
    foreach ($read as $value) {

?>
        <a href="remede.php" class="color">Retour</a>
        <div style="width: 50%; margin:auto;">
            <h1 class="card-title"><?php echo $value['titre'] ?></h1>
            <img src="images/<?php echo $value['image'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text"><?php echo $value['contenu'] ?></p>

            </div>
        </div>

<?php
    }
}
